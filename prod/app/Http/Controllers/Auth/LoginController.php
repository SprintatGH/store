<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Constants\Administrador;



class LoginController extends Controller

{

 

    use AuthenticatesUsers;



    public function __construct()

    {

        $this->middleware('guest')->except('logout');

    }





    public function redirectPath()

    { 

        if (auth()->user()->perfil_id == Administrador::DASHBOARD_ADMINISTRADOR_CLIENTE){
       
            return 'dashboardAdminCliente';

        }   elseif (auth()->user()->perfil_id == Administrador::DASHBOARD_CLIENTE){
    
            return 'dashboardCliente'; 

        }   elseif (auth()->user()->perfil_id == Administrador::DASHBOARD_ADMINISTRADOR){
         
            return 'dashboardAdmin';

        }   else { 

            return 'dashboardDemo';

        }

    } 





    public function logout()

    {

        Auth::logout();
        return redirect('login');

    }

}

