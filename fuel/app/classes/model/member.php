<?php

class Model_Member extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'phonetic',
		'sex',
		'birthday',
		'address',
		'mailaddress',
		'password',
		'tel',
		'postalcode',
	);


	protected static $_table_name = 'tbl_member';

	protected static $_has_many = array(
		'orders' => array(
			'model_to' => 'Model_Order',
			'key_from' => 'id',
			'key_to' => 'member_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

}
