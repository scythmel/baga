<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;
use App\Models\Outlet;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class OutletRepository implements IOutletRepository
{
    public function paginate($limit) {
        $outlets = Outlet::paginate($limit);
        return $outlets;
    }
    
    public function getlist() {
        $outlets = Outlet::orderBy('name', 'asc')->lists('name', 'id');
        return $outlets;
    }
    
    public function validate($input) {
        $rules = array(
                'name'  => 'required|max:100'
            );
        $messages = array(
            'name.required' => 'Outlet Name is required.',
            'name.max' => 'Outlet Name should only be 100 characters max.'
        );
        
        $validator = Validator::make($input, $rules, $messages);

        return $validator;
    }
    
    public function insert($input){
        $columns = Schema::getColumnListing('outlets');
        $outlet = new Outlet;

        foreach($columns as $col)
        {
            if(array_key_exists($col, $input))
            {
                $outlet->{$col} = $input[$col];
            }
        }
    
        $user = Auth::user();
        $outlet->created_by = $user->id;
        $outlet->save();
        return $outlet->id;
    }
    
    public function update($id, $input){
        $columns = Schema::getColumnListing('outlets');
        $outlet = Outlet::find($id);

        foreach($columns as $col)
        {
            if(array_key_exists($col, $input))
            {
                $outlet->{$col} = $input[$col];
            }
        }
    
        $user = Auth::user();
        $outlet->updated_by = $user->id;
        $outlet->save();
        return $outlet->id;
    }
    
    public function get($id)
    {
        $outlet = Outlet::find($id);
        return $outlet;
    }
    
    public function delete($id)
    {
        $success = Outlet::destroy($id);
        return $success;
    }
}