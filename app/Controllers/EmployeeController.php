<?php namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\CompanyModel;

class EmployeeController extends BaseController {
    public function index($companyId) {
        //getting data from model
        $model = new EmployeeModel();
        $data['employees'] = $model->where('company_id', $companyId)->findAll();
        $data['company_id'] = $companyId;
        //echo 'here';
        //var_dump($data['employees']); // Debugging line

        //passing data to the view
        echo view('header');
        echo "<!-- Header Loaded -->";
        return view('employees/index', $data);
        echo "<!-- Main Content Loaded -->";
        echo view('footer');
        echo "<!-- Footer Loaded -->";
    }


    public function create($companyId) {
        $data['company_id'] = $companyId;

        echo view('header');
        echo "<!-- Header Loaded -->";

        return view('employees/create', $data);
        echo "<!-- Main Content Loaded -->";

        echo view('footer');
        echo "<!-- Footer Loaded -->";
    }

    public function store($companyId) {
        //print_r($companyId);
        // passing data to model to insert in db
        $model = new EmployeeModel();
        $model->save([
            'employee_name' => $this->request->getVar('employee_name'),
            'employee_joining_date' => $this->request->getVar('employee_joining_date'),
            'company_id' => $companyId, // Use the companyId parameter directly
        ]);

        // generating view 
        echo view('header');
        echo "<!-- Header Loaded -->";
        return redirect()->to('/employees/index/' . $companyId);
        echo "<!-- Main Content Loaded -->";
        echo view('footer');
        echo "<!-- Footer Loaded -->";
    }
    

    public function edit($id) {
        // passing data to model
        $model = new EmployeeModel();
        $data['employee'] = $model->find($id);
        $data['company_id'] = $data['employee']['company_id']; // Get the company ID to use in the form
        // generating view 
        echo view('header');
        echo "<!-- Header Loaded -->";
        return view('employees/edit', $data);
        echo "<!-- Main Content Loaded -->";
        echo view('footer');
        echo "<!-- Footer Loaded -->";
    }
    

    public function update() {
        // passing data to model
        $model = new EmployeeModel();
        $id = $this->request->getVar('employee_id');
        
        // Debugging output
        //var_dump($this->request->getPost());
        //print_r($id);
        
        if ($id) {
            $model->update($id, [
                'employee_name' => $this->request->getVar('employee_name'),
                'employee_joining_date' => $this->request->getVar('employee_joining_date'),
            ]);
            //generating view
            echo view('header');
            echo "<!-- Header Loaded -->";
            return redirect()->to('/employees/index/' . $this->request->getVar('company_id'));
            echo "<!-- Main Content Loaded -->";
            echo view('footer');
            echo "<!-- Footer Loaded -->";

        } else {
            //generating view
            echo view('header');
            echo "<!-- Header Loaded -->";
            return redirect()->to('/employees/index')->with('error', 'Employee ID is missing.');
            echo "<!-- Main Content Loaded -->";
            echo view('footer');
            echo "<!-- Footer Loaded -->";
        }
    }
    
    
    public function delete($id, $companyId) {
        // passing data to model
        $model = new EmployeeModel();
        $model->delete($id);
        //echo($companyId);
        //echo($id);

        //generating view
        echo view('header');
        echo "<!-- Header Loaded -->";
       
        return redirect()->to('/employees/index/'. $companyId);
        echo "<!-- Main Content Loaded -->";
        
        echo view('footer');
        echo "<!-- Footer Loaded -->";
    }
    
}
