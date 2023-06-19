<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ActivateUser extends Migration
{
    public function up()
{
    $this->forge->addField([
        'activation_id' => [
            'type' => 'INT',
            'unsigned' => true,
            'auto_increment' => true,
        ],
        'id' => [
            'type' => 'INT',
            'unsigned' => true,
            
        ],
        'activation_code' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
        ],
        'is_active' => [
            'type' => 'BOOLEAN',
            'default' => false,
        ],
    ]);

    $this->forge->addPrimaryKey('activation_id');
 
    $this->forge->createTable('tbl_activation', true);
}


    public function down()
    {
        $this->forge->dropTable('tbl_activation', true);
    }
}
