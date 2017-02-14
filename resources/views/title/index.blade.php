@section('title')Titulos @endsection
@extends('layouts.app') @section('content')
<div class="container">

<div class=" col-md-10 col-md-offset-1 text-capitalize">
    <div class="row">
          <div class="right ">
            <button class="waves-effect  btn  green green-text text-lighten-5" onclick="window.location='{{ route('title.create') }}'">@lang('buttons.create')</button>
        </div>
    </div>
    <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading  light-green lighten-1">    <h5>
    Nombres de Titulos
    </h5></div>
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

                @foreach($titles as $title)

                <tr class="{{($title->state)?:'grey'}}">

                    <td>{{ $title->id }}</td>
                    <td>{{ $title->name }}</td>
                    <td>{{ $title->description }}</td>

                    <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['title.destroy', $title->id]]) }}
                        <!-- <a href="{{  route('title.show', $title->id) }}" class="btn-floating btn-sm waves-effect waves-light blue">
                            <i class="material-icons">info</i>
                        </a> -->
                        <a href="{{  route('title.edit', $title->id) }}" class="btn-floating btn-sm waves-effect waves-light orange">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        @if($title->state)
                        {!! Form::button('<i class="material-icons">thumb_down</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light red', 'type' =>'sumbit', 'name'=>'delete_'.$title->id, 'id'=>'delete_'.$title->id]) !!}
                        {{ Form::close() }}
                        @else
                        {!! Form::button('<i class="material-icons">thumb_up</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light green', 'type' =>'sumbit', 'name'=>'delete_'.$title->id, 'id'=>'delete_'.$title->id]) !!}

                        {{ Form::close() }}
                        @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{ $titles->links() }}
        </div>
    </div>
</div>
</div>
</div>
@endsection
