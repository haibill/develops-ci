<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table          = "comic";
    protected $useSoftDeletes = true;
    protected $useTimestamps  = true;
    protected $deletedField   = 'deleted_at';
    protected $allowedFields  = ['title', 'slug', 'author', 'publisher', 'cover', 'detail'];

    public function get($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
