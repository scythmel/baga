<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services;

interface ILoginService
{
    public function validator($input);
    public function authenticate($username,$password);
    public function logout();
}