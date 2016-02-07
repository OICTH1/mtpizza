<?php

class Controller_Controlsystem_Api_Order extends Controller_Rest
{
    const ORDER = 'order';

    public function before(){
        parent::before();
        //\Session::delete(self::ORDER);
        if(empty(\Session::get(self::ORDER))){
            \Session::set(self::ORDER,array('cart'=>array()));
        }
    }

    public function get_cart(){
        $order = \Session::get(self::ORDER);
        return $this->response($order);
    }

    public function post_add(){
        $order = \Session::get(self::ORDER);
        $id =  $_POST['id'];
        $item = Model_Item::find($_POST['id']);
        $num = $_POST['num'];
        $size = strtoupper($_POST['size']);
        if($item->category != 'ピザ'){
            $price_key = 'unit_price';
            $size = "";
        } else {
            switch ($size) {
                case 'S':
                    $price_key = 'unit_price_s';
                    break;
                case 'M':
                    $price_key = 'unit_price_m';
                    break;
                case 'L':
                    $price_key = 'unit_price_l';
                    break;
            }
        }
        foreach ($order['cart'] as $key => $value) {
            if($value['item_id'] == $id && $value['size'] == $size ){
                if($num == 0){
                    unset($order['cart'][$key]);
                } else {
                    $order['cart'][$key]['num'] = $num;
                }
                $order['cart'] = array_values($order['cart']);
                \Session::set(self::ORDER,$order);
                return $this->response($order);
            }
        }
        if($num != 0){
            $order['cart'][] = array(
                'item_id' => $id,
                'item_name' => $item->name,
                'category' => $item->category,
                'order_id' => "",
                'num' => $num,
                'size' => $size,
                'unit_price' => $item[$price_key]
            );
        }
        \Session::set(self::ORDER,$order);
        return $this->response($order);
    }

    public function post_delete(){
        $id = $_POST['id'] - 1;
        $order = \Session::get(self::ORDER);
        unset($order['cart'][$id]);
        $order['cart'] = array_values($order['cart']);
        \Session::set(self::ORDER,$order);
        return $this->response($order);
    }

    public function post_edit(){
        $id = $_POST['id'] - 1;
        $order = \Session::get(self::ORDER);
        $order['cart'][$id]['num'] = $_POST['num'];
        $order['cart'][$id]['size'] = $_POST['size'];
        \Session::set(self::ORDER,$order);
        return $this->response($order);
    }

    public function get_test(){
        \Session::delete(self::ORDER);
        return $this->response(true);
    }

}
