<?php

namespace App\Database\Seeds;

class Mahasiswa extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 50; $i++) {
            $gender = $faker->randomElements(['male', 'female'])[0];

            $data = [
                'nama' => $faker->name($gender),
                'tgl_lahir' => date("Y-m-d"),
                'alamat' => $faker->address,
            ];
            print_r($data);
            $this->db->table('mahasiswa')->insert($data);
        }
    }
}