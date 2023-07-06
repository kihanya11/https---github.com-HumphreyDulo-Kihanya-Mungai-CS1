<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notification extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'vendor_id' => [
                'type' => 'INT',
                'constraint' => 255,
                'unsigned' => true,
            ],
            'message' => [
                'type' => 'TEXT',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'pending',
            ],
            
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_notifications');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_notifications');
    }
}
