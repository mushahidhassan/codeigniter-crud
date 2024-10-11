<?php namespace App\Controllers;

use App\Models\ApiModel;
use CodeIgniter\Controller;

class ApiDataController extends Controller {
    
    protected $apiModel;

    public function __construct() {
        $this->apiModel = new ApiModel();
    }

    public function fetchData() {
        //for fecting data from external dummy API 
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

        echo view('header');
        
        //Based on the initial state call to the view 
        //only one view should handle this selection, visibility of view object to be moved to the view itself not here
        $data['storedPosts'] = $this->apiModel->findAll();
        if (empty($data['storedPosts'])) {
            //$data['message'] = "No posts have been stored.";
            echo view('api/index', $data);
        }
        else 
        {
            echo view('api/index2', $data);
        }
        
        echo view('footer');
    }

    public function storeData() {
        //for storing data from api to the local database
        $client = \Config\Services::curlrequest();
        $response = $client->get('https://jsonplaceholder.typicode.com/posts');

        if ($response->getStatusCode() == 200) {
            $posts = json_decode($response->getBody(), true);
            foreach ($posts as $post) {
                $this->apiModel->save([
                    'title' => $post['title'],
                    'body' => $post['body'],
                ]);
            }
            return $this->loadDataView();
        } else {
            $data['storedPosts'] = [];
            echo view('header');
            echo view('api/load', $data);
            echo view('footer');
        }
    }
    

    public function loadDataView() {
        //fectching data from model and then generating view with the pagination and text filter
        $currentPage = $this->request->getVar('page') ?? 1;
        $limit = 5;
        $offset = ($currentPage - 1) * $limit;
        $filter = $this->request->getVar('filter');
    
        // Debugging output
        log_message('info', "Current Page: $currentPage, Filter: $filter");
    
        $data['storedPosts'] = $this->apiModel->getPosts($limit, $offset, $filter);
        $data['totalPosts'] = $this->apiModel->getPostCount($filter);
        $data['filter'] = $filter;
        $data['currentPage'] = $currentPage;
        $data['limit'] = $limit;
    
        echo view('header');
        echo view('api/load', $data);
        echo view('footer');
    }
    
    public function delete($id) {        
        //echo "Attempting to delete post with ID: $id"; // Temporary debug output
        $this->apiModel->delete($id);

        $currentPage = $this->request->getVar('page') ?? 1;
        $limit = 5;
        $offset = ($currentPage - 1) * $limit;
        $filter = $this->request->getVar('filter');
    
        // Debugging output
        log_message('info', "Current Page: $currentPage, Filter: $filter");
    
        $data['storedPosts'] = $this->apiModel->getPosts($limit, $offset, $filter);
        $data['totalPosts'] = $this->apiModel->getPostCount($filter);
        $data['filter'] = $filter;
        $data['currentPage'] = $currentPage;
        $data['limit'] = $limit;
    
        echo view('header');
        echo view('api/load', $data);
        echo view('footer');
    }


    public function edit($id) {
        $post = $this->apiModel->find($id);
    
        if (!$post) {
            return redirect()->to('/api/load')->with('error', 'Post not found.');
        }
    
        // Load the edit view with post data
        $data['post'] = $post;
        
       // state of current page and filter
       $data['currentPage'] = $this->request->getVar('page') ?? 1;
       $data['filter'] = $this->request->getVar('filter');


        echo view('header');
        echo view('api/edit', $data);
        //var_dump ($data);exit;
        echo view('footer');
    }

    public function update($id) {
        // Validate the form data
        $this->validate([
            'title' => 'required|min_length[3]',
            'body' => 'required'
        ]);
    
        // Update the post
        $this->apiModel->update($id, [
            'title' => $this->request->getVar('title'),
            'body' => $this->request->getVar('body')
        ]);
    
        // state of current page and filter
        $currentPage = $this->request->getVar('page') ?? 1;
        $filter = $this->request->getVar('filter');
    
        // Redirect back to the load page with pagination parameters
        return redirect()->to('/api/load?page=' . $currentPage . '&filter=' . esc($filter))->with('success', 'Post updated successfully.');


    }
    

}
