@section('title')Inventarios @endsection @extends('layouts.app') @section('content')
<div class="container">
    <div class=" col-md-10 col-md-offset-1 text-capitalize">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading  light-green lighten-1">
                <div class="row">
                    <div class="col-xs-6">
                        <h5>    Inventarios  </h5>
                    </div>
                    <div class="col-xs-6 text-right right">
                        <button class="waves-effect  btn  green green-text text-lighten-5" onclick="window.location='{{ route('inventory.create') }}'">@lang('buttons.create')</button>
                    </div>
                </div>
            </div>
            <div class=" table-responsive">
                <table class="table table-condensed table-hover highlight ">
                    <thead>
                        <tr>
                            <th data-field="price">No.</th>
                            <th data-field="id">@lang('validation.attributes.name')</th>
                            <th data-field="id">@lang('validation.attributes.description')</th>
                            <th data-field="name">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Inventories as $inventory)
                        <tr class="{{($inventory->state)?:'grey'}}">
                            <td>{{ $inventory->id }}</td>
                            <td>{{ $inventory->name }}</td>
                            <td>{{ $inventory->description }}</td>
                            <td>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['inventory.destroy', $inventory->id]]) }}
                                <!-- <a href="{{  route('inventory.show', $inventory->id) }}" class="btn-floating btn-sm waves-effect waves-light blue">
                            <i class="material-icons">info</i>
                        </a> -->
                                <a href="{{  route('inventory.edit', $inventory->id) }}" class="btn-floating btn-sm waves-effect waves-light orange">
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                @if($inventory->state) {!! Form::button('<i class="material-icons">thumb_down</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light red', 'type' =>'sumbit', 'name'=>'delete_'.$inventory->id, 'id'=>'delete_'.$inventory->id]) !!} {{ Form::close() }} @else {!! Form::button('<i class="material-icons">thumb_up</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light green', 'type' =>'sumbit', 'name'=>'delete_'.$inventory->id, 'id'=>'delete_'.$inventory->id]) !!} {{ Form::close() }} @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $Inventories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
