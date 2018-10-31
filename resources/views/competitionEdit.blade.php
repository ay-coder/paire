@extends('admin')
@section('card-title','Edit a Competition')
@section('admin.content')
    <form method="post" action="{!! route('competition.update',$competition)!!}" class="form-horizontal r-separator">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="card-body">
            <div class="form-group row p-b-15">
                <label for="name" class="col-sm-3 text-right control-label col-form-label">Competition Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" placeholder="Competition Title" name="name" value="{!! $competition->name !!}">
                </div>
            </div>

            <div class="form-group row p-b-15">
                <label for="description" class="col-sm-3 text-right control-label col-form-label">Competition Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="description" name="description" placeholder="Desciption of Competition">{!! $competition->description !!}</textarea>
                </div>
            </div>

            <div class="form-group row p-b-15">
                <label for="start" class="col-sm-3 text-right control-label col-form-label">Start Date</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="start" placeholder="Competition Start Date" name="start" value="{!! $competition->start !!}">
                </div>
            </div>

            <div class="form-group row p-b-15">
                <label for="end" class="col-sm-3 text-right control-label col-form-label">End Date</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="end" placeholder="Competition End Date" name="end" value="{!! $competition->end !!}">
                </div>
            </div>

            <div class="form-group row p-b-15">
                <label for="name" class="col-sm-3 text-right control-label col-form-label">Competition Status</label>
                <div class="col-sm-9">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="active" name="status" required="required" value="1" @if($competition->status==1)checked="checked" @endif>
                        <label class="custom-control-label" for="active">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="inactive" name="status" required="required" @if($competition->status==0)checked="checked" @endif value="0">
                        <label class="custom-control-label" for="inactive">InActive</label>
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

@section('addNewJs')
    <script type="text/javascript">
        /*$('.deleteGroup').on('submit',function(e){
            if(!confirm('Do you want to delete this item?')){
                e.preventDefault();
            }
        });*/

    </script>
    @stop