<?php

namespace App\Controllers;

use App\Models\PeopleModel;

class PeopleV2 extends BaseController
{
    protected $peopleModel;

    public function __construct()
    {
        $this->peopleModel = new PeopleModel();
    }

    public function index()
    {
        $data['title']   = ucwords("list of people");
        $data['menu']    = ucwords("master data");
        $data['submenu'] = ucwords("people v2");
        $data['list']    = $this->peopleModel->get();
        return view('master-data/people/index-v2', $data);
    }

    public function show($slug)
    {
        $data['title'] = ucwords("detail of people");
        $data['people'] = $this->peopleModel->get($slug);
        if (empty($data['people'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ops ' . $slug . ' people title not found');
        }
        return view('master-data/people/show', $data);
    }

    // public function create()
    // {
    //     $data['title']      = ucwords("create people");
    //     $data['list']       = $this->peopleModel->get();
    //     $data['validation'] = \Config\Services::validation();
    //     return view('master-data/people/create', $data);
    // }

    // public function store()
    // {
    //     if (!$this->validate([
    //         'title'     => 'required|is_unique[people.title]',
    //         'author'    => 'required',
    //         'publisher' => 'required',
    //         'cover'     => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
    //         'detail'    => 'required',
    //     ])) {
    //         return redirect()->to('/people/create')->withInput();
    //     }
    //     # get image
    //     $fileImage = $this->request->getFile('cover');
    //     # check & get filename
    //     if ($fileImage->getError() == 4) {
    //         $cover = 'default.png';
    //     } else {
    //         $cover = $fileImage->getRandomName();
    //     }
    //     # move file to folder img
    //     $fileImage->move('img', $cover);

    //     $slug = url_title($this->request->getVar('title'), '-', true);
    //     $this->peopleModel->save([
    //         'title'     => $this->request->getVar('title'),
    //         'slug'      => $slug,
    //         'author'    => $this->request->getVar('author'),
    //         'publisher' => $this->request->getVar('publisher'),
    //         'cover'     => $cover,
    //         'detail'    => $this->request->getVar('detail'),
    //     ]);
    //     session()->setFlashdata('message', '<strong>OK</strong> Data added successfully!');
    //     return redirect()->to('/people');
    // }

    // public function edit($slug)
    // {
    //     $data['title']      = ucwords("edit people");
    //     $data['people']      = $this->peopleModel->get($slug);
    //     $data['validation'] = \Config\Services::validation();
    //     return view('master-data/people/edit', $data);
    // }

    // public function update($id)
    // {
    //     $slug     = $this->request->getVar('slug');
    //     $oldComic = $this->peopleModel->get($slug);

    //     if ($oldComic['title'] == $this->request->getVar('title')) {
    //         $rules = 'required';
    //     } else {
    //         $rules = 'required|is_unique[people.title]';
    //     }

    //     if (!$this->validate([
    //         'title'     => $rules,
    //         'author'    => 'required',
    //         'publisher' => 'required',
    //         'cover'     => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
    //         'detail'    => 'required',
    //     ])) {
    //         return redirect()->to('/people/edit/' . $slug)->withInput();
    //     }

    //     # get image
    //     $fileImage = $this->request->getFile('cover');
    //     # check & get filename
    //     if ($fileImage->getError() == 4) {
    //         $cover = $this->request->getVar('slug');;
    //     } else {
    //         $cover = $fileImage->getRandomName();
    //         # move file to folder img
    //         $fileImage->move('img', $cover);

    //         $people = $this->peopleModel->find($id);
    //         if ($people['cover'] != 'default.png') {
    //             # delete old file in folder img
    //             unlink('img/' . $this->request->getVar('oldCover'));
    //         }
    //     }

    //     $slug = url_title($this->request->getVar('title'), '-', true);
    //     $this->peopleModel->save([
    //         'id'        => $id,
    //         'title'     => $this->request->getVar('title'),
    //         'slug'      => $slug,
    //         'author'    => $this->request->getVar('author'),
    //         'publisher' => $this->request->getVar('publisher'),
    //         'cover'     => $cover,
    //         'detail'    => $this->request->getVar('detail'),
    //     ]);
    //     session()->setFlashdata('message', '<strong>OK</strong> Data has been changed successfully!');
    //     return redirect()->to('/people');
    // }

    //--------------------------------------------------------------------

}
