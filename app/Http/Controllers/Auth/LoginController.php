<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\Request;
//use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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
    //protected $redirectTo='/home';

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
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;        
            }
                
    }
   /*  public function showLogin(Request $request)
    {  
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))){
            if(Auth::check() && Auth::user()->role == 'admin'){
                return $this->redirectTo; 
            }
            else if(auth()->user()->role == 'student') {
                return redirect('student');
            }
            else if(auth()->user()->role == 'teacher') {
                return redirect('teacher');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email & Password are incorrect.');
        }     
    } */

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
         elseif(Auth::check() && Auth::user()->role == 'teacher'){
            $this->redirectTo = route('teacher');
        }
        $this->middleware('guest')->except('logout');
    }
}