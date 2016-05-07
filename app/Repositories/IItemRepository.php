<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

interface IItemRepository
{
    public function paginate($count);
    public function validate($input);
    public function insert($input);
    public function update($id, $input);
    public function get($id);
    public function delete($id);
}