<?php namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model {
    protected $table = 'Employee';
    protected $primaryKey = 'employee_id';
    protected $allowedFields = ['employee_name', 'employee_joining_date', 'company_id'];
}
