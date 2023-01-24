<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Companycarrer;
use App\Models\Careerdocument;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $companycarrers = Companycarrer::all();
        $careerdocuments = Careerdocument::orderBy('created_at', 'DESC')->paginate(3);

        return view('front.career', compact(
            'companycarrers',
            'careerdocuments'
        ));
    }
}
