<?php

namespace Fuel\Migrations;

class Create_tbl_orders
{
	public function up()
	{
		\DBUtil::create_table('tbl_orders', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'member_id' => array('constraint' => 1, 'type' => 'int'),
			'deliveryman_id' => array('constraint' => 3, 'type' => 'varchar'),
			'postalcode' => array('constraint' => 10, 'type' => 'varchar'),
			'destination' => array('type' => 'text'),
			'order_date' => array('type' => 'timestamp'),
			'print_flag' => array('type' => 'tinyint'),
			'status' => array('type' => 'tinyint'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tbl_orders');
	}
}