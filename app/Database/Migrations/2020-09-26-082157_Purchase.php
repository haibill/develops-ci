<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Purchase extends Migration
{
	public function up()
	{
		$this->db->disableForeignKeyChecks();
		$this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'purchase_id'            => [
				'type'              => 'BIGINT',
				'constraint'        => 20,
				'unsigned'          => TRUE,
				'auto_increment'    => TRUE
			],
			'purchase_code'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '10',
			],
			'date'          => [
				'type'              => 'DATE'
			],
			'id_supplier'           => [
				'type'              => 'INT',
				'constraint'        => 11,
				'unsigned'          => TRUE
			],
			'total'          => [
				'type'              => 'BIGINT',
				'constraint'        => 20,
			],
			'purchase_status'   => [
				'type'              => 'TEXT'
			],
		]);
		$this->forge->addKey('purchase_id', TRUE);
		$this->forge->addForeignKey('id_supplier', 'supplier', 'supplier_id', 'CASCADE', 'CASCADE'); // cascade atau no action
		$this->forge->createTable('purchase');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
