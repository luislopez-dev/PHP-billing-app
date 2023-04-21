<?php

namespace App\Services;

use App\Interfaces\IPhotoService;

class PhotoService implements IPhotoService
{
    function printMessage(): string {
        return "Hola mundo";
    }
}