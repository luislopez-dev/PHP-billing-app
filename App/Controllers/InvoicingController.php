<?php

namespace App\Controllers;

use App\Interfaces\IInvoicingService;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class InvoicingController
{
    private IInvoicingService $invoicingService;
    public function __construct(IInvoicingService $invoiceService, public Environment $twig)
    {
        $this->invoicingService = $invoiceService;
    }

    public function index(): Response {
        $view = $this->twig->load('Invoicing/Index.html.twig');
        // $invoices = $this->invoicingService->getInvoices();
        $invoices = [];
        $content = $view->render(['invoices' => $invoices]);
        return new Response($content);
    }
    public function new(): Response {
        $view = $this->twig->load('Invoicing/new.html.twig');
        $content = $view->render();
        return new Response($content);
    }
}