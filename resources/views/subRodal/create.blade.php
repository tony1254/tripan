@section('title')Sub Rodales - Crear @endsection
@extends('layouts.app')
@section('css')

<style type="text/css">
    .eac-item{
         white-space: nowrap;
    }
</style>
@endsection
@section('scripts')
    <script type="text/javascript">
    </script>
    <script src="/bower_components/EasyAutocomplete/dist/jquery.easy-autocomplete.min.js"></script>

@endsection
@section('content')

<div class="container">

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
                <div class="col-sm-2 ">{!! Field::text('objectid',['autofocus','required','placeholder'=>"0"]) !!}</div>
                <div class="col-sm-3 ">{!! Field::text('country',['required','placeholder'=>"GT", 'max'=>'2','min'=>'2',"pattern"=>"[A-Za-z]{2}","title"=>'*Debe ser "codigo de Paises [ISO 3166-1 alfa-2]" Ej.: "GT" para Guatemala']) !!}</div>
                <div class="col-sm-3">{!! Field::text('fund',['required','placeholder'=>"Aaaa"]) !!}</div>
                <div class="col-sm-2">{!! Field::number('property',['required','placeholder'=>"0"]) !!}</div>
                <div class="col-sm-2">{!! Field::number('rodal',['required','placeholder'=>"0"]) !!}</div>
        </div>
        <div class="row">
                <div class="col-sm-2">{!! Field::number('subrodal',['required','placeholder'=>"0"]) !!}</div>
                <div class="col-sm-2">{!! Field::text('specie',['placeholder'=>"Aaaa"]) !!}</div>
                <div class="col-sm-2">{!! Field::text('municipality',['placeholder'=>"Aaaa"]) !!}</div>
                <div class="col-sm-3">{!! Field::text('zona',['placeholder'=>"Aaaa"]) !!}</div>
                <div class="col-sm-3">{!! Field::text('area',['placeholder'=>"Aaaa"]) !!}</div>
          </div>
          <div class="row">
                <div class="col-sm-2">{!! Field::text('surface',['required','placeholder'=>"0000 ha"]) !!}</div>
                <div class="col-sm-3">{!! Field::text('percent_clon',['placeholder'=>"00%"]) !!}</div>

                <div class="col-sm-3">{!! Field::date('plantation_date',['required','type'=>'date']) !!}</div>

                <div class="col-sm-4">{!! Field::text('supervisor',['placeholder'=>"0"]) !!}</div>
         </div>
          <div class="row">
                <div class="col-sm-3">{!! Field::text('forest_guard',['placeholder'=>"0"]) !!}</div>
                <div class="col-sm-3">{!! Field::date('raleo_date',['placeholder'=>"dd-mm-YYYY"]) !!}</div>
                <div class="col-sm-3">{!! Field::date('pruning_date',['placeholder'=>"dd-mm-YYYY"]) !!}</div>
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
              $( document ).ready(function() {



                });
</script>
@endsection
@section('endScripts')

<script type="text/javascript">
var options = {
     data:
     [
       @foreach ($countries as $element)
     {"code":"{{ $element->iso2 }}",
        "name":"{{ $element->name }}",
         "icon": "{{ url('content/flags/'.$element->iso2.'.jpg') }}"
    },
      @endforeach
        ],
    getValue: "code",
    template: {
        type: "custom",
        method: function(value, item) {
            return  value+" | <i>" + item.name + "</i> | " + "<img src='" + item.icon + "' />" ;
        },

    },
    list: {
        match: {
            enabled: true
        }
    },
};

var options2 = {

   data:
     [
       @foreach ($funds as $element)
     {
        "name":"{{ $element->name }}",
        "description":"{{ $element->description }}",
    },
      @endforeach

        {name: "Train", type: "ground", icon: "http://lorempixel.com/100/50/transport/6"}

        ],

    getValue: "name",
        template: {
        type: "custom",
        method: function(value, item) {
            return    value+ " - <i>" + item.description+"</i>";
        },
    /*template: {

        type: "description",
        fields: {
            description: "description",
            description: "icon",
            description: "type"
        }*/
    },
    list: {
        match: {
            enabled: true
        }
    },
};
$("#country").easyAutocomplete(options);


$("#fund").easyAutocomplete(options2);



              $( document ).ready(function() {




                    $("#label_plantation_date").attr('class',$("#label_plantation_date").attr('class')+'active');
                    $("#label_raleo_date").attr('class',$("#label_raleo_date").attr('class')+'active');
                    $("#label_pruning_date").attr('class',$("#label_pruning_date").attr('class')+'active');
                    $("#label_country").attr('class',$("#label_country").attr('class')+'active');

                    $("#label_fund").attr('class',$("#label_fund").attr('class')+'active');
                    $('select').material_select();
                });

</script>
@endsection