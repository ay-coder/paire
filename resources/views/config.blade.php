@extends('admin')
@section('card-title','Add New Config')
@section('admin.content')
    <form method="post" action="{!! route('config.store') !!}" class="form-horizontal r-separator" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row p-b-15">
                <label for="competition" class="col-sm-3 text-right control-label col-form-label">Select Competition</label>
                <div class="col-sm-9">
                    <select name="competition" id="competition" class="form-control">
                        @foreach($competitions as $competition)
                            <option value="{!! $competition->id !!}">{!! $competition->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row p-b-15">
                <label for="name" class="col-sm-3 text-right control-label col-form-label">Milestone Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" placeholder="Milestone Title" name="name" value="{!! old('name') !!}">
                </div>
            </div>

            <div class="form-group row p-b-15">
                <label for="description" class="col-sm-3 text-right control-label col-form-label">Milestone Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="description" name="description" placeholder="Description of Milestone">{!! old('description') !!}</textarea>
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