<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
class AdminController extends BaseController
{
    public function login()
    {
        helper (['form']);
        return view('adminlog');
    }
    public function register()
    {
        helper (['form']);
        $data = [];
        return view('adminreg');
    }
    
    public function authreg()
    {
        helper (['form']);
        $rules = [
           'username' => 'required|min_length[1]|max_length[25]',
           'password'=> 'required|min_length[1]|max_length[25]',
        ];
        if($this->validate($rules))
        {
            $adminModel = new AdminModel();
            $data =[
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)
            ];
            $adminModel->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation']= $this->validator;
            return view('register',$data);
        }
    }
    public function authlogin()
    {
       $session = session();
       $main = new AdminModel();
       $username = $this->request->getVar('username');
       $password = $this->request->getVar('password');
       $data = $main->where('username',$username)->first();
       if($data)
       {
        $pass = $data['password'];
        $authpass = password_verify($password, $pass);
        if($authpass)
        {
            $ses_dat =[
                'id' => $data['id'],
                'username' => $data['username'],
                'isloggedin' => true,
            ];
            $session->set($ses_dat);
            return redirect()->to('/register');
        }else{
            $session->setFlashdata('msg','Password is incorrect');
            return redirect()->to('/login');
        }
       }else{
        $session->setFlashdata('msg','ther is no such Uusername');
        return redirect()->to('/login');
       }
    }
}
