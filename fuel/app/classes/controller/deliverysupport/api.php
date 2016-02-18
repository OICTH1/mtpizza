<?php

class Controller_Deliverysupport_Api extends Controller_Rest
{
	const DELIVERYID_LIST = 'deliveryid_list';
	const LOGIN = 'login';

	public function post_addOrder(){
		$order_id = $_POST['order_id'];
		$deliveryid_list = Session::get(self::DELIVERYID_LIST);
		if(empty($deliveryid_list)){
			$deliveryid_list = array($order_id);
		} else if(!in_array($order_id,$deliveryid_list)){
			$deliveryid_list[] = $order_id;
		} else {
			return  array(
				'status' => false,
				'message' => '「注文番号：' . $order_id . '」は既に追加されています。'
			 );
		}
		$order = Model_Order::find($order_id);
		if(empty($order)){
			return  array(
				'status' => false,
				'message' => '「注文番号：' . $order_id . '」は存在しません。'
			 );
		}
		$order->staff_id = 1;//Session::get(self::LOGIN);
		$order->save();
		Session::set(self::DELIVERYID_LIST,$deliveryid_list);
		return array(
			'status' => true,
			'message' => in_array($order_id,$deliveryid_list),
		);
	}

	public function post_reset(){
		Session::set(self::DELIVERYID_LIST,array());
		return array('status' => 'OK', );
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
				'status' => 'NG',
				'id' => $_POST['lat']
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

	public function post_testposition(){
		/*if(empty(Session::get(self::LOGIN))){
			return array(
				'status' => 'NG',
				'id' => $_POST['lat']
			);
		}*/
		$staff_id = $_POST['staff_id'];
		$staff = Model_Staff::find($staff_id);
		$staff->lat = $_POST['lat'];
		$staff->long = $_POST['lng'];
		$staff->save();
		return array(
			'status' => 'OK'
		);
	}
}
