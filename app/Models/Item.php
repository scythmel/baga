<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $guarded = array();
    
    public function inventories()
    {
        return $this->hasMany('\App\Models\Inventory', 'itemid');
    }
}