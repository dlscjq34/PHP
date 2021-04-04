<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index()
    {
      
    }
    
    // public function view($page)
    // {
    //     if ( ! is_file(APPPATH.'Views/member/'.$page.'.php'))
    //     {
    //         echo APPPATH.'Views/member'.$page.'.php';
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    //     }
    //     $data['title'] = ucfirst($page); // Capitalize the first letter
    //     echo view('layout/header', $data);
    //     echo view('member/'.$page, $data);
    //     echo view('layout/footer', $data);
    // }
}

?>