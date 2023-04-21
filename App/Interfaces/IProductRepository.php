<?php

namespace App\Interfaces;

use Symfony\Component\HttpFoundation\Response;

interface IProductRepository
{
    public function index() : Response;
}