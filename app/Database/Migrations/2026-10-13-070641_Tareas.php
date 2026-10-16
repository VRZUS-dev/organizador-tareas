<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tareas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_usuario' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'descripcion' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'estado' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'pendiente',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_usuario', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tareas');
    }

    public function down()
    {
        $this->forge->dropTable('tareas');
    }
}

