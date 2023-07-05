<?php

namespace App\Entities;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table('invoice_products')]
class InvoiceProducts
{
    private int $invoice_id;
    private int $product_id;
}