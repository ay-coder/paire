@extends('admin')
@section('card-title','Add New Tool')
@section('admin.content')
    <form method="post" action="{!! route('tool.store') !!}" class="form-horizontal r-separator" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row p-b-15">
                <label for="milestone" class="col-sm-3 text-right control-label col-form-label">Select Milestone</label>
                <div class="col-sm-9">
                    <select name="milestone" id="milestone" class="form-control">
                        @foreach($milestones as $milestone)
                            <option value="{!! $milestone->id !!}">{!! $milestone->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row p-b-15">
                <label for="link" class="col-sm-3 text-right control-label col-form-label">Tool Link</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="link" placeholder="Tool Link" name="link" value="{!! old('link') !!}">
                </div>
            </div>

            <div class="form-group row p-b-15">
                <label for="description" class="col-sm-3 text-right control-label col-form-label">Tool Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="description" name="description" placeholder="Description of Tool">{!! old('description') !!}</textarea>
                </div>
            </div>

            <div class="form-group row p-b-15">
                <label for="featuredImage" class="col-sm-3 text-right control-label col-form-label">Featured Image</label>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" name="featuredImage" class="custom-file-input" id="featuredImage">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="form-group m-b-0 text-right">
                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                <button type="reset" class="btn btn-dark waves-effect waves-light">Reset</button>
            </div>
        </div>
    </form>
@stop