<?php

namespace Fuel\Migrations;

class Create_tbl_members
{
	public function up()
	{
		\DBUtil::create_table('tbl_members', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 20, 'type' => 'varchar'),
			'phonetic' => array('constraint' => 25, 'type' => 'varchar'),
			'sex' => array('constraint' => 1, 'type' => 'varchar'),
			'birthday' => array('type' => 'date'),
			'address' => array('constraint' => 60, 'type' => 'varchar'),
			'mailaddress' => array('constraint' => 30, 'type' => 'varchar'),
			'password' => array('constraint' => 16, 'type' => 'varchar'),
			'tel' => array('constraint' => 40, 'type' => 'varchar'),
			'postalcode' => array('constraint' => 12, 'type' => 'varchar'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tbl_members');
	}
}