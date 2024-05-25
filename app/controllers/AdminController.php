<?php

namespace App\Controllers;

use Framework\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->layout = 'admin';
    }
    
    public function dashboard()
    {
        return $this->render('admin/dashboard', [
            'title' => 'Dashboard Admin'
        ]);
    }
}
