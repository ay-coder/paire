<?php
$userDetail = \App\User::getDetail();
?>
@extends('fof2')
@section('pageTitle','User Profile')
@section('content2')
    {!! Form::open(array('url' => 'update.user.detail','class' => '', 'id' => '','files'=> true)) !!}
    <input type="hidden" value="{!! $userDetail->password !!}" name="oldpassword">
    <input type="hidden" value="{!! $userDetail->profile_pic !!}" name="oldimage">
    <div class="card-body">
        <div class="form-group row p-b-15">
            <label for="profilePic" class="col-sm-3 text-right control-label col-form-label">Select Image</label>
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" name="profilePic" class="custom-file-input" id="profilePic">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-group row p-b-15">
            <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="password" placeholder="Enter your password"
                       name="password" value="{!! old('password') !!}">
            </div>
        </div>
        <div class="form-group row p-b-15">
            <label for="repassword" class="col-sm-3 text-right control-label col-form-label">Re enter Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="repassword" placeholder="Re Enter your password"
                       name="repassword" value="{!! old('repassword') !!}">
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="form-group m-b-0 text-right">
            <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
            <button type="reset" class="btn btn-dark waves-effect waves-light">Reset</button>
        </div>
    </div>
    {!! Form::close() !!}
@stop