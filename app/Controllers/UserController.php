<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function home()
    {
        $main = new UserModel;
        $data =[
            'items' => $main->findAll()
        ];
        return view ('ecommerce');
    }
}
