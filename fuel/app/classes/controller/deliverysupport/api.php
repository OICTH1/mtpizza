<?php

class Controller_Deliverysupport_Api extends Controller_Rest
{
	const DELIVERYID_LIST = 'deliveryid_list';
	const LOGIN = 'login';

	public function post_addOrder(){
		$order_id = $_POST['order_id'];
		$deliveryid_list = Session::get(self::DELIVERYID_LIST);
		if(!empty($deliveryid_list)){
			$deliveryid_list[] = $order_id;
		} else {
			$deliveryid_list = array($order_id);
		}
		$order = Model_Order::find($order_id);
		$order->staff_id = Session::get(self::LOGIN);
		$order->save();
		Session::set(self::DELIVERYID_LIST,$deliveryid_list);
		return $deliveryid_list;
	}

	public function post_deleteOrder(){
		$order_id = $_POST['order_id'];
		$deliveryid_list = Session::get(self::DELIVERYID_LIST);
		;
		if(is_array($deliveryid_list)){
			unset($deliveryid_list[array_search($order_id,$deliveryid_list)]);
		} else {
			return array('status' => 'NG', );
		}
		$deliveryid_list = array_values($deliveryid_list);
		$order = Model_Order::find($order_id);
		$order->status = 1;
		$order->save();
		Session::set(self::DELIVERYID_LIST,$deliveryid_list);
		return array('status' => 'OK', );
	}

	public function post_position(){
		if(empty(Session::get(self::LOGIN))){
			return array(
				'status' => 'NG'
			);
		}
		$staff_id = Session::get(self::LOGIN);
		$staff = Model_Staff::find($staff_id);
		$staff->lat = $_POST['lat'];
		$staff->long = $_POST['long'];
		$staff->save();
		return array(
			'status' => 'OK'
		);
	}
}
