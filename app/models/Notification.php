<?php

namespace App\Models;

use Libraries\Model;

class Notification extends Model
{
    public function __construct()
    {
        $this->table_name = 'notifications';
    }
}