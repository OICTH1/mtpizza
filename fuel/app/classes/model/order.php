<?php

class Model_Order extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'member_id',
		'staff_id',
		'destination',
		'order_date',
		'print_flag',
		'status',
	);


	protected static $_table_name = 'tbl_orders';

	protected static $_has_one = array(
		'member' => array(
			'model_to' => 'Model_Member',
			'key_from' => 'member_id',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'deliveryman' => array(
			'model_to' => 'Model_Staff',
			'key_from' => 'deliveryman_id',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);

	protected static $_has_many = array(
		'orderline' => array(
			'model_to' => 'Model_Orderline',
			'key_from' => 'id',
			'key_to' => 'order_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);

	public static function getDetail($order_id){
		$order = Model_Order::find($order_id);

		foreach ($order->orderline as $orderline) {
			switch ($orderline->size) {
				case 'S':
					$key = 'unit_price_s';
					break;
				case 'M':
					$key = 'unit_price_m';
					break;
				case 'L':
					$key = 'unit_price_l';
					break;
				case '':
					$key = 'unit_price';
					break;
			}
			$detail['orderline'][] = array(
				'name' => $orderline->item->name,
				'size' => $orderline->size,
				'num' => $orderline->num,
				'price' => $orderline->item[$key],
			);
		}

		$detail['customer'] = array(
				'name' => $order->member->name,
				'tel' => $order->member->tel,
		);

		$detail['address'] = array(
				'postalcode' => $order->postalcode,
				'destination' => $order->destination,
		);

		return $detail;
	}

}
