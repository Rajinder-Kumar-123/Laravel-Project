<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\htmlQuestion;
use App\Models\htmlAnswer;
use DB;
use Hash;
class htmlQuestionController extends Controller
{
    public function html_question(Request $request){
        $input = $request->all();
        $input['category']= $request->input('category');
        htmlQuestion::create($input);
        return redirect('Html/htmlQuestion');
    }

    public function index(){
        $requests= htmlQuestion::paginate(10);
        //$reqesd=DB::table('question')->paginate(5);
        return view('Html/htmlQuestion', ['request'=>$requests]);
    }

    function htmlDestroyController($id){
        $requests = htmlQuestion::find($id);
        $requests->delete();
        return redirect('Html/htmlQuestion')->with('message', 'Questions is successfully deleted');
       }
       function htmlDetailPreview( $id){
        $requests= DB::table('html_questions')->where('id', $id)->get();
         return view('Html/htmlDetailPreview', ['request'=> $requests]);
       }
       public function edit($id){
        $requests= htmlQuestion::find($id);
        return view('Html/htmledit', ['request'=>$requests]);
    }
    public function update(Request $request, $id){
        $requests = htmlQuestion::find($id);
            $request->name= $request->input('name');
            $request->option1=$request->input('option1');
            $request->option2=$request->input('option2');
            $request->option13=$request->input('option3');
            $request->option4=$request->input('option4');
            $request->allQuestions=$request->input('allQuestions');
            $request->save();
        return redirect('Html/htmlQuestion')->with('message', 'Question is successfully updated');
    }

    public function showData(){
        $users = DB::select("select * from html_questions");
        $answers = DB::select("select * from html_answers");
        return view('html/question-answer', ['answers'=>$answers, 'users'=>$users, ]);
        
    }
   public function resultShow(Request $request){
       session(['counts'=>count($request->option)]);
       $requests= session('counts');
       session()->flash('resquest', "Out of Total you have attempt in " .$requests . " " ."Questions");
       $result=0;
       $selected= $request->option;
      //print_r($selected);

        $checked = DB::table("html_questions")    
       ->join("html_answers","html_answers.question_id",
            "=","html_questions.id")
            ->where("html_answers.is_correct",1)
            ->get();
            // print_r($checked);
      $check=$selected == $checked;
      if($check){
        $result ++;
      }
     // echo "data is success" . $result;
      return view('html/result-show');
   }
}
