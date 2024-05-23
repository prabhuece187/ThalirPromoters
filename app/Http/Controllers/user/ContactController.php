<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Models\User;


class ContactController extends Controller
{
   public function index(Request $request)
   {
      return view('user.promoter-details');
   }


}