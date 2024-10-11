<?php namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\ApiModel;


class CompanyController extends BaseController {


    public function index() {

        //get data from Model
        $model = new CompanyModel();
        $data['companies'] = $model->findAll();

        echo view('header');
        echo "<!-- Header Loaded -->";

        //passing data from Model to the view
        
        echo view('companies/index', $data);
        echo "<!-- Main Content Loaded -->";
        
        echo view('footer');
        echo "<!-- Footer Loaded -->";

    }
       

    public function create() 
    {
        echo view('header');
        echo "<!-- Header Loaded -->";
        
        return view('companies/create');
        echo "<!-- Main Content Loaded -->";
        
        echo view('footer');
        echo "<!-- Footer Loaded -->";
    }

    public function store() {
        //save data to Model
        $model = new CompanyModel();
        $model->save([
            'company_name' => $this->request->getVar('company_name'),
            'company_date_created' => $this->request->getVar('company_date_created'),
            'company_business' => $this->request->getVar('company_business'),
        ]);
        
        
        // Load the view to display the data
        echo view('header');
        echo "<!-- Header Loaded -->";
        
        return redirect()->to('/');
        echo "<!-- Main Content Loaded -->";
        
        echo view('footer');
        echo "<!-- Footer Loaded -->";

    }

    public function edit($id) {
        //data to the Model for and then to view for editing

        $model = new CompanyModel();
        $data['company'] = $model->find($id);


        // Load the view to display the data       
        echo view('header');
        echo "<!-- Header Loaded -->";

       
        return view('/companies/edit', $data);
        echo "<!-- Main Content Loaded -->";
       
        echo view('footer');
        echo "<!-- Footer Loaded -->";
    }

    public function update() {
        //data to the Model for updating
        $model = new CompanyModel();
        $id = $this->request->getVar('company_id');
        $model->update($id, [
            'company_name' => $this->request->getVar('company_name'),
            'company_date_created' => $this->request->getVar('company_date_created'),
            'company_business' => $this->request->getVar('company_business'),
        ]);
        
        // Load the view to display the data and redirection to home
        echo view('header');
        echo "<!-- Header Loaded -->";
       
        return redirect()->to('/');
        echo "<!-- Main Content Loaded -->";
       
        echo view('footer');
        echo "<!-- Footer Loaded -->";

    }

    public function delete($id) {
        //data to the Model for delete
        $model = new CompanyModel();
        $model->delete($id);

        // Load the view to display the data and redirection to home
        echo view('header');
        echo "<!-- Header Loaded -->";
       
        return redirect()->to('/');
        echo "<!-- Main Content Loaded -->";
       
        echo view('footer');
        echo "<!-- Footer Loaded -->";

    }


    //Move fectchapidata and storeapidata functions to new a controller to be deleted later
    public function fetchApiData()
    {
        $client = \Config\Services::curlrequest();

        try {
        $response = $client->get('https://jsonplaceholder.typicode.com/posts');
            if ($response->getStatusCode() == 200) {
                $data['posts'] = json_decode($response->getBody(), true);
            } else {
                $data['posts'] = [];
            }
        } catch (\Exception $e) {
        $data['error'] = $e->getMessage();
        }
        //To Check fetched data
        //var_dump($data['posts']); // Show fetched posts
        //exit;


        // Load the view to display the data
        echo view('header');
        echo view('api/index', $data);
        echo view('footer');
    }

    public function storeApiData()
    {
        $client = \Config\Services::curlrequest();
        $response = $client->get('https://jsonplaceholder.typicode.com/posts');

        if ($response->getStatusCode() == 200) {
            $posts = json_decode($response->getBody(), true);
            
            //var_dump($posts);
            //exit;

            $apiModel = new ApiModel();           
            // Insert each post into the database
            foreach ($posts as $post) {
                $apiModel->save([
                    'title' => $post['title'],
                    'body' => $post['body'],
                ]);

            }

            // Optionally, fetch the stored data to display it
            $data['storedPosts'] = $apiModel->findAll();
            //var_dump($data['storedPosts']);
            //echo 'Loc1'; //exit;
            echo view('header');
            echo view('api/load', $data);
            echo view('footer');

        } else {
            $data['storedPosts'] = [];
            var_dump($data['storedPosts']);
            //echo 'Loc2';//exit;
        }
    }

}
