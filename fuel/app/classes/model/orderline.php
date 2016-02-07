<?php

class Model_Orderline extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'order_id',
		'item_id',
		'num',
		'size',
	);


	protected static $_table_name = 'tbl_orderline';

	protected static $_has_one = array(
		'item' => array(
			'model_to' => 'Model_Item',
			'key_from' => 'item_id',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);

}
