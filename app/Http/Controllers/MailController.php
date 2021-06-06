<?php

namespace App\Http\Controllers;
use customer_mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendmail(){
        $title = '[Confirmation] Thank you for your order'; 
        $customer_details = [ 'name' => 'Rajan',
         'address' => 'Raiwali, Ambala',
          'phone' => '123123123',
           'email' => 'rajanbhoria11@gmail.com' ];
            $order_details = [ 
                'SKU' => 'D-123456',
             'price' => '10000',
              'order_date' => '2021-05-25', ];
               $sendmail = Mail::to($customer_details['email'])->send(new SendMail($title, $customer_details, $order_details));
                if (empty($sendmail)) { 
                    return response()->json(['message' => 'Mail Sent Sucssfully'], 200); 
                }
                else
                { 
                    return response()->json(['message' => 'Mail Sent fail'], 400); 
                }


    }
   /*  public function basic_email() {
        $data = array('name'=>"Virat Gandhi");
     
        Mail::send(['text'=>'customer_mail'], $data, function($message) {
           $message->to('bhoriarajan90@gmail.com', 'Tutorials Point')->subject
              ('Laravel Basic Testing Mail');
           $message->from('rajanbhoria11@gmail.com','Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
     } */
}
