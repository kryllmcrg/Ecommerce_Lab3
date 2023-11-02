<?php 
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    public function view($id)
    {
        // Load the product data from your database based on $productId
        $userModel = new UserModel();
        $data['products'] = $userModel->find($id);

        // Pass the product data to a view and display it
        return view('product_view', $data);
    }
}

?>