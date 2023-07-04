<?php

namespace App\Controllers;

use App\Entities\Invoice;
use App\Interfaces\IInvoicingService;
use Symfony\Component\HttpFoundation\Request;
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
        $invoices = $this->invoicingService->getInvoices();
        $content = $view->render(['invoices' => $invoices]);
        return new Response($content);
    }

    public function new(): Response {
        $view = $this->twig->load('Invoicing/new.html.twig');
        $content = $view->render();
        return new Response($content);
    }

    public function show(Request $request): Response {
        $id = (int)$request->query->get('id');
        if (empty($id)) {
            throw new \InvalidArgumentException("ID is required");
        }
        $invoice = $this->invoicingService->getInvoiceById($id);
        $view = $this->twig->load('Invoicing/show.html.twig');
        $content = $view->render(['invoice' => $invoice]);
        return new Response($content);
    }

    public function create(Request $request) : void {

    }

    public function destroy(int $id) : Response {
        return new Response();
    }
}