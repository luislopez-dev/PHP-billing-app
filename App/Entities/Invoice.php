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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNit(): string
    {
        return $this->nit;
    }

    /**
     * @param string $nit
     */
    public function setNit(string $nit): void
    {
        $this->nit = $nit;
    }

    /**
     * @return string
     */
    public function getClientName(): string
    {
        return $this->clientName;
    }

    /**
     * @param string $clientName
     */
    public function setClientName(string $clientName): void
    {
        $this->clientName = $clientName;
    }

    /**
     * @return int
     */
    public function getTotalDiscount(): int
    {
        return $this->total_discount;
    }

    /**
     * @param int $total_discount
     */
    public function setTotalDiscount(int $total_discount): void
    {
        $this->total_discount = $total_discount;
    }

    /**
     * @return float
     */
    public function getDiscountAmount(): float
    {
        return $this->discount_amount;
    }

    /**
     * @param float $discount_amount
     */
    public function setDiscountAmount(float $discount_amount): void
    {
        $this->discount_amount = $discount_amount;
    }

    /**
     * @return int
     */
    public function getTaxAmount(): int
    {
        return $this->tax_amount;
    }

    /**
     * @param int $tax_amount
     */
    public function setTaxAmount(int $tax_amount): void
    {
        $this->tax_amount = $tax_amount;
    }

    /**
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    /**
     * @param int $total_amount
     */
    public function setTotalAmount(int $total_amount): void
    {
        $this->total_amount = $total_amount;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->payment_method;
    }

    /**
     * @param string $payment_method
     */
    public function setPaymentMethod(string $payment_method): void
    {
        $this->payment_method = $payment_method;
    }

    /**
     * @return string
     */
    public function getPaymentStatus(): string
    {
        return $this->payment_status;
    }

    /**
     * @param string $payment_status
     */
    public function setPaymentStatus(string $payment_status): void
    {
        $this->payment_status = $payment_status;
    }


}
