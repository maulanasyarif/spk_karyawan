<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'          => 'varchar',
                'constraint'    => '225',
            ],
            'email' => [
                'type'          => 'varchar',
                'constraint'    => '225',
            ],
            'password' => [
                'type'          => 'varhcar',
                'constraint'    => '225',
            ],
            'type' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'default'       => 1,
            ],
            'aktif' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'default'       => 1,
            ],
        ]);

        $this->forge->addPrimaryKey('id', TRUE);
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
