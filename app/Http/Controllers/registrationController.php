<?php

namespace App\Http\Controllers;
use App\Models\registerModel;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Answer;
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
        $requests= question::paginate(10);
        //$reqesd=DB::table('question')->paginate(5);
        return view('showQuestions', ['request'=>$requests]);
    }
   
    public function edit($id){
        $requests= question::find($id);
        return view('edit', ['request'=>$requests]);
    }
    public function update(Request $request, $id){
        $requests = question::find($id);
            $request->name= $request->input('name');
            $request->option1=$request->input('option1');
            $request->option2=$request->input('option2');
            $request->option13=$request->input('option3');
            $request->option4=$request->input('option4');
            $request->allQuestions=$request->input('allQuestions');
            $request->save();
        return redirect('showQuestions')->with('message', 'Question is successfully updated');
    }
    function destroyController($id){
        $requests = question::find($id);
        $requests->delete();
        return redirect('/showQuestions')->with('message', 'Questions is successfully deleted');
       }
       function detailPreview( $id){
        $requests= DB::table('question')->where('id', $id)->get();
         return view('detailPreview', ['request'=> $requests]);
       }
       public function showData(){
        $users = DB::select("select * from question");
        $answers = DB::select("select * from answers");
        return view('question-answer', ['answers'=>$answers, 'users'=>$users, ]);
        
    }
   public function resultShow(Request $request){
       session(['counts'=>count($request->option)]);
       $requests= session('counts');
       session()->flash('resquest', "Out of Total you have attempt in " .$requests . " " ."Questions");

        $i=1;
       $result=0;
       $selected= $request->option;
      //print_r($selected);

        $checked = DB::table("question")    
       ->join("answers","answers.question_id",
            "=","question.id")
            ->where("answers.is_correct",1)
            ->get();
            // print_r($checked);
      $check=$selected[$i] !== $checked;
      if($check){
        $result ++;
      }
         
      $i++;
         
     
     // echo "data is success" . $result;
      return view('result-show');
   }

       /* public function multipleChoice($id){
            $user= question::find($id);
            $req= DB::table('question')->where('id', $id)->get();
            print_r($req);
            dd($user->multipleChoice);
       }*/

    }