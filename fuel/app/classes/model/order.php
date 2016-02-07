<?php

class Model_Order extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'member_id',
		'deliveryman_id',
		'destination',
		'order_date',
		'print_flag',
		'status',
	);


	protected static $_table_name = 'tbl_order';

	protected static $_has_one = array(
		'member' => array(
			'model_to' => 'Model_Member',
			'key_from' => 'member_id',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'deliveryman' => array(
			'model_to' => 'Model_Deliveryman',
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

}
