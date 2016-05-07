<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;
use App\Models\Inventory;

class InventoryRepository implements IInventoryRepository
{
    public function paginate($limit, $outlet = 0) {
        $items = Inventory::where('outletid', '=', $outlet)->with('Item')->paginate($limit);
        return $items;
    }
}