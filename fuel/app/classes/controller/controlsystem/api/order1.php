<?php

class Controller_Api_Order extends Controller_Rest
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
        $order['cart'][] = array(
            'item_id' => $_POST['item_id'],
            'item_name' => Model_Item::find($_POST['item_id'])->name,
            'category' => Model_Item::find($_POST['item_id'])->category,
            'order_id' => "",
            'num' => $_POST['num'],
            'size' => $_POST['size']
        );
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
