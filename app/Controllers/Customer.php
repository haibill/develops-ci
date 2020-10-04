<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\CustomerDatatable;
use Config\Services;

class Customer extends BaseController
{
    protected $customerModel;
    protected $customerData;

    public function __construct()
    {
        $this->request       = Services::request();
        $this->customerModel = new CustomerModel();
        $this->customerData  = new CustomerDatatable($this->request);
    }

    public function index()
    {
        $data['title'] = ucwords("list of customer");
        return view('master-data/customer/index', $data);
    }

    public function getData()
    {
        if ($this->request->isAJAX()) {
            $data['list']    = $this->customerModel->get();
            $message['data'] = view('master-data/customer/table', $data);
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    public function listData()
    {

        if ($this->request->getMethod(true) == 'POST') {
            $result = $this->customerData->get_datatables();
            $data   = [];
            $no     = $this->request->getPost("start");
            foreach ($result as $item) {
                $no++;
                $row    = [];
                $row[]  =  '' . buttonOnclickAction($item->customer_id, "Edit", "Customer") . '' . buttonOnclickAction($item->customer_id, "Delete", "Customer") . '';
                $row[]  = "" . formatCode($item->customer_code, $item->customer_id) . "";
                $row[]  = $item->name;
                $row[]  = $item->phone_number;
                $row[]  = $item->address;
                // $row[]  = "<input type=\"checkbox\" name=\"customer_id\" class=\"checklist\" value=\"$item->customer_id\">";
                $row[]  = '';
                $data[] = $row;
            }
            $output = [
                'draw'            => $this->request->getPost('draw'),
                'recordsTotal'    => $this->customerData->count_all(),
                'recordsFiltered' => $this->customerData->count_filtered(),
                'data'            => $data
            ];
            echo json_encode($output);
        }
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $message['data'] = view('master-data/customer/modal');
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
                'customer_code' => [
                    'label' => ucwords('customer code'),
                    'rules' => 'required'
                ],
                'name'  => [
                    'label' => ucwords('name'),
                    'rules' => 'required'
                ],
                'phone_number'   => [
                    'label' => ucwords('phone number'),
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
                        'customer_code' => $validation->getError('customer_code'),
                        'name'          => $validation->getError('name'),
                        'phone_number'  => $validation->getError('phone_number'),
                        'address'       => $validation->getError('address')
                    ]
                ];
            } else {
                $this->customerModel->save([
                    'customer_code' => $this->request->getVar('customer_code'),
                    'name'          => $this->request->getVar('name'),
                    'phone_number'  => $this->request->getVar('phone_number'),
                    'address'       => $this->request->getVar('address')
                ]);
                $message['success'] = 'Data added successfully!';
            }
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    public function multipleCreate()
    {
        if ($this->request->isAJAX()) {
            $message['data'] = view('master-data/customer/form-multiple');
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    public function multipleStore()
    {
        if ($this->request->isAJAX()) {
            $customer_code = $this->request->getVar('customer_code');
            $name          = $this->request->getVar('name');
            $phone_number  = $this->request->getVar('phone_number');
            $address       = $this->request->getVar('address');

            $count = count($customer_code);
            for ($i = 0; $i < $count; $i++) {
                $this->customerModel->save([
                    'customer_code' => $customer_code[$i],
                    'name'          => $name[$i],
                    'phone_number'  => $phone_number[$i],
                    'address'       => $address[$i]
                ]);
            }
            $message['success'] = "<b>OK !</b>&nbsp;&nbsp; $count Data added successfully.";
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $customer_id = $this->request->getVar('customer_id');
            $row         = $this->customerModel->find($customer_id);
            $data = [
                'customer_id'   => $row['customer_id'],
                'customer_code' => $row['customer_code'],
                'name'          => $row['name'],
                'phone_number'  => $row['phone_number'],
                'address'       => $row['address'],
            ];
            $message['okay'] = view('master-data/customer/modal');
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
                'customer_code' => [
                    'label' => ucwords('customer code'),
                    'rules' => 'required'
                ],
                'name'  => [
                    'label' => ucwords('name'),
                    'rules' => 'required'
                ],
                'phone_number'   => [
                    'label' => ucwords('phone number'),
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
                        'customer_code' => $validation->getError('customer_code'),
                        'name'          => $validation->getError('name'),
                        'phone_number'  => $validation->getError('phone_number'),
                        'address'       => $validation->getError('address')
                    ]
                ];
            } else {
                $this->customerModel->save([
                    'customer_id'   => $this->request->getVar('customer_id'),
                    'customer_code' => $this->request->getVar('customer_code'),
                    'name'          => $this->request->getVar('name'),
                    'phone_number'  => $this->request->getVar('phone_number'),
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
            $customer_id = $this->request->getVar('customer_id');
            $row         = $this->customerModel->get($customer_id);
            $data = [
                'customer_id'   => $row['customer_id'],
                'customer_code' => $row['customer_code'],
                'name'          => $row['name'],
                'phone_number'  => $row['phone_number'],
                'address'       => $row['address'],
            ];
            $message['okay'] = view('master-data/customer/modal-confirm', $data);
            $message['data'] = $data;
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    public function destroy()
    {
        if ($this->request->isAJAX()) {
            $customer_id = $this->request->getVar('customer_id');
            $this->customerModel->delete($customer_id);
            $message['success'] = 'Data removed successfully!';
            echo json_encode($message);
        } else {
            exit('Sorry.. we cannot proccess your request');
        }
    }

    //--------------------------------------------------------------------

}
