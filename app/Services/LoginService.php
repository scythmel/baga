<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginService implements ILoginService
{
    public function validator($input) {
        $rules = array(
                'username'  => 'required|username',
                'password'  => 'required'
            );
        $messages = array(
            'username.required' => 'Username is required.',
            'password.required' => 'Password is required.'
        );
        $validator = Validator::make($input, $rules, $messages);

        return $validator;
    }
    
    public function authenticate($username,$password) {
        $userdata = array(
            'username' 	=> $username,
            'password' 	=> $password
        );
        if(Auth::attempt($userdata, true)){
            $user = Auth::user();
            $user->lastlogin = time();
            $user->save();
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function logout() {
        Auth::logout();
        Session::flush();
    }
    
}