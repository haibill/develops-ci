<?php

namespace App\Models;

use CodeIgniter\Model;

class peopleModel extends Model
{
    protected $table = "people";
    protected $useTimestamps = true;
    // protected $allowedFields = ['title', 'slug', 'author', 'publisher', 'cover', 'detail'];

    public function get($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        // return $this->table('people')->like('name', $keyword)->orLike('address', $keyword)->orderBy('id', 'DESC');
        return $this->table('people')->like('name', $keyword)->orLike('address', $keyword);
    }
}
