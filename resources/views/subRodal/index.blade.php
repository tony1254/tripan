@section('title')Sub Rodales @endsection
@extends('layouts.app') @section('content')
<div class="container">

<div class=" col-md-10 col-md-offset-1 text-capitalize">

    <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading  light-green lighten-1">
            <div class="row">
                <div class="col-xs-6">
                  <h5>
                    Sub Rodales
                    </h5>
                </div>
                <div class="col-xs-6 text-right right">
                    <button class="waves-effect  btn  green green-text text-lighten-5" onclick="window.location='{{ route('subRodal.create') }}'">@lang('buttons.create')</button>
                </div>
            </div>
    </div>
    <div class=" table-responsive">
        <table class="table table-condensed table-hover highlight ">
            <thead>
                <tr>
                    <th data-field="price">No.</th>
                    <th data-field="id">Pais</th>
                    <th data-field="id">Fondo</th>
                    <th data-field="id">Finca</th>
                    <th data-field="id">Rodal</th>
                    <th data-field="id">subRodal</th>

                    <th data-field="name">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($subRodals as $subRodal)

                <tr class="{{($subRodal->state)?:'grey'}}">

                    <td>{{ $subRodal->objectid }}</td>
                    <td>{{ $subRodal->country }}</td>
                    <td>{{ $subRodal->fund }}</td>
                    <td>{{ $subRodal->property }}</td>
                    <td>{{ $subRodal->rodal }}</td>
                    <td>{{ $subRodal->subrodal }}</td>

                    <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['subRodal.destroy', $subRodal->id]]) }}
                        <a href="{{  route('subRodal.show', $subRodal->id) }}" class="btn-floating btn-sm waves-effect waves-light blue">
                            <i class="material-icons">info</i>
                        </a>
                        <a href="{{  route('subRodal.edit', $subRodal->id) }}" class="btn-floating btn-sm waves-effect waves-light orange">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        @if($subRodal->state)
                        {!! Form::button('<i class="material-icons">thumb_down</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light red', 'type' =>'sumbit', 'name'=>'delete_'.$subRodal->id, 'id'=>'delete_'.$subRodal->id]) !!}
                        {{ Form::close() }}
                        @else
                        {!! Form::button('<i class="material-icons">thumb_up</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light green', 'type' =>'sumbit', 'name'=>'delete_'.$subRodal->id, 'id'=>'delete_'.$subRodal->id]) !!}

                        {{ Form::close() }}
                        @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{ $subRodals->links() }}
        </div>
    </div>
</div>
</div>
</div>
@endsection
