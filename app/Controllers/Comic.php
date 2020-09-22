<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comic extends BaseController
{
    protected $comicModel;

    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }

    public function index()
    {
        $data['title'] = ucwords("list of comic");
        $data['list']  = $this->comicModel->get();
        return view('master-data/comic/index', $data);
    }

    public function show($slug)
    {
        $data['title'] = ucwords("detail of comic");
        $data['comic'] = $this->comicModel->get($slug);
        if (empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ops ' . $slug . ' comic title not found');
        }
        return view('master-data/comic/show', $data);
    }

    public function create()
    {
        $data['title']      = ucwords("create comic");
        $data['list']       = $this->comicModel->get();
        $data['validation'] = \Config\Services::validation();
        return view('master-data/comic/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title'     => 'required|is_unique[comic.title]',
            'author'    => 'required',
            'publisher' => 'required',
            'cover'     => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
            'detail'    => 'required',
        ])) {
            return redirect()->to('/comic/create')->withInput();
        }
        # get image
        $fileImage = $this->request->getFile('cover');
        # check & get filename
        if ($fileImage->getError() == 4) {
            $cover = 'default.png';
        } else {
            $cover = $fileImage->getRandomName();
        }
        # move file to folder img
        $fileImage->move('img', $cover);

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->comicModel->save([
            'title'     => $this->request->getVar('title'),
            'slug'      => $slug,
            'author'    => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover'     => $cover,
            'detail'    => $this->request->getVar('detail'),
        ]);
        session()->setFlashdata('message', '<strong>OK</strong> Data added successfully!');
        return redirect()->to('/comic');
    }

    public function edit($slug)
    {
        $data['title']      = ucwords("edit comic");
        $data['comic']      = $this->comicModel->get($slug);
        $data['validation'] = \Config\Services::validation();
        return view('master-data/comic/edit', $data);
    }

    public function update($id)
    {
        $slug     = $this->request->getVar('slug');
        $oldComic = $this->comicModel->get($slug);

        if ($oldComic['title'] == $this->request->getVar('title')) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[comic.title]';
        }

        if (!$this->validate([
            'title'     => $rules,
            'author'    => 'required',
            'publisher' => 'required',
            'cover'     => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
            'detail'    => 'required',
        ])) {
            return redirect()->to('/comic/edit/' . $slug)->withInput();
        }

        # get image
        $fileImage = $this->request->getFile('cover');
        # check & get filename
        if ($fileImage->getError() == 4) {
            $cover = $this->request->getVar('slug');;
        } else {
            $cover = $fileImage->getRandomName();
            # move file to folder img
            $fileImage->move('img', $cover);

            $comic = $this->comicModel->find($id);
            if ($comic['cover'] != 'default.png') {
                # delete old file in folder img
                unlink('img/' . $this->request->getVar('oldCover'));
            }
        }

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->comicModel->save([
            'id'        => $id,
            'title'     => $this->request->getVar('title'),
            'slug'      => $slug,
            'author'    => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover'     => $cover,
            'detail'    => $this->request->getVar('detail'),
        ]);
        session()->setFlashdata('message', '<strong>OK</strong> Data has been changed successfully!');
        return redirect()->to('/comic');
    }

    //--------------------------------------------------------------------

}
