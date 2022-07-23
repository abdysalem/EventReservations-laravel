<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexhome()
    {
        return view('home');
    }

public function redirects()
    {
        $usertype= Auth::user()->usertype;
        
        if($usertype=='0')
        {

            return view();
        }
    }

    else
    {
        return view('admin.home');
    }

}

}
