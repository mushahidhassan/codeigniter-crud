<?php namespace App\Models;

use CodeIgniter\Model;

class ApiModel extends Model {
    protected $table = 'posts'; // Your table name
    protected $primaryKey = 'id'; // Primary key
    protected $allowedFields = ['title', 'body']; // Columns you want to fill


    public function getPosts($limit, $offset, $filter = null) {
        if ($filter) {
            return $this->like('title', $filter)
                        ->orLike('body', $filter)
                        ->findAll($limit, $offset);
        }
        return $this->findAll($limit, $offset);
    }

    public function getPostCount($filter = null) {
        if ($filter) {
            return $this->like('title', $filter)
                        ->orLike('body', $filter)
                        ->countAllResults();
        }
        return $this->countAll();
    }
    
}