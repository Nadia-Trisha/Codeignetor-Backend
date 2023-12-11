<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class FrontendProductController extends BaseController
{   use ResponseTrait;
    public function index()
    {
       $productmodel= new productmodel();
       $data = $productmodel->findAll();
       return $this->respond($data);
    }


    // get single product
    public function show($id = null)
    {
        $model = new ProductModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
}
