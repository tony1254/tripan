@section('title')Generador de Formularios - editar @endsection
@extends('layouts.app') @section('content')
<div class="container">
    <div class="row text-capitalize">
        <div class="panel panel-default">
            <div class="panel-heading ">
                <div class=row>
                    <div class="col-xs-11 ">
                        <p></p>
                        Creacion de formualrios
                    </div>
                    <div class="right">

                        <a class="waves-effect btn btn-floating  red green-text text-lighten-5 tooltipped" data-position="bottom" data-delay="0" data-tooltip="Regresar" href="{{  route('FormGenerator.index') }}">@lang('buttons.back')</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        {{ Form::open(['action'=>['FormGeneratorController@update',$form->id],'method' => 'put','id'=>'form1']) }}
                        <p></p>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="row">
                                    {!! Field::text('name',$form->name,['autofocus'=>'autofocus']) !!}
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    {!! Field::text('description',$form->description) !!}
                                </div>
                            </div>
                        </div>
 <p></p>
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            Encabezado
                        </div>
                    </div>

   <div class="row">

                            <div class="col-sm-6">
                             <!-- {{ $seccion=0 }}
                                    {{ $rows=0  }} -->


                            @foreach ($titles as $key => $value)
 @continue($value->id<=13)

                            <div class=row>
                                    <!-- {{ $rows++  }} -->

                                    <div class="col-xs-3">
                                        {{$value->name }}:
                                    </div>
                                    <div class="col-xs-6">
                                        {{$value->description }}
                                    </div>
                                    <div class="col-xs-3">
                                        <!-- Switch -->
                                        <div class="switch" id="{{ $value->id }}">
                                            <label>
                                                <input name="{{ $value->id }}z" id="c{{ $value->id }}" type="checkbox" onclick=" " value="{{ true }}" {{ (headersIsOn(($value->id."z"),$form))?"checked":"" }}>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>

                                    </div >
                                    @if($rows>=(($titles->count()-13)/2))
                                    <!-- {{ $rows=0  }} -->
                                        </div>
                                         <div class="col-sm-6">

                                    @endif
                            @endforeach
                            </div>
                        </div>


                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            campos
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-sm-6">
                             <!-- {{ $seccion=0 }}
                                    {{ $rows=0  }}

                                     -->


                            @foreach ($headerPlants as $key => $value)
                                @continue($value->id<1)

                            @if(isAltura($value->id)) @continue @endif
                            <div class=row>
                                    @if(isCalidad($value->id))
                                    <!-- {{ $rows++  }} -->
                                    <div class="col-xs-3">
                                        <!-- {{ $seccion++ }} -->
                                        Seccion {{ seccionName($seccion) }}:
                                    </div>
                                    <div class="col-xs-6">
                                        Calidad y altura de Seccion {{ seccionName($seccion) }}
                                    </div>
                                    <div class="col-xs-3">
                                        <!-- Switch -->
                                        <div class="switch" id="{{ $value->id }}">
                                            <label>
                                                <input name="{{ $value->id }}" id="c{{ $value->id }}" type="checkbox" onclick=" " value="{{ true }}" {{ (headersIsOn($value->id,$form))?"checked":"" }}>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    @endif @if(!isSeccion($value->id))
                                    <!-- {{ $rows++  }} -->

                                    <div class="col-xs-3">
                                        {{$value->name }}:
                                    </div>
                                    <div class="col-xs-6">
                                        {{$value->description }}
                                    </div>
                                    <div class="col-xs-3">
                                        <!-- Switch -->
                                        <div class="switch" id="{{ $value->id }}">
                                            <label>
                                                <input name="{{ $value->id }}" id="c{{ $value->id }}" type="checkbox" onclick=" " value="{{ true }}" {{ (headersIsOn($value->id,$form))?"checked":"" }}>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    @endif
                                    </div >
                                    @if($rows>(($headerPlants->count()-7-1 )/2))
                                    <!-- {{ $rows=0  }} -->
                                        </div>
                                         <div class="col-sm-6">

                                    @endif
                            @endforeach
                            </div>
                        </div>
                        {{-- {!! Field::text('name') !!} {!! Field::email('email') !!} {!! Field::password('password') !!} {!! Field::passwosrd('password_confirmation') !!} --}} {{-- {!! Form::button(trans('buttons.create'), ['class' => 'btn teal white-text waves-effect', 'type' =>'submit','name'=>'create']) !!} --}}
                        <a id="test" class="btn teal white-text waves-effect">@lang('validation.attributes.save')</a>
                        <a class="waves-effect  btn  grey green-text text-lighten-5" href="{{  route('FormGenerator.index') }}">@lang('buttons.cancel')</a> {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Structure -->
<div id="modal1" class="modal  modal-fixed-footer modal-sm " style="height:230px">
    <div class="modal-content yellow lighten-4">
        <h4 class="orange-text">Advertencia:</h4>
        <p>Esta a punto de crear un formulario que probablemente exeda el espacio en una hoja impresa, pues ha seleccionado mas de 20 campos</p>
    </div>
    <div class="modal-footer">
        <div class="row">
            <div class="col-xs-6">
                <a href="#!" class=" transparent modal-action modal-close waves-effect waves-green btn btn-block  green-text text-darken-3" onclick="sumbit()">@lang('buttons.accept')</a>
            </div>
            <div class="col-xs-6">
                <a href="#!" class=" transparent modal-action modal-close waves-effect waves-red btn btn-block">@lang('buttons.cancel')</a>
            </div>
        </div>
    </div>
</div>
@endsection @section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});
document.getElementById("test").onclick = function() {
    // alert(document.getElementById(1).checked);
    isCountCheck("Check something");
};
$(document).keypress(function(e) {
    if(e.which == 13) {
        isCountCheck("Check something");
    }
});
function isCountCheck(helperMsg) {
    var i, campos ={{ count($headerPlants) }},
        checks = 0;
    for (i = 0; i < campos; i++) {
        var nombre = "#c";
        var idCheks = nombre.concat(i);
        if ($(idCheks).is(":checked")) checks++;
    }
    if (checks > 20) {
        // alert(checks);
        $('#modal1').modal('open');
    }else{
        document.getElementById("form1").submit();

    }
    return false;
}
function sumbit() {
    document.getElementById("form1").submit();
}
</script>
@endsection
