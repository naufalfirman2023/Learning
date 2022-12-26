<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mhs' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tgl_lahir' => [
                'type' => 'DATE',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_mhs', true);
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
