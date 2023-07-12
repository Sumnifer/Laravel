<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LoanMaterial;
use App\Models\TakeOver;
use App\Models\Ticket;



class WorkshopController extends Controller
{
    public function index()
    {
        $loanMaterials = LoanMaterial::all();
//        $materials = Material::all();
        $takeOvers = TakeOver::all();
//        $customerServices = CustomerServices::all();

        return view('workshop.index', compact('loanMaterials',  'takeOvers'));
    }


}

