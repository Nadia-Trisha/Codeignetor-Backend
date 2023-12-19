<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $helpers= ['form'];
    public function index()
    {
        return view('login');
    }

    public function login(){
       $session= session();
       $userModel =new UserModel();
      $email= $this->request->getvar('email');
      $formpass = $this->request->getvar('password');

    //   $formpass=password_hash($formpass,PASSWORD_DEFAULT);

     $data= $userModel->where('email',$email)->first();

    //  print_r($data);

     if($data){
        $ddpass= $data['password'];
        $verified= password_verify($formpass,$ddpass);
        if($verified){

            $userData= [
                "name" => $data['name'],
                "email" => $data['email'],
                "user_role" => $data['role'],
                'isLoggedIn' => TRUE
            ];
            $session->set($userData);
            if($data['role']=="Admin"){
                return redirect()->to('/');
            }
           
            if($data['role']=="Editor"){
            return redirect()->to('/editor');
            
        }
            // echo "verified";
            
        
        
        
        }else{
            $session->setFlashdata('msg','Your password is incorrect');
            return redirect()->to('/login');
        }

     }else {
        $session->setFlashdata('msg','Your Email is incorrect');
        return redirect()->to('/login');
        // echo "wrong";
     }
     
      
      
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('login');
    }
}


