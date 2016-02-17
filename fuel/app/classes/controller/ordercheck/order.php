<?php

class Controller_Ordercheck_Order extends Controller
{
    public function action_index(){
        return View::forge('ordercheck/orderlist');
    }

    public function action_print($order_id){
        $data['order'] = Model_Order::find($order_id);
        return View::forge('ordercheck/orderprint',$data);
    }
}
