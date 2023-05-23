<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Intervention;
use App\Models\Ticket;



class DashboardController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()->paginate(10);
        $interventions = Intervention::latest()->paginate(10);

        return view('dashboard', ['tickets' => $tickets, 'interventions' => $interventions]);
    }

}

