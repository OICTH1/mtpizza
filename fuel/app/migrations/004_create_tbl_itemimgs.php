<?php

namespace Fuel\Migrations;

class Create_tbl_itemimgs
{
	public function up()
	{
		\DBUtil::create_table('tbl_itemimgs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'path' => array('type' => 'text'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tbl_itemimgs');
	}
}