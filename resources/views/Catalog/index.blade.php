@section('title')Catalogos  @endsection
@extends('layouts.app') @section('content')
<div class="container">

<div class=" col-md-10 col-md-offset-1 text-capitalize">
    <div class="row">
          <div class="right ">
            <button class="waves-effect  btn  green green-text text-lighten-5" onclick="window.location='{{ route('catalog.create','last='.$subId) }}'">@lang('buttons.create')</button>
        </div>
    </div>
    <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading  light-green lighten-1">    <h5>
    Catalogos
    </h5></div>
    <div class=" table-responsive">
        <table class="table table-condensed table-hover highlight ">
            <thead>
                <tr>
                    <th data-field="price">No.</th>
                    <th data-field="id">Nombres</th>
                    <th data-field="name">Actions</th>
                </tr>
            </thead>
            <tbody>
            <!-- {{ $subId=0 }} -->
                @foreach($catalogs as $catalog)

                 {{-- @continue($subId==$catalog->catalog_subId) --}}
                <!-- {{ $subId=$catalog->catalog_subId }} -->
                <tr class="">

                    <td>{{ $catalog->catalog_subId }}</td>
                    <td>{{ $catalog->name }}</td>
                    <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['catalog.destroy', $catalog->id]]) }}
                        <a href="{{  route('catalog.show', $catalog->id) }}" class="btn-floating btn-sm waves-effect waves-light blue">
                            <i class="material-icons">info</i>
                        </a>
                        <!-- <a href="{{  route('catalog.edit', $catalog->id) }}" class="btn-floating btn-sm waves-effect waves-light orange">
                            <i class="material-icons">mode_edit</i>
                        </a> -->
                        @if($catalog->state)
                        {!! Form::button('<i class="material-icons">thumb_down</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light red', 'type' =>'sumbit', 'name'=>'delete_'.$catalog->id, 'id'=>'delete_'.$catalog->id]) !!}
                        {{ Form::close() }}
                        @else
                        {!! Form::button('<i class="material-icons">thumb_down</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light red', 'type' =>'sumbit', 'name'=>'delete_'.$catalog->id, 'id'=>'delete_'.$catalog->id]) !!}

                        {{ Form::close() }}
                        @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{ $catalogs->links() }}
        </div>
    </div>
</div>
</div>
</div>
@endsection
