<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function dashboard()
    {
        return view('main.dashboard');
    }
}