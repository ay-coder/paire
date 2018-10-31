@extends('admin')
@section('card-title','Edit Config Values')
@section('admin.content')
    {{-- TODO Fetch two data update that two only --}}
    <form method="post" action="config/store" class="form-horizontal r-separator">
        @csrf
        <div class="card-body">
            @foreach($configs as $config)
                <div class="form-group row p-b-15">
                    <label for="heading" class="col-sm-3 text-right control-label col-form-label">{!! $config->key !!}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="heading" placeholder="{!! $config->value !!}" name="{!! $config->key !!}" value="{!! $config->value !!}">
                    </div>
                </div>
                @endforeach
        </div>
        <div class="card-body bg-light">
            <div class="form-group m-b-0 text-right">
                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                <button type="reset" class="btn btn-dark waves-effect waves-light">Reset</button>
            </div>
        </div>
    </form>
@stop