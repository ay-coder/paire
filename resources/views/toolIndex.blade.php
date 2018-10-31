@extends('admin')
@section('card-title','View All Tools')
@section('admin.content')
    <div class="card-body">
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered" style="width: 100%">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Tool Link</td>
                    <td>Description</td>
                    <td>Featured Image</td>
                    <td>Milestone</td>
                    <td>Action</td>
                </tr>
                </thead>

                <tbody>
                @php $i=1; @endphp
                @foreach($tools as $tool)

                    <tr>
                        <td>{!! $i !!}</td>
                        <td>{!! $tool->link !!}</td>
                        <td>{!! $tool->description !!}</td>
                        <td><img src="{!! URL::to('images\tool').'\\'.$tool->featured_image !!}" height="75px" width="auto"> </td>
                        <td>{!! $tool->milestone->name !!}</td>
                        <td>
                            <a href="{!! URL::to('tool').'/'.$tool->id.'/edit' !!}"><i class="fa fa-edit" title="Edit ">&nbsp;</i> </a>
                            {!! Form::open(array('url' => 'tool/'.$tool->id.'','class' => 'form-horizontal inline', 'id' => 'competition','method'=>'DELETE')) !!}
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