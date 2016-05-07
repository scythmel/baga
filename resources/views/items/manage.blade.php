@extends('layouts.default')

@section('content')
<div>
    @if (Session::has('message'))
    <div class="form-group">
        <div class="col-md-6 color-swatches"> <p class="bg-success"> {{ Session::get('message') }}{{ Session::forget('message') }} </p></div>
    </div>
    @endif
    @if (Session::has('errormessage'))
    <div class="form-group">
        <div class="col-md-6 color-swatches"> <p class="bg-danger"> {{ Session::get('errormessage') }}{{ Session::forget('errormessage') }} </p></div>
    </div>
    @endif
    <div class="pull-right"><a class="btn btn-success" href="{{ url('items/add') }}">Add Item</a></div>
    <div class="clearfix"></div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>
                <a href="{{ url('items/edit/' . $item->id) }}" >Edit</a> | 
                <a href="{{ url('items/delete/' . $item->id) }}" >Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div>{{ $items->links() }}</div>
</div>
@stop