<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'product_categories')]
class ProductCategories
{
    private int $product_id;
    private int $category_id;
}