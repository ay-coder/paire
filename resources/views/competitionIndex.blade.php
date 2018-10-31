@extends('admin')
@section('card-title','View All Competitions')
@section('admin.content')
    <div class="card-body">
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Competition Name</td>
                    <td>Start Date</td>
                    <td>End Date</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
                </thead>

                <tbody>
                @php $i=1; @endphp
                @foreach($competitions as $competition)

                    <tr>
                        <td>{!! $i !!}</td>
                        <td>{!! $competition->name !!}</td>
                        <td>{!! $competition->start !!}</td>
                        <td>{!! $competition->end !!}</td>
                        <td>@if($competition->status) Active @else Inactive @endif</td>
                        <td>
                            <a href="{!! URL::to('competition').'/'.$competition->id.'/edit' !!}"><i class="fa fa-edit" title="Edit ">&nbsp;</i> </a>
                            {!! Form::open(array('url' => 'competition/'.$competition->id.'','class' => 'form-horizontal inline', 'id' => 'competition','method'=>'DELETE')) !!}
                            <a href="javascript:void(0);" onclick="$(this).closest('form').submit();"><i class="fa fa-trash" title="Delete ">&nbsp;</i></a>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @php $i++; @endphp
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('addNewCss')
    {!! Html::style('admin/css/datatables.min.css') !!}
@stop
@section('addNewJS')
    {!! Html::script('admin/js/datatables.min.js') !!}
    <script type="text/javascript">
        $('#zero_config').DataTable();
    </script>
@stop