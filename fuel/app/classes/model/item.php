<?php

class Model_Item extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'img_id',
		'name',
		'phonetic',
		'category',
		'unit_price',
		'unit_price_s',
		'unit_price_m',
		'unit_price_l',
		'explanatory',
	);


	protected static $_table_name = 'tbl_item';

	protected static $_has_one = array(
		'img' => array(
			'model_to' => 'Model_Itemimg',
			'key_from' => 'img_id',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);

}
