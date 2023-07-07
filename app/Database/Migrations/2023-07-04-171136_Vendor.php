<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vendor extends Migration
{
    public function up()
    {
        $this->forge->addField([
         
            'vendor_id' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'address' => [
                'type' => 'TEXT',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'pending',
            ]
     
          
        ]);

        $this->forge->addKey('vendor_id', true);
        $this->forge->createTable('tbl_vendor');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_vendor');
    }
}
