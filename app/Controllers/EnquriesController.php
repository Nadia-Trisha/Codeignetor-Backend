<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Enquries;

class EnquriesController extends BaseController
{   
         private $products ;
        
        protected $helpers = ['form'];
        public function __construct()
        {
            $this->products = new Enquries();
           
        }
    
    
        public function index()
        {
            $data['items'] = $this->products->findAll();
            $data['title'] = "Display all product";
            
            // print_r($data);
            return view('Enquries/index', $data);
        }


        public function delete($id){
            //echo $id;
            $this->products->where('id', $id);
            $this->products->delete();
            $session = session();
            $session->setFlashdata('msg', 'Deleted Successfully');
            //return redirect("products");
            $this->response->redirect('/enquries');
        }
    

        public function edit($id){
            //echo $id;
            $data = $this->products->find($id);
            // print_r($data);
            return view('enquries/edit', $data);

    
        }

        public function update($id){
            // $this->products = new ProductModel(); 
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'subject' => $this->request->getPost('subject'),
                'method' => $this->request->getPost('method'),
               
            ];
            $this->products->update($id, $data);
            $session = session();
            $session->setFlashdata('msg','Updated Successfully');
            $this->response->redirect('/enquries/update');
        }
        
    }

