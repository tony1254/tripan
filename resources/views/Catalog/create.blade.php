@extends('layouts.app') @section('content')
<div class="container">
    <div class=" col-md-10 col-md-offset-1 text-capitalize">
        <div class="row">
            <div class="right ">
                <a class="waves-effect btn btn-floating  red green-text text-lighten-5 tooltipped" data-position="bottom" data-delay="0" data-tooltip="Regresar" href="{{  route('catalog.index') }}">@lang('buttons.back')</a>

            </div>
        </div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading  light-green lighten-1">
                <h5>Crear Nueva Opcion</h5>
            </div>
{{-- podria poner un if exite cambiar hasta el form por el put --}}
					{!! Form::open(['action'=>['CatalogController@store',1],'method' => 'post']) !!}

<div class=" well">

                    <h6>Catalogo


                    @if(request()->input('subId') <>null)
<!-- {{ $catalo=catalogItemFindfirst(request()->input('subId')) }} -->


                    {{ $catalo->name }}
</h6>
<div style="display:none">

                            {!! Field::text('subId',request()->input('subId')) !!}
                            {!! Field::text('name',$catalo->name,['label'=>'Nombre del Catalogo']) !!}
                            {!! Field::text('code',(catalogItemFindLast($catalo->catalog_subId)),['label'=>'codigo','autofocus'=>'autofocus']) !!}
</div>

@else
<div style="display:none">
                        	{!! Field::text('subId',request()->input('last')+1) !!}
</div>
</h6>
                    <hr>
                            {!! Field::text('name',['label'=>'Nombre del Catalogo','autofocus'=>'autofocus']) !!}
@endif
</div>
<div class=" well">
<!-- {{ $texto=(isset($catalo))?"":"Primer" }} -->
        <h6>{{ $texto }} Opcion</h6>
                    <hr>

                        {!! Field::text('description',['label'=>'Nombre de '.$texto.' Opcion','autofocus'=>'autofocus']) !!}
                        {!! Form::button(trans('validation.attributes.save'), ['class' => 'btn teal white-text waves-effect', 'type' =>'sumbit' ]) !!}
                    {!! Form::close() !!}

</div>

        </div>
    </div>
</div>

@endsection