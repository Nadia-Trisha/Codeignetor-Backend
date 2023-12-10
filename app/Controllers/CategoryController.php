<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class CategoryController extends BaseController
{  
    // private $products;
    private $category ;
    protected $helpers = ['form'];

    public function __construct()
    {
        // $this->products = new ProductModel();
        $this->category = new CategoryModel();
    }

    public function index()
    {
        $category = new CategoryModel();
        $data['items'] = $category->findAll();
        $data['title'] ="Cetagory list";
        return view('category/index', $data);
    }


    public function create(){
        return view('category/create');
    }


    public function store(){
        $data = [
            'category' => $this->request->getVar('category'),
        ];

        if($data){
            $this->category->insert($data);
        $session = session();
        $session->setFlashdata('msg', 'Inserted Successfully');
        $this->response->redirect('/category');
        }else {
            return view('category/create');
        }

        }

        public function update(){
            return view('category/edit/(:num)');
        }


        
    }

    

