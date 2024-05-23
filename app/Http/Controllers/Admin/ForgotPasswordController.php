<?php 

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use DB; 
use Hash; 
use App\Models\User;
use App\Mail\TestMail;
Use Crypt;

class ForgotPasswordController extends Controller
{
  public function getEmail()
  {
     return view('admin.login');
  }

  public function postEmail(Request $request)
  {
    $request->validate([
        'email' => 'required|email|exists:users',
    ]);

    $token = str_random(64);

      DB::table('password_resets')->insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
      );

      Mail::send('authcustomer.verify', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Reset Password Notification');
      });

      return back()->with('message', 'We have e-mailed your password reset link!');
  }

  public function EmailLinkSend(Request $request)
  {
        $data = $request->all();
        // return response($data);

        $userdata = DB::table('users')
        ->where('users.email',$data['email'])
        ->first();

        if($userdata != null){
           Mail::to($data['email'])->send(new TestMail($data));
           return response("Success.check the Mail and change the Password.");
        }
        else
        {
           return response("Please try again with Valid Email information.");
        }

        // Mail::to($data['email'])->send(new TestMail($data));
  }

  public function PasswordUpdate(Request $request)
  {
    $data = $request->all();


    if($data['password'] == $data['repassword'])
    {
        $pass = Hash::make($data['password']);

       $data = User::where('users.email',$data['email'])
        ->update(['password' =>$pass]);
       if($data)
        return response("success");
       else
        return response(401,"fail");
    }
    else
    {
       return response(401,"Password is Mismatch.Please check Password");
    }
   
  }
}