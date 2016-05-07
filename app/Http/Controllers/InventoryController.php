<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Repositories\IInventoryRepository;
use App\Repositories\IOutletRepository;
use Illuminate\Support\Facades\Auth;
class InventoryController extends Controller
{
    public function __construct(
        IInventoryRepository $inventoryRepo,
        IOutletRepository $outletRepo
    )
    {
        $this->inventoryRepo = $inventoryRepo;
        $this->outletRepo = $outletRepo;
    }
    
    public function manage($outlet = 0)
    {
        $user = Auth::user();
        if($user->role != 'admin')
        {
            $outlet = $user->outlet;
        }
        $inventories = $this->inventoryRepo->paginate(env('PAGINATION'), $outlet);
        $outlets = $this->outletRepo->getlist();
        return View::make('inventories.manage', compact('inventories'))->with('outlets', $outlets);
    }
}