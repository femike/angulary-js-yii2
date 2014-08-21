<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m140820_103607_create_post
 */
class m140820_103607_create_post extends Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

		$this->createTable(
			'{{%post}}',
			[
				'id' => Schema::TYPE_PK,
				'title' => Schema::TYPE_STRING . '(128) NOT NULL ',
				'content' => Schema::TYPE_TEXT . ' NOT NULL',
				'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
				'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
			],
			$tableOptions
		);

		return true;

	}

	public function down()
	{
		$this->dropTable('{{%post}}');
	}
}

