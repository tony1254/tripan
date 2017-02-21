@section('title')Catalogos - Editar @endsection
@extends('layouts.app') @section('content')
<div class="container">
    <div class=" col-md-10 col-md-offset-1 text-capitalize">

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading  light-green lighten-1">
                <div class="row">
                <div class="col-xs-6">
                    <h5>Editar Nuevo </h5>
                </div>
                <div class="col-xs-6 text-right right">
                    <a class="waves-effect btn btn-floating  red green-text text-lighten-5 tooltipped" data-position="bottom" data-delay="0" data-tooltip="Regresar" href="{{  route('catalog.index') }}">@lang('buttons.back')</a>

                </div>
            </div>
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

                        {!! Field::text('description',$catalog->description,['label'=>'Nombre de Opcion','autofocus','data-length'=>'20','maxlength'=>'20']) !!}

                        {!! Form::button(trans('validation.attributes.save'), ['class' => 'btn teal white-text waves-effect', 'type' =>'sumbit' ]) !!}
                    {!! Form::close() !!}

</div>

        </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
$('input').characterCounter();
$('#input_text').characterCounter();
        $('input#input_text, textarea#description').characterCounter();
});
</script>
@endsection