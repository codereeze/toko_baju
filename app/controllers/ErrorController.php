<?php

namespace App\Controllers;

use Libraries\Controller;

class ErrorController extends Controller
{
    public function __construct()
    {
        $this->layout = 'blank';
    }

    public function forbidden()
    {
        return $this->render('error/303', [
            'title' => 'Error 303: Forbidden Page'
        ]);
    }

    public function not_found()
    {
        return $this->render('error/404', [
            'title' => 'Error 404: Not Found Page'
        ]);
    }
}
