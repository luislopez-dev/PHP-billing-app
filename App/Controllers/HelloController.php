<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function index(Request $request)
    {
        $response = new Response();
        $response->setContent('Welcome to the hello controller!');
        return $response;
    }
}