<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
//use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo;

    public function redirectTo(){
        switch(Auth::user()->role){
            case 1:
                $this->redirectTo = 'admin';
                return $this->redirectTo;
                break;
            case 2:
                
                $this->redirectTo= 'student';
                return $this->redirectTo;
            case 3:
                $this->redirectTo= 'teacher';
                return $this->redirectTo; 
                case 4:
                    $this->redirectTo= 'home';
                    return $this->redirectTo;    
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;        
            }
                
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(Auth::check() && Auth::user()->role == 'admin'){
            $this->redirectTo = route('admin');
        } elseif(Auth::check() && Auth::user()->role == 'student'){
            $this->redirectTo = route('student');
        }
         elseif(Auth::check() && Auth::user()->role == 'null'){
            $this->redirectTo = route('home');
        }
         elseif(Auth::check() && Auth::user()->role == 'teacher'){
            $this->redirectTo = route('teacher');
    }
        $this->middleware('guest')->except('logout');
    }
}