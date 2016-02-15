<?php

namespace Fuel\Migrations;

class Create_tbl_items
{
	public function up()
	{
		\DBUtil::create_table('tbl_items', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'img_id' => array('constraint' => 1, 'type' => 'int'),
			'name' => array('constraint' => 30, 'type' => 'varchar'),
			'phonetic' => array('constraint' => 60, 'type' => 'varchar'),
			'category' => array('constraint' => 4, 'type' => 'varchar'),
			'unit_price' => array('constraint' => 11, 'type' => 'int'),
			'unit_price_s' => array('constraint' => 11, 'type' => 'int'),
			'unit_price_m' => array('constraint' => 11, 'type' => 'int'),
			'unit_price_l' => array('constraint' => 11, 'type' => 'int'),
			'explanatory' => array('type' => 'text'),
			'delete_flag' => array('type' => 'tinyint'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tbl_items');
	}
}