<?php

class Controller_Ordercheck_Api_Order extends Controller_Rest
{

	public function get_list()
	{
		//not print order list
		$list = Model_Order::find('all',array(
				'where'=> array(
					array('print_flag' => false),
				),
			)
		);
		return $this->response($list);
	}

	public function post_print($order_id)
	{
		$order = Model_Order::find($order_id);
		$order->print_flag = true;
		$order->save();
	}

}
