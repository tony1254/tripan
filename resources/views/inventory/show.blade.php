@extends('layouts.app') @section('content')
<div class="container">

<div class=" col-md-10 col-md-offset-1 text-capitalize">
    <div class="row">
        <div class="col-sm-6 ">


    </div>
        <div class="col-sm-offset-1 col-sm-3">

        </div>
    </div>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading  light-green lighten-1">
<div class="row">
                <div class="col-xs-6">
  <h5>
    {{ $catalogs[0]->name }}
    </h5>
                </div>
                <div class="col-xs-6 text-right right">
        <div class="right ">
            <button class="waves-effect  btn  green green-text text-lighten-5 btn-flat" onclick="window.location='{{ route('catalog.create','subId='.(($catalogs[0]->catalog_subId))) }}'">@lang('buttons.add')</button>

            <a class="waves-effect btn btn-floating  red green-text text-lighten-5 tooltipped" data-position="bottom" data-delay="0" data-tooltip="Regresar" href="{{  route('catalog.index') }}">@lang('buttons.back')</a>
        </div>

                </div>
            </div>
    </div>
    <div class="table-responsive">
        <table class="table table-condensed table-hover highlight ">
            <thead>
                <tr>
                    <th data-field="price">No.</th>
                    <th data-field="id">Nombres</th>
                    <th data-field="name">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($catalogs as $catalog)


                <tr class="{{($catalog->state)?:'grey'}}">

                    <td>{{ $catalog->code }}</td>
                    <td>{{ $catalog->description }}</td>
                    <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['catalog.item.destroy', $catalog->id]]) }}

                        <a href="{{  route('catalog.edit', $catalog->id) }}" class="btn-floating btn-sm waves-effect waves-light orange">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        @if($catalog->state)
                        {!! Form::button('<i class="material-icons">thumb_down</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light red', 'type' =>'sumbit', 'name'=>'delete_'.$catalog->id, 'id'=>'delete_'.$catalog->id]) !!}
                        {{ Form::close() }}
                        @else
                        {!! Form::button('<i class="material-icons">thumb_up</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light green', 'type' =>'sumbit', 'name'=>'delete_'.$catalog->id, 'id'=>'delete_'.$catalog->id]) !!}
                        {{ Form::close() }}
                        @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">

        </div>
    </div>

</div>
</div>

</div>
</div>
@endsection
