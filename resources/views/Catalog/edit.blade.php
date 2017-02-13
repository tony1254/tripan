@section('title')Catalogos - Editar @endsection
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
                <h5>Editar Nuevo </h5>
            </div>

					{!! Form::open(['action'=>['CatalogController@update',$catalog->id],'method' => 'put']) !!}
<div style="display:none">
                        	{!! Field::text('subId',$catalog->catalog_subId) !!}
</div>

<div class=" well">

					<h6>Catalogo: {{ $catalog->name }}</h6>
					<hr>

</div>
<div class=" well">
		<h6> Opcion</h6>
					<hr>

                        {!! Field::text('description',$catalog->description,['label'=>'Nombre de Opcion']) !!}
                        {!! Form::button(trans('validation.attributes.save'), ['class' => 'btn teal white-text waves-effect', 'type' =>'sumbit' ]) !!}
                    {!! Form::close() !!}

</div>

        </div>
    </div>
</div>

@endsection