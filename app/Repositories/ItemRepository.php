<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;
use App\Models\Item;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ItemRepository implements IItemRepository
{
    public function paginate($limit) {
        $items = Item::paginate($limit);
        return $items;
    }
    
    public function validate($input) {
        $rules = array(
                'name'  => 'required|max:100'
            );
        $messages = array(
            'name.required' => 'Item Name is required.',
            'name.max' => 'Item Name should only be 100 characters max.'
        );
        
        $validator = Validator::make($input, $rules, $messages);

        return $validator;
    }
    
    public function insert($input){
        $columns = Schema::getColumnListing('items');
        $item = new Item;

        foreach($columns as $col)
        {
            if(array_key_exists($col, $input))
            {
                $item->{$col} = $input[$col];
            }
        }
    
        $user = Auth::user();
        $item->created_by = $user->id;
        $item->save();
        return $item->id;
    }
    
    public function update($id, $input){
        $columns = Schema::getColumnListing('items');
        $item = Item::find($id);

        foreach($columns as $col)
        {
            if(array_key_exists($col, $input))
            {
                $item->{$col} = $input[$col];
            }
        }
    
        $user = Auth::user();
        $item->updated_by = $user->id;
        $item->save();
        return $item->id;
    }
    
    public function get($id)
    {
        $item = Item::find($id);
        return $item;
    }
    
    public function delete($id)
    {
        $success = Item::destroy($id);
        return $success;
    }
}