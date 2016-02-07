<?php

class Controller_Controlsystem_Order_Cfm extends Controller
{
    const ORDER = 'order';

    public function action_index()
    {
        $orders =  \Session::get(self::ORDER);
        $data['orders'] = array();
        $data['total'] = 0;
        if(!empty($orders['cart'])){
            foreach ($orders['cart'] as $order) {
                $item = Model_Item::find($order['item_id']);
                $price = $data['price'] * $order['num'];
                $data['total'] += $price;
                $data['orders'][] = array(
                    'item_name' => $order['item_name'],
                    'num' => $order['num'],
                    'size' => strtoupper($order['size']),
                    'price' => $price
                );
            }
        }
        return View::forge("controlsystem/order/cfm",$data);
    }

    public function action_commit(){
        $orders =  \Session::get(self::ORDER);
        if(count($orders['cart']) == 0){
            Response::redirect('index.php/controlsystem/order/order');
        }
        $post = $_POST;
        $order = new Model_Order();
        $order->postalcode = $post['postalcode1'] . '-' . $post['postalcode2'];
        $order->destination = $post['address'];
        $order->print_flag = false;
        $order->status = false;
        $date = date( "Y-m-d", time() );
        $order->order_date = $date;
        $customer = Model_Member::query()->where('name', $post['customer_name'])->get_one();
        if(!empty($customer)){
            $order->member_id = $customer->id;
        } else {
            $order->member_id = null;
        }
        $order->save();
        $order_id = $order->id;

        //make orderlines
        $orders =  \Session::get(self::ORDER);
        foreach ($orders['cart'] as $orderline) {
            $item_id = $orderline['item_id'];
            $item = Model_Item::find($item_id);
            $num = $orderline['num'];
            $size = strtoupper($orderline['size']);
            $neworderline = new Model_Orderline();
            $neworderline->order_id = $order->id;
            $neworderline->item_id = $item_id;
            $neworderline->num = $num;
            $neworderline->size = $size;
            $neworderline->save();

            $earning = new Model_Earning();
            if(!empty($customer)){
                $earning->member_id = $customer->id;
            } else {
                $earning->member_id = null;
            }
            $earning->item_id = $item_id;
            $earning->size = $size;
            switch ($size) {
                case 'S':
                    $unit_price = $neworderline->item->unit_price_s;
                    break;
                case 'M':
                    $unit_price = $neworderline->item->unit_price_m;
                    break;
                case 'L':
                    $unit_price = $neworderline->item->unit_price_m;
                    break;
                default:
                    $unit_price = $neworderline->item->unit_price;
                    break;
            }
            $earning->unit_price = $unit_price;
            $earning->num = $num;
            $earning->date = $date;
            $earning->category = $item->category;
            $earning->item_name = $item->name;
            $now = date('Ymd');
            if(!empty($customer)){
                $birthday = date('Ymd',strtotime($customer->birthday));
                $earning->age = (int)floor(($now-$birthday)/10000);
            } else {
                $birthday = null;
                $earning->age = 0;
            }
            $earning->save();

        }
        return View::forge('order/commit');
    }
}

 ?>
