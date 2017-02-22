@section('title')Sub Rodales - Crear @endsection
@extends('layouts.app')
@section('css')


@endsection
@section('scripts')
<script type="text/javascript">



</script>
<script src="/bower_components/EasyAutocomplete/dist/jquery.easy-autocomplete.min.js"></script>

@endsection
@section('content')
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

<div class="row ">
                <div class="col-sm-2 ">{!! Field::text('objectid',['autofocus','placeholder'=>"0"]) !!}</div>
                <div class="col-sm-3 ">{!! Field::text('country',['placeholder'=>"GT", 'max'=>'2','min'=>'2',"pattern"=>"[A-Za-z]{2}","title"=>'*Debe ser "codigo de Paises [ISO 3166-1 alfa-2]" Ej.: "GT" para Guatemala']) !!}</div>
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
<input id="example-mail"/>
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


                        {!! Form::button(trans('validation.attributes.save'), ['class' => 'btn teal white-text waves-effect', 'type' =>'sumbit' ]) !!}
                        <div id="salida"></div>
                    {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
@section('scripts')

<script type="text/javascript">
              $( document ).ready(function() {



                });
</script>
@endsection
@section('endScripts')
<script type="text/javascript">
var options = {
    url: "\\json/countries.json",
    getValue: "code",
    template: {
        type: "description",
        fields: {
            description: "name"
        }
    },
    list: {
        match: {
            enabled: true
        }
    },
};

$("#country").easyAutocomplete(options);
              $( document ).ready(function() {



                    $("#label_plantation_date").attr('class','active');
                    $("#label_country").attr('class','active');
                    $('select').material_select();
                });

</script>
@endsection