<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TCon extends Migration
{
	public function up()
        {
                $this->forge->addField([
                        'id_con'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'conceptos_Gasto'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '250',
                        ],
                        'monto'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '250',
                        ],
                        'fecha'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '250',
                        ],
                ]);
                $this->forge->addKey('id_con', true);
                $this->forge->createTable('t_con');
        }

        public function down()
        {
                $this->forge->dropTable('t_con');
        }
}

