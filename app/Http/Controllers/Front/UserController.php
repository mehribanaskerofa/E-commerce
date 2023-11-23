<?php

namespace App\Http\Controllers\Front;

use App\Enums\Guards;
use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\UserRegistred;
use App\Models\Contact;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function registerview()
    {
        return view('front.register');
    }
    public function register()
    {
        $user=User::create([
            'fullname'=>request()->fullname,
            'email'=> request()->email,
            'password'=>Hash::make(request()->password),
            'remember_me'=> request()->remember_me ?? false
        ]);

        UserRegisteredEvent::dispatch($user);
        return redirect()->route('shop-cart');

    }

    public function loginview()
    {
        session(['url.intended' => url()->previous()]);
       return view('front.login');
    }
    public function login()
    {
        if(Auth::guard(Guards::USER->value)
            ->attempt(['email'=>request()->email,'password'=>request()->password],
                request()->get('remember') ?? false)){
            return redirect(session()->get('url.intended'));
        }
        return redirect()->back();
    }

    public function logout()
    {
        if(auth()->guard(Guards::USER->value)->check()) {
            auth()->guard(Guards::USER->value)->logout();
        }
        return redirect()->route(url()->previous());
    }

    public function subscribe()
    {
        Subscribe::create(
            [
                'email'=>request()->email
            ]
        );
        return redirect()->back();
    }
    public function contact(ContactRequest $request)
    {
        Contact::create($request->validated());
        return redirect()->back();
    }
}
