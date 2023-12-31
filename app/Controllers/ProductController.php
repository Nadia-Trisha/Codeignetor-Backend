<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;



class ProductController extends BaseController
{

    private $products ;
    private $category;
    protected $helpers = ['form'];


    public function __construct()
    {
        $this->products = new ProductModel();
        $this->category = new CategoryModel();
    }

    public function index()
    {
        $data['items'] = $this->products->findAll();
        $data['title'] = "Display all product";
        
        // print_r($data);
        return view('products/index', $data);
    }
    
    public function create(){
        $this->products->join('category','category_id = products.category_id');
        $data['items'] = $this->category->findAll();
        return view('products/create', $data);
    }

    public function edit($id){
        //echo $id;
        $data = $this->products->find($id);
        // print_r($data);
        return view('products/edit', $data);

    }


    public function update($id){
        // $this->products = new ProductModel(); 
        $data = [
            'product' => $this->request->getPost('product'),
            'category' => $this->request->getPost('category'),
            'model' => $this->request->getPost('model'),
            'price' => $this->request->getPost('price'),
            'sku' => $this->request->getPost('sku'),
        ];
        $this->products->update($id, $data);
        $session = session();
        $session->setFlashdata('msg','Updated Successfully');
        $this->response->redirect('/products');
    }



    public function delete($id){
        //echo $id;
        $this->products->where('id', $id);
        $this->products->delete();
        $session = session();
        $session->setFlashdata('msg', 'Deleted Successfully');
        //return redirect("products");
        $this->response->redirect('/products');
    }

    public function store(){
        // return $this->request->getVar('product');
        $data = [
            'product' => $this->request->getVar('product'),
            'category_id' => $this->request->getVar('category'),
            'model' => $this->request->getVar('model'),
            'price' => $this->request->getVar('price'),
            'sku' => $this->request->getVar('sku'),
            // 'photo'=> $this->request->getFile('photo')->getName(''),
        ];

        $rules = [
            'product' => 'required|max_length[30]|min_length[3]',
            'price' => 'required|numeric',
            'sku' => 'required|min_length[3]',
            // 'photo' =>'uploaded[photo]|max_size[photo,1024]|ext_in[photo,jpg,jpeg]'
        ];

        if(! $this->validate($rules)){
            return view('products/create');
        }else{
            // $img = $this->request->getfile('photo');
            // $img->move(WRITEPATH.'uploads');
            $this->products->insert($data);
            $session = session();
            $session->setFlashdata('msg', 'Inserted Successfully');
            $this->response->redirect('/products');
        }



    }
}
