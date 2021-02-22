<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    
    public function home()
    {
        return view('backend/home');
    }

}
