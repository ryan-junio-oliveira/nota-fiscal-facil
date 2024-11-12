<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\NFe;       // Modelo da Nota Fiscal
use App\Models\Product;   // Modelo de Produto
use App\Models\Client;    // Modelo de Cliente
use App\Models\Sale;

class Dashboard extends Component
{
    public $totalInvoices;
    public $totalProducts;
    public $totalClients;
    public $totalSales;

    public function __construct()
    {
        $this->totalInvoices = NFe::count();
        $this->totalProducts = Product::count();
        $this->totalClients = Client::count();
        $this->totalSales = Sale::count();
    }

    public function render()
    {
        return view('components.dashboard');
    }
}
