<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




use Illuminate\support\facades\Auth;

class PageHomeController extends Controller
{
   public function indexhome()
   {
    return view ('home');

   }



public function redirects()
    {
        $usertype= Auth::user()->usertype;
        
        if($usertype=='0')
        {

            return view('layouts.admin');
        }
    

    else
    {
        return view('home');
    }





}


 public function MakeReservations()


   {
    return view ('MakeReservations');

   }

  


}