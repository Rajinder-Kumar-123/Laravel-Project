<?php

namespace App\Http\Controllers;
use App\Models\registerModel;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Admin;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use DB;
use Crypt;
use Illuminate\Support\Str;
class registrationController extends Controller
{
    function registerInsert(Request $request){
        $request->validate([
            "name"=> "required",
            "email"=>"required|email",
            "password"=>"required|min:3|max:8",
            "re_password"=>"required|min:3|max:8"
        ]);

        $req= registerModel::where('email', $request->email)->get();
        if(sizeof($req)>0){
            return redirect('register')->with('message', 'Email is already exists');
        }
        $req= new registerModel;
        $req->name=$request->input('name');
        $req->email=$request->input('email');
        $req->password= Crypt::encrypt($request->input('password'));
        $req->re_password=Crypt::encrypt($request->input('re_password'));
        $req->role= $request->input('role');
        $req->save();
        return redirect('/')->with('message', 'Registration is successfully done');

    }
    public function loginFetch(Request $request, $id){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
    $user= registerModel::where('email', $request->input('email'))->get();
     /*  $user= registerModel::where('id', $id)->first('id', 'name')->admin;
      dd($user);
      exit; */
            
    if(Crypt::decrypt($user[0]->password)==$request->input('password')){
         if (registerModel::where('id', $id)->first('id', 'name')->admin) {
            return redirect('admin');
        }
         else if(registerModel::where('id', $id)->first('id', 'name')->teacher){
            return redirect('teacher');
        }
        else if(registerModel::where('id', $id)->first ('id', 'name')->student){
            return redirect('student');
        }
        return redirect('/')->with('message', 'Login is successfully');
    }else{
        return redirect('login')->with('message', 'Email and Password is incorrect!');

    }
    }

    public function questions(Request $request){
        $input = $request->all();
        $input['category']= $request->input('category');
        question::create($input);
        return redirect('showQuestions');
    }

    public function index(){
        $requests= question::paginate(5);
        //$reqesd=DB::table('question')->paginate(5);
        return view('showQuestions', ['request'=>$requests]);
    }
    public function edit($id){
        $requests= question::find($id);
        return view('showQuestions', ['request'=>$requests]);
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $input['category']= $request->input('category');
        question::create($input);
        return redirect('showQuestions')->with('message', 'Question is successfully updated');
    }
    function destroyController($id){
        $requests = question::find($id);
        $requests->delete();
        return redirect('/showQuestions')->with('message', 'Questions is successfully deleted');
       }

       public function multipleChoice($id){
            $user= question::find($id);
            $req= DB::table('question')->where('id', $id)->get();
            print_r($req);
            dd($user->multipleChoice);
       }

       public function shortChoice($id){
        $user= question::find($id)->shortChoice;
       /*  $req= DB::table('question')->where('id', $id)->get();
        print_r($req); */
        dd($user);
        }
        
        public function longChoice($id){
            $user= question::find($id);
            $req= DB::table('question')->where('id', $id)->get();
            print_r($req);
            dd($user->longChoice);
        }
    }