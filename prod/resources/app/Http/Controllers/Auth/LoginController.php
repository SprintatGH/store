<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectPath()
    { 

     
        if (auth()->user()->perfil_id == 7){
            return 'dashboardAdmin';
        }   elseif (auth()->user()->perfil_id == 8){
            return 'dashboardAdmin';
        }   else {
            return 'home';
        } 
    }


    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}
