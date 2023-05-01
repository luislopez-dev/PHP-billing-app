<?php

namespace App\Entities;
use Doctrine\ORM\Mapping as ORM;
// use Doctrine\DBAL\Types\DecimalType;

#[ORM\Entity]
#[ORM\Table(name: 'invoices')]
class Invoice
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(type: 'string')]
    private string $nit; // Clint tax identification number
    #[ORM\Column(type: 'string')]
    private string $clientName;
    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private int $total_discount;
    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private float $discount_amount;
    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private int $tax_amount;
    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private int $total_amount;
    #[ORM\Column(type: 'string')]
    private string $payment_method;
    #[ORM\Column(type: 'string')]
    private string $payment_status;
}