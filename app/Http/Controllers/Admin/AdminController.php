<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Guards;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function loginView()
    {
        return view('admin.login.index');
    }
    public function login()
    {
        //active olanlar gelir
        if(auth()->guard(Guards::ADMIN->value)->attempt(['email'=>request()->email,'password'=>request()->password,'active'=>true],request()->remember_me)){
            return redirect()->route('admin.home');
        }
        return redirect()->back();
    }

    public function logout()
    {
        if(auth()->guard(Guards::ADMIN->value)->check()) {
            auth()->guard(Guards::ADMIN->value)->logout();
        }
        return redirect()->route('admin.login-view');
    }
}
