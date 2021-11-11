<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $ApiArray;
    public function __construct()
    {
        $this->apiArray = array();
        $this->apiArray['status'] = false;
        $this->apiArray['data'] = NULL;
        $this->apiArray['message'] = NULL;
    }
}
