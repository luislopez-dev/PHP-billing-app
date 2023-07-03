<?php

namespace App\Interfaces;

use App\Entities\Invoice;

interface IInvoicingService
{
    public function getInvoices(): array|object;
    public function getInvoiceById(int $id): Invoice;
}