<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\IOutletRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class OutletController extends Controller
{
    public function __construct(
        IOutletRepository $outletRepo
    )
    {
        $this->outletRepo = $outletRepo;
    }
    
    public function manage()
    {
        $outlets = $this->outletRepo->paginate(env('PAGINATION'));
        return View::make('outlets.manage', compact('outlets'));
    }
    
    public function showAdd()
    {
        return view('outlets.add');
    }
    
    public function saveAdd()
    {
        $inputs = Input::all();
        $validator = $this->outletRepo->validate($inputs);
        if($validator->fails())
        {
            return Redirect::to('outlets/add')->withErrors($validator)->withInput(Input::all());
        }
        else
        {
            $id = $this->outletRepo->insert($inputs);
            return Redirect::to('outlets/add')->with('message', 'Outlet Added Successfully');
        }
    }
    
    public function showEdit($id)
    {
        $outlet = $this->outletRepo->get($id);
        if(!empty($outlet))
        {
            return view('outlets.edit')->with('outlet', $outlet);
        }
        else
        {
            return Redirect::to('outlets/manage')->with('message', 'Outlet Does Not Exists');
        }
    }
    
    public function saveEdit($id)
    {
        $inputs = Input::all();
        $validator = $this->outletRepo->validate($inputs);
        if($validator->fails())
        {
            return Redirect::to('outlets/add')->withErrors($validator)->withInput(Input::all());
        }
        else
        {
            $this->outletRepo->update($id, $inputs);
            return Redirect::to('outlets/edit/'.$id)->with('message', 'Outlet Updated Successfully');
        }
    }
    
    public function delete($id)
    {
        $success = $this->outletRepo->delete($id);
        if($success)
        {
            return Redirect::to('outlets/manage')->with('message', 'Outlet Deleted Successfully');
        }
        else
        {
            return Redirect::to('outlets/manage')->with('errormessage', 'Something Went Wrong');
        }
    }
}