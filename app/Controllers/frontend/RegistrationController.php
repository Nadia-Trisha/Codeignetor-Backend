<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use CachingIterator\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class RegistrationController extends BaseController
{
    use ResponseTrait;

    public function Registration()
    {
        return $this->respond('hello') ;
    }
}
