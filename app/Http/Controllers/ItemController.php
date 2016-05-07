<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\IItemRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class ItemController extends Controller
{
    public function __construct(
        IItemRepository $itemRepo
    )
    {
        $this->itemRepo = $itemRepo;
    }
    
    public function manage()
    {
        $items = $this->itemRepo->paginate(env('PAGINATION'));
        return View::make('items.manage', compact('items'));
    }
    
    public function showAdd()
    {
        return view('items.add');
    }
    
    public function saveAdd()
    {
        $inputs = Input::all();
        $validator = $this->itemRepo->validate($inputs);
        if($validator->fails())
        {
            return Redirect::to('items/add')->withErrors($validator)->withInput(Input::all());
        }
        else
        {
            $id = $this->itemRepo->insert($inputs);
            return Redirect::to('items/add')->with('message', 'Item Added Successfully');
        }
    }
    
    public function showEdit($id)
    {
        $item = $this->itemRepo->get($id);
        if(!empty($item))
        {
            return view('items.edit')->with('item', $item);
        }
        else
        {
            return Redirect::to('items/manage')->with('message', 'Item Does Not Exists');
        }
    }
    
    public function saveEdit($id)
    {
        $inputs = Input::all();
        $validator = $this->itemRepo->validate($inputs);
        if($validator->fails())
        {
            return Redirect::to('items/add')->withErrors($validator)->withInput(Input::all());
        }
        else
        {
            $this->itemRepo->update($id, $inputs);
            return Redirect::to('items/edit/'.$id)->with('message', 'Item Updated Successfully');
        }
    }
    
    public function delete($id)
    {
        $success = $this->itemRepo->delete($id);
        if($success)
        {
            return Redirect::to('items/manage')->with('message', 'Item Deleted Successfully');
        }
        else
        {
            return Redirect::to('items/manage')->with('errormessage', 'Something Went Wrong');
        }
    }
}