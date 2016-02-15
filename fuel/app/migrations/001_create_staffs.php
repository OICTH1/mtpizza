<?php

namespace Fuel\Migrations;

class Create_staffs
{
	public function up()
	{
		\DBUtil::create_table('staffs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'staffno' => array('constraint' => 11, 'type' => 'int'),
			'long' => array('constraint' => 10, 'type' => 'double'),
			'lat' => array('constraint' => 10, 'type' => 'double'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('staffs');
	}
}