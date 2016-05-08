@extends('layouts.default')

@section('content')
<div>
    <form method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if (Session::has('message'))
        <div class="form-group">
            <div class="col-md-6 color-swatches"> <p class="bg-success"> {{ Session::get('message') }}{{ Session::forget('message') }} </p></div>
        </div>
        @endif
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $item->name }}">
                @if ($errors->has('name'))<span id="helpBlock2" class="help-block">{{ $errors->get('name') }}</span>@endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Save</button>
                <a class="btn btn-warning" href="{{ url('items/manage') }}">Cancel</a>
            </div>
        </div>
    </form>
</div>
@stop