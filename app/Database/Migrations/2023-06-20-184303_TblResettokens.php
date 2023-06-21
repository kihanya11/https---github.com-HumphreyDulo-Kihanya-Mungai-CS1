<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblResettokens extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'token_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('token_id', true);
        $this->forge->createTable('tbl_resettokens');
    }

    public function down()
    {
        $this->forge->dropTable('reset_tokens');

    }
}
