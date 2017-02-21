@section('title')Campos - Crear @endsection
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
                <h5>Crear Nuevo </h5>
            </div>

                    {!! Form::open(['action'=>['HeaderPlantsController@store'],'method' => 'post']) !!}
<p></p>
                        {!! Field::text('name',['autofocus']) !!}
                        {!! Field::text('alias',['autofocus']) !!}
                        {!! Field::text('description',[]) !!}
                        <div class="row">
                            <div class="col-xs-2 "><p></p><p></p>
                            Catalogo: </div>
                            <div class="col-xs-1">
                        {!! Field::checkbox('catalog_type','1',['label'=>"",]) !!}
                            </div>
                            <div class="col-xs-9">
                        {!! Field::select('catalog_id',$catalogs,['label'=>"seleciona una Opcion", ]) !!}
                            </div>

                        </div>

<p></p>
                        {!! Field::number('number',['MAX'=>'4']) !!}
                        {!! Field::number('decimal',['MAX'=>'4']) !!}


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
// alert($("select option:selected").val());
// $("select value:selected").remove();

$('#field_catalog_id').hide();
if ($('#catalog_type').prop('checked')) {
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