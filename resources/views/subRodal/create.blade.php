@section('title')Sub Rodales - Crear @endsection
@extends('layouts.app') @section('content')
<div class="container">
    <div class=" col-md-10 col-md-offset-1 text-capitalize">
        <div class="row">
            <div class="right ">


            </div>
        </div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading  light-green lighten-1">
                <div class="row">
                <div class="col-xs-6">
                    <h5>Crear Nuevo Sub Rodal </h5>
                </div>
                <div class="col-xs-6 text-right right">
                    <a class="waves-effect btn btn-floating  red green-text text-lighten-5 tooltipped" data-position="bottom" data-delay="0" data-tooltip="Regresar" href="{{  route('subRodal.index') }}">@lang('buttons.back')</a>
                </div>
            </div>
            </div>

                    {!! Form::open(['action'=>['SubRodalController@store'],'method' => 'post']) !!}
<p></p>
<div class="row">
    <div class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">textsms</i>
          <input type="text" id="autocomplete-input" class="autocomplete">
          <label for="autocomplete-input">Autocomplete</label>
        </div>
      </div>
    </div>
  </div>
<div class="row ">
                <div class="col-sm-2 ">{!! Field::text('objectid',['autofocus','placeholder'=>"0"]) !!}</div>
                <div class="col-sm-3 ">{!! Field::text('country',[]) !!}</div>
                <div class="col-sm-3">{!! Field::text('fund',['placeholder'=>"Aaaa"]) !!}</div>
                <div class="col-sm-1">{!! Field::text('property',['placeholder'=>"0"]) !!}</div>
                <div class="col-sm-1">{!! Field::text('rodal',['placeholder'=>"0"]) !!}</div>
                <div class="col-sm-1">{!! Field::text('subRodal',['placeholder'=>"0"]) !!}</div>
        </div>
        <div class="row">
                <div class="col-sm-2">{!! Field::text('specie',['placeholder'=>"Aaaa"]) !!}</div>
                <div class="col-sm-3">{!! Field::text('municipality',['placeholder'=>"Aaaa"]) !!}</div>
                <div class="col-sm-3">{!! Field::text('zona',['placeholder'=>"Aaaa"]) !!}</div>
                <div class="col-sm-3">{!! Field::text('area',['placeholder'=>"Aaaa"]) !!}</div>
                <div class="col-sm-2">{!! Field::text('surface',['placeholder'=>"0000"]) !!}</div>
          </div>
          <div class="row">
                <div class="col-sm-3">{!! Field::text('percent_clon',['placeholder'=>"00%"]) !!}</div>

                <div class="col-sm-3">{!! Field::date('plantation_date',['type'=>'date']) !!}</div>

                <div class="col-sm-1">{!! Field::text('supervisor',['placeholder'=>"0"]) !!}</div>
                <div class="col-sm-1">{!! Field::text('forest_guard',['placeholder'=>"0"]) !!}</div>
                <div class="col-sm-1">{!! Field::date('roleo_date',['placeholder'=>"dd-mm-YYYY"]) !!}</div>
                <div class="col-sm-1">{!! Field::date('pruning_date',['placeholder'=>"dd-mm-YYYY"]) !!}</div>
                <div class="col-sm-1">{!! Field::text('pruning_density',['placeholder'=>"0"]) !!}</div>


            </div>



                        {!! Form::button(trans('validation.attributes.save'), ['class' => 'btn teal white-text waves-effect', 'type' =>'sumbit' ]) !!}
                        <div id="salida"></div>
                    {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
@section('scripts')

<script type="text/javascript">

</script>
@endsection
@section('endScripts')
<script type="text/javascript">

              $( document ).ready(function() {
                    $('#country').autocomplete({
    data: {
      @foreach ($countries as $element)
      "{{ $element->name }}": {{ url('flags/'.$element->iso2.'.jpg') }} ,

      @endforeach

    },
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
  });



                    $("#label_plantation_date").attr('class','active');
                    $('select').material_select();
                });
    $('#country').click(function() {

    if($('#field_country').is(":visible")){
        $('#field_country').hide();
    }else{
        $('#field_country').show();

    }

});
</script>
@endsection