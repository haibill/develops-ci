<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class PeopleSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            $name = $faker->name;
            $slug = url_title($name, '-', true);

            $data = [
                'name'       => $name,
                'slug'       => $slug,
                'address'    => $faker->address,
                'created_at' => Time::now()

            ];
            $this->db->table('people')->insert($data);
        }
    }
}
