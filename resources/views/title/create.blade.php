@section('title')Titulos - Crear @endsection
@extends('layouts.app') @section('content')
<div class="container">
    <div class=" col-md-10 col-md-offset-1 text-capitalize">
        <div class="row">
            <div class="right ">

            <a class="waves-effect btn btn-floating  red green-text text-lighten-5 tooltipped" data-position="bottom" data-delay="0" data-tooltip="Regresar" href="{{  route('title.index') }}">@lang('buttons.back')</a>

            </div>
        </div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading  light-green lighten-1">
                <h5>Crear Nuevo Titulo </h5>
            </div>

                    {!! Form::open(['action'=>['TitleController@store'],'method' => 'post']) !!}
<p></p>
                        {!! Field::text('name',['autofocus']) !!}
                        {!! Field::text('description',[]) !!}

                        {!! Form::button(trans('validation.attributes.save'), ['class' => 'btn teal white-text waves-effect', 'type' =>'sumbit' ]) !!}
                        <div id="salida"></div>
                    {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
