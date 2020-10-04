<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table          = "customer";
    protected $primaryKey     = 'customer_id';
    protected $useSoftDeletes = true;
    protected $useTimestamps  = true;
    protected $deletedField   = 'deleted_at';
    protected $allowedFields  = ['customer_code', 'name', 'phone_number', 'address'];

    public function get($customer_id = false)
    {
        if ($customer_id == false) {
            return $this->findAll();
        }
        return $this->where(['customer_id' => $customer_id])->first();
    }
}
