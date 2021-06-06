<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\phpAnswer;
use App\Models\phpQuestion;
use Hash;
use DB;
class phpQuestionController extends Controller
{
    public function php_question(Request $request){
        $input = $request->all();
        $input['category']= $request->input('category');
        phpQuestion::create($input);
        return redirect('php/phpQuestion');
    }

    public function index(){
         $requests= phpQuestion::paginate(10);
        //$reqesd=DB::table('question')->paginate(5);
        return view('php/phpQuestion', ['request'=>$requests]);
    }

    function phpDestroyController($id){
        $requests = phpQuestion::find($id);
        $requests->delete();
        return redirect('php/phpQuestion')->with('message', 'Questions is successfully deleted');
       }

       function phpDetailPreview( $id){
        $requests= DB::table('php_questions')->where('id', $id)->get();
         return view('php/phpDetailPreview', ['request'=> $requests]);
       }

       public function edit($id){
        $requests= phpQuestion::find($id);
        return view('php/phpEdit', ['request'=>$requests]);
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
        return redirect('php/phpQuestion')->with('message', 'Question is successfully updated');
    }

    public function showData(){
        $users = DB::select("select * from php_questions");
        $answers = DB::select("select * from php_answers");
        return view('php/question-answer', ['answers'=>$answers, 'users'=>$users, ]);
        
    }
    public function resultShow(Request $request){
        session(['counts'=>count($request->option)]);
        $requests= session('counts');
        session()->flash('resquest', "Out of Total you have attempt in " .$requests . " " ."Questions");
 
         
        $result=0;
        $selected= $request->option;
      // print_r($selected);
 
         $checked = DB::table("php_questions")    
        ->join("php_answers","php_answers.question_id",
             "=","php_questions.id")
             ->where("php_answers.is_correct")
             ->get();
              //print_r($checked);
       $check=$selected == $checked;
       if($check){
         $result ++;
       }
          
      
      // echo "data is success" . $result;
       return view('php/result-show');
    }
}
