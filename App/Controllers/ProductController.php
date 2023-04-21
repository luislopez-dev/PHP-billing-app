<?php

namespace App\Controllers;

use App\Interfaces\IPhotoService;
use App\Interfaces\IProductRepository;
use Symfony\Component\HttpFoundation\Response;

class ProductController implements IProductRepository
{
    private IPhotoService $photoService;
    public function __construct(IPhotoService $photoService)
    {
        $this->photoService = $photoService;
    }
    public function index(): Response{
        $message = $this->photoService->printMessage();
        return (new Response())->setContent($message);
    }
}