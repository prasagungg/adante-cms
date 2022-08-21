<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
  
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $remember = !empty($request->remember);
        
        if($this->authService->login($request->except('remember', '_token'), $remember)){
            return redirect('/')->with('success', 'You are successfully logged in');
        } else {
            return back()->with('error', 'Your login credentials don’t match an account in our system.');
        }
    }

    public function logout(){
        $this->authService->logout();

        return redirect('/');
    }
}
