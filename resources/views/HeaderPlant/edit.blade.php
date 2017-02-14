@section('title')Campos - Edit {{ $HeaderPlant->name }}@endsection
@extends('layouts.app') @section('content')
<div class="container">
    <div class=" col-md-10 col-md-offset-1 text-capitalize">
        <div class="row">
            <div class="right ">

            <a class="waves-effect btn btn-floating  red green-text text-lighten-5 tooltipped" data-position="bottom" data-delay="0" data-tooltip="Regresar" href="{{  route('HeaderPlants.index') }}">@lang('buttons.back')</a>

            </div>
        </div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading  light-green lighten-1">
                <h5>Editar  </h5>
            </div>

					{!! Form::open(['action'=>['HeaderPlantsController@update',$HeaderPlant->id],'method' => 'put']) !!}
<p></p>
                        {!! Field::text('name',$HeaderPlant->name,[]) !!}
                        {!! Field::text('description',$HeaderPlant->description,[]) !!}
                        <div class="row">
                            <div class="col-xs-2 "><p></p><p></p>
                            Catalogo: </div>
                            <div class="col-xs-1">
                        {!! Field::checkbox('catalog_type','1',['label'=>"",$HeaderPlant->catalog_type?'checked':'']) !!}
                            </div>
                            <div class="col-xs-9">
                        {!! Field::select('catalog_id',$catalogs,$HeaderPlant->catalog_id,['label'=>"seleciona una Opcion", ]) !!}
                            </div>

                        </div>

<p></p>
                        {!! Field::text('number',$HeaderPlant->number,[]) !!}
                        {!! Field::text('decimal',$HeaderPlant->decimal,[]) !!}


                        {!! Form::button(trans('validation.attributes.save'), ['class' => 'btn teal white-text waves-effect', 'type' =>'sumbit' ]) !!}
                        <div id="salida"></div>
                    {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
@section('scripts')

<script type="text/javascript">
      $(document).ready(function() {
$('#field_catalog_id').hide();
if({{ $HeaderPlant->catalog_type }}){
$('#field_catalog_id').show();

}
  $('select').material_select();
  });
$('#catalog_type').click(function() {

    if($('#field_catalog_id').is(":visible")){
        $('#field_catalog_id').hide();
    }else{
        $('#field_catalog_id').show();

    }

});


</script>
@endsection