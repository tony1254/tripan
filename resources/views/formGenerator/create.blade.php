@extends('layouts.app') @section('content')
<div class="container">
    <div class="row text-capitalize">

        <div class="panel panel-default">
            <div class="panel-heading ">
<div class=row>

<div class="col-xs-11 ">
<p></p>
            Creacion de  formualrios
</div>
<div class="col-xs-1">
                <a class="waves-effect btn btn-floating  red green-text text-lighten-5 tooltipped" data-position="bottom" data-delay="0" data-tooltip="Regresar" href="{{  route('user.index') }}">@lang('buttons.back')</a>

</div>
</div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        {{ Form::open(['method' => 'post', 'route' => ['generador-de-formularios.store']]) }}
                        <p></p>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="row">

                         {!! Field::text('name',['autofocus'=>'autofocus']) !!}
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                          {!! Field::text('description') !!}
                                </div>
                            </div>
                        </div>
                        <p></p>
                          a  {{ (old('1'))?"check":""}}a
                        <div class="row">
                            <!--  {{ $seccion=0 }} -->

                            @foreach ($headerPlants as $key => $value)
                                @if(isAltura($value->id)) @continue @endif
                            <div class="col-sm-6">
                                <div class="row">
                                @if(isCalidad($value->id))
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
                                                <input name="{{ $value->id }}" id="{{ $value->id }}" type="checkbox" onclick=" " value="{{ true }}"
                                                {{ (old($value->id))?"checked":"" }}>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!isSeccion($value->id))
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
                                                <input name="{{ $value->id }}" id="{{ $value->id }}" type="checkbox" onclick=" " value="{{ true }}"
                                                {{ (old($value->id))?"checked":"" }}>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- {!! Field::text('name') !!} {!! Field::email('email') !!} {!! Field::password('password') !!} {!! Field::passwosrd('password_confirmation') !!} --}} {!! Form::button(trans('buttons.create'), ['class' => 'btn teal white-text waves-effect', 'type' =>'submit','name'=>'create']) !!}   <a class="waves-effect  btn  grey green-text text-lighten-5" href="{{  route('user.index') }}">@lang('buttons.cancel')</a> {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection @section('scripts') @endsection
