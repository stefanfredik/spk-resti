<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Datapenduduk extends Migration
{
    public function up()
    {
        $data = [
            'id' => [
                'type'  => 'INT',
                'auto_increment' => true
            ],

            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],

            'no_kk' => [
                'type' => 'VARCHAR',
                'constraint' => 32
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true
            ],
            'kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true
            ],

            'kabupaten' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true
            ]
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('datapenduduk');
    }

    public function down()
    {
        $this->forge->dropTable('datapenduduk');
    }
}
