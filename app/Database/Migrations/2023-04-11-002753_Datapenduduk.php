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
            'id_user' => [
                'type'  => 'INT',
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
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'tanggal_lahir' => [
                'type' => 'DATE'
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],

            'telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],

            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'desa' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'kabupaten' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 128
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