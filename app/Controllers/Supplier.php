<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data['title'] = ucwords("list of supplier");
        return view('master-data/supplier/index', $data);
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data['list']    = $this->supplierModel->get();
            $message['data'] = view('master-data/supplier/table', $data);
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $message['data'] = view('master-data/supplier/modal');
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    public function store()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'supplier_code' => [
                    'label' => ucwords('supplier code'),
                    'rules' => 'required'
                ],
                'name'  => [
                    'label' => ucwords('name'),
                    'rules' => 'required'
                ],
                'address'   => [
                    'label' => ucwords('address'),
                    'rules' => 'required'
                ]
            ]);

            if (!$valid) {
                $message = [
                    'error' => [
                        'supplier_code' => $validation->getError('supplier_code'),
                        'name'          => $validation->getError('name'),
                        'address'       => $validation->getError('address')
                    ]
                ];
            } else {
                $this->supplierModel->save([
                    'supplier_code' => $this->request->getVar('supplier_code'),
                    'name'          => $this->request->getVar('name'),
                    'address'       => $this->request->getVar('address')
                ]);
                $message['success'] = 'Data added successfully!';
            }
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $supplier_id = $this->request->getVar('supplier_id');
            $row         = $this->supplierModel->get($supplier_id);
            $data = [
                'supplier_id'   => $row['supplier_id'],
                'supplier_code' => $row['supplier_code'],
                'name'          => $row['name'],
                'address'       => $row['address'],
            ];
            $message['okay'] = view('master-data/supplier/modal');
            $message['data'] = $data;
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'supplier_code' => [
                    'label' => ucwords('supplier code'),
                    'rules' => 'required'
                ],
                'name'  => [
                    'label' => ucwords('name'),
                    'rules' => 'required'
                ],
                'address'   => [
                    'label' => ucwords('address'),
                    'rules' => 'required'
                ]
            ]);

            if (!$valid) {
                $message = [
                    'error' => [
                        'supplier_code' => $validation->getError('supplier_code'),
                        'name'          => $validation->getError('name'),
                        'address'       => $validation->getError('address')
                    ]
                ];
            } else {
                $this->supplierModel->save([
                    'supplier_id'   => $this->request->getVar('supplier_id'),
                    'supplier_code' => $this->request->getVar('supplier_code'),
                    'name'          => $this->request->getVar('name'),
                    'address'       => $this->request->getVar('address')
                ]);
                $message['success'] = 'Data updated successfully!';
            }
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $supplier_id = $this->request->getVar('supplier_id');
            $row         = $this->supplierModel->get($supplier_id);
            $data = [
                'supplier_id'   => $row['supplier_id'],
                'supplier_code' => $row['supplier_code'],
                'name'          => $row['name'],
                'address'       => $row['address'],
            ];
            $message['okay'] = view('master-data/supplier/modal-confirm', $data);
            $message['data'] = $data;
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    public function destroy()
    {
        if ($this->request->isAJAX()) {
            $supplier_id = $this->request->getVar('supplier_id');
            $this->supplierModel->delete($supplier_id);
            $message['success'] = 'Data removed successfully!';
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    //--------------------------------------------------------------------

}
