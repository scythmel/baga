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
    <div class="pull-left"> <?php echo Form::select('outlet', $outlets) ?> </div>
    <div class="pull-right"><a class="btn btn-success" href="{{ url('inventories/add') }}">Add Inventory</a></div>
    <div class="clearfix"></div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        @foreach($inventories as $inventory)
        <tr>
            <td>{{ $inventory->item->name }}</td>
            <td> {{ $inventory->amount }} </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div><?php echo $inventories->render(); ?></div>
</div>
@stop