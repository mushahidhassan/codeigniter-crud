<?php namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model {
    protected $table = 'Company';
    protected $primaryKey = 'company_id';
    protected $allowedFields = ['company_name', 'company_date_created', 'company_business'];


    public function getCompanies($limit, $offset)
    {
        return $this->findAll($limit, $offset);
    }

    public function getTotalCompanies()
    {
        return $this->countAll();
    }
        
}
