<?php

class Model_Staff extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'staffno',
		'long',
		'lat',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'staffs';

	public static function isExist($staffNo){
		$staff = Model_Staff::query()->where('staffNo',$staffNo)->get_one();
		if(!empty($staff)){
			return $staff;
		}
		return null;
	}

	const DELIVERYID_LIST = 'deliveryid_list';
	public function getDeliveryList(){
		$deliveryid_list = Session::get(self::DELIVERYID_LIST);
		$deliverylist = array();
		foreach ((array)$deliveryid_list as $idx => $deliveryid) {
			$order = Model_Order::find($deliveryid);
			$deliverylist[] = array(
				'index' => $idx,
				'orderid' => $deliveryid,
				'address' => $order->destination,
			);
		}
		return $deliverylist;
	}


}
