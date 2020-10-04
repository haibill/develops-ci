<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class CustomerSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {

        $data = [
            [
                'customer_code' => "CUS",
                'name'          => "Sinar Jaya",
                'phone_number'  => "087830661966",
                'address'       => "Jalan Padasuka Cicaheum no 90 Bandung",
                'created_at'    => Time::now()
            ],
            [
                'customer_code' => "CUS",
                'name'          => "Mall-Baby",
                'phone_number'  => "087830661966",
                'address'       => "Kota Tangerang Selatan",
                'created_at'    => Time::now()
            ],
            [
                'customer_code' => "CUS",
                'name'          => "Nirwana Abadi",
                'phone_number'  => "087830661966",
                'address'       => "Kota Surabaya",
                'created_at'    => Time::now()
            ],
        ];
        $this->db->table('customer')->insertBatch($data);
    }
}
