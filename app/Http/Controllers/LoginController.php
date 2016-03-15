<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ILoginService;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function __construct(
        ILoginService $loginservice
    )
    {
        $this->loginservice = $loginservice;
    }
    
    public function showlogin()
    {
        return view('login.index');
    }
    
    public function checklogin()
    {
        $validator = $this->loginservice->validator(Input::all()); //validate login via LoginService
        if($validator->fails())
        {
            return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
            //return Redirect::back()->withErrors($validator);
        }
        else
        {
            if($this->loginservice->authenticate(Input::get('username'), Input::get('password'))) //call laravel authenticate method
            {
                return Redirect::to('/');
            }
            else
            {
                return Redirect::to('login')->with('login_error', 'Invalid Credentials')->withInput(Input::except('password'));
            }
        }
    }
    
    public function logout()
    {
        $this->loginservice->logout();
        return Redirect::to('login');
    }
}