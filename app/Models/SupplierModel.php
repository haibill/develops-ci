<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table          = 'supplier';
    protected $primaryKey     = 'supplier_id';
    protected $useSoftDeletes = true;
    protected $useTimestamps  = true;
    protected $deletedField   = 'deleted_at';
    protected $allowedFields  = ['supplier_code', 'name', 'address'];

    public function get($supplier_id = false)
    {
        if ($supplier_id == false) {
            return $this->findAll();
        }
        return $this->where(['supplier_id' => $supplier_id])->first();
    }
}
