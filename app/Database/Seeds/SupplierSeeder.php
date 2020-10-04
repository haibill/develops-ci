<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class SupplierSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {

        $data = [
            [
                'supplier_code' => "SUP",
                'name'          => "Sinar Jaya",
                'address'       => "Jalan Padasuka Cicaheum no 90 Bandung",
                'created_at'    => Time::now()
            ],
            [
                'supplier_code' => "SUP",
                'name'          => "Mall-Baby",
                'address'       => "Kota Tangerang Selatan",
                'created_at'    => Time::now()
            ],
            [
                'supplier_code' => "SUP",
                'name'          => "Nirwana Abadi",
                'address'       => "Kota Surabaya",
                'created_at'    => Time::now()
            ],
        ];
        $this->db->table('supplier')->insertBatch($data);
    }
}
