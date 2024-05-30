<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Role;
use App\Models\Admin\Mediator;
use App\Models\Admin\Abo;
use App\Models\Admin\Asp;
use Auth, Hash;

class LoginController extends Controller
{
    public function getLogin()
    {
        if(Auth::user())
        {
            $RoleId = Auth::user()->RoleId;
            $name = Auth::user()->name;
            return view('admin.layout',['data'=>$RoleId,'name'=>$name]);
        }
        return view('admin.login');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/admin-login');
    }

    public function getRegister()
    {
        if(Auth::user())
        {
            return redirect('/home');
        }
        return view('admin.login');
    }

    public function postRegister(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required|unique:users'
        ]);

        if($input['RoleId'] == "SelectRole")
        {
             $role = Role::select('*')->get();
             $error = "please select role";
             $errorone = "null";
             return view('user.register',compact('error','role','errorone'));
        }
        else
        {
            if($input['password'] == $input['RePassword'])
            {
               $input['password'] = Hash::make($request->password);
               $input['RePassword'] = Hash::make($request->RePassword);
               User::create($input);

               return redirect('/admin-login');
            }
            else
            {
               $role = Role::select('*')->get();
               $errorone = "please Check the password";
               $error ="null";
               return view('user.register',compact('errorone','role','error'));
            }
        }
    }

    public function postMediatorRegister(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'name' => 'required|unique:users'
        ]);

        // return response($input['RoleId']);

        if($input['password'] == $input['RePassword'])
        {
           $input['password'] = Hash::make($request->password);
           $input['RePassword'] = Hash::make($request->RePassword);

           $data = User::create($input);

           // return response($data);

           if($input['RoleId'] === "2"){
                $val['id'] = 1;
                $val['AspName'] = $data['name'];
                $val['AspId'] = $data['id'];
                $val['MobileNo'] = $data['Mobile'];

                Asp::create($val);
           }
           else if($input['RoleId'] === "4"){
               $val['id'] = 1;
               $val['MediatorName'] = $data['name'];
               $val['MediatorId'] = $data['id'];
               $val['MobileNo'] = $data['Mobile'];

               Mediator::create($val);
           }
           else if($input['RoleId'] === "5")
           {
               $val['id'] = 1;
               $val['AboName'] = $data['name'];
               $val['AboId'] = $data['id'];
               $val['MobileNo'] = $data['Mobile'];

               Abo::create($val);
           }

           return redirect('/admin-login');
        }
        else
        {
           $role = Role::select('*')->get();
           $errorone = "please Check the password";
           $error ="null";
           return view('user.register',compact('errorone','role','error'));
        }
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password], $request->remember == 1 ? true : false))
        {
           return response(['success']);
        }
        return response(['Failure'],422);
    }

    public function UserGetRegister()
    {
        $role = Role::select('*')->get();
        $error = "null";
        $errorone = "null";
        return view('user.register',compact('role','error','errorone'));
    }
}
