<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function dashboard()
    {
        $open = ServiceOrder::where('status', '!=', 'Finalizada')->where('status', '!=', 'Cancelada')->count();
        $budget = ServiceOrder::where('status', 'Orçamento')->count();
        $bill = ServiceOrder::where('status', 'Finalizada')->OrWhere('billed', null)->get()->count();
        $parts = ServiceOrder::where('status', 'Aguardando Peça')->count();

        return view('dashboard', [
            'open' => $open,
            'budget' => $budget,
            'bill' => $bill,
            'parts' => $parts
        ]);
    }
}
