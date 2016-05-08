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
    <div class="pull-right"><a class="btn btn-success" href="{{ url('outlets/add') }}">Add Outlet</a></div>
    <div class="clearfix"></div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($outlets as $outlet)
        <tr>
            <td>{{ $outlet->name }}</td>
            <td>
                <a href="{{ url('outlets/edit/' . $outlet->id) }}" >Edit</a> | 
                <a href="{{ url('outlets/delete/' . $outlet->id) }}" >Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div><?php echo $outlets->render(); ?></div>
</div>
@stop