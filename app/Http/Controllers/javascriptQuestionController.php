<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\javascriptQuestion;
use App\Models\javascriptAnswer;
use DB;
class javascriptQuestionController extends Controller
{
    public function javascript_question(Request $request){
        $input = $request->all();
        $input['category']= $request->input('category');
        javascriptQuestion::create($input);
        return redirect('javascript/javascriptQuestion');
    }

    public function index(){
        $requests= javascriptQuestion::paginate(10);
        //$reqesd=DB::table('question')->paginate(5);
        return view('javascript/javascriptQuestion', ['request'=>$requests]);
    }
    function javascriptDestroyController($id){
        $requests = javascriptQuestion::find($id);
        $requests->delete();
        return redirect('javascript/javascriptQuestions')->with('message', 'Questions is successfully deleted');
       }
       function javascriptDetailPreview( $id){
        $requests= DB::table('javascript_questions')->where('id', $id)->get();
         return view('javascript/javascriptDetailPreview', ['request'=> $requests]);
       }
       public function edit($id){
        $requests= javascriptQuestion::find($id);
        return view('javascript/javascriptedit', ['request'=>$requests]);
    }
    public function update(Request $request, $id){
        $requests = javascriptQuestion::find($id);
            $request->name= $request->input('name');
            $request->option1=$request->input('option1');
            $request->option2=$request->input('option2');
            $request->option13=$request->input('option3');
            $request->option4=$request->input('option4');
            $request->allQuestions=$request->input('allQuestions');
            $request->save();
        return redirect('javascript/javascriptQuestion')->with('message', 'Question is successfully updated');
    }

    public function showData(){
        $users = DB::select("select * from javascript_questions");
        $answers = DB::select("select * from javascript_answers");
        return view('javascript/question-answer', ['answers'=>$answers, 'users'=>$users, ]);
        
    }
   public function resultShow(Request $request){
       session(['counts'=>count($request->option)]);
       $requests= session('counts');
       session()->flash('resquest', "Out of Total you have attempt in " .$requests . " " ."Questions");
       $result=0;
       $selected= $request->option;
      //print_r($selected);

        $checked = DB::table("javascript_questions")    
       ->join("javascript_answers","javascript_answers.question_id",
            "=","javascript_questions.id")
            ->where("javascript_answers.is_correct",1)
            ->get();
            // print_r($checked);
      $check=$selected == $checked;
      if($check){
        $result ++;
      }
     // echo "data is success" . $result;
      return view('javascript/result-show');
   }

}
