<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data = [];

    public function __construct()
    {
        $this->data['main_menu'] = 'User';
        $this->data['sub_menu'] = 'users';
        $this->data['dashboard'] = 'dashboard';
        $this->data['tab_menu'] = '';
    }
}
