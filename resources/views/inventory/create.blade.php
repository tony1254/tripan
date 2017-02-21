@section('title')Titulos - Crear @endsection @extends('layouts.app') @section('content')
<div class=" col-md-10 col-md-offset-1 text-capitalize">

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading  light-green lighten-1">
            <div class="row">
                <div class="col-xs-6">
                    <h5>Creacion Nuevo Inventario </h5>
                </div>
                <div class="col-xs-6 text-right right">
                    <a class="waves-effect btn btn-floating  red green-text text-lighten-5 tooltipped" data-position="bottom" data-delay="0" data-tooltip="Regresar" href="{{  route('inventory.index') }}">@lang('buttons.back')</a>
                </div>
            </div>

        </div>
        {!! Form::open(['action'=>['InventoryController@store'],'method' => 'post']) !!}
        Sub Rodal
        <hr>
        <div class="">
            <div class="row ">
                <div class="col-sm-1 ">{!! Field::text('No. Boleta',['autofocus','placeholder'=>"0"]) !!}</div>
                <div class="col-sm-1 ">{!! Field::text('pais',['placeholder'=>"GT"]) !!}</div>
                <div class="col-sm-1">{!! Field::text('fondo',['placeholder'=>"aaa"]) !!}</div>
                <div class="col-sm-1">{!! Field::text('finca',['placeholder'=>"0"]) !!}</div>
                <div class="col-sm-1">{!! Field::text('rodal',['placeholder'=>"0"]) !!}</div>
                <div class="col-sm-1">{!! Field::text('subRodal',['placeholder'=>"0"]) !!}</div>
                <div class="col-sm-2">{!! Field::text('año de plantacion',['placeholder'=>"YYYY"]) !!}</div>
                <i class="material-icons green-text">check_circle</i>
                <i class="material-icons red-text">error</i>

            </div>
        </div>
        Nuevo Registro
        <hr>
        <style type="text/css">
        .col-sm-1 {
            /*overflow: hidden;*/
            text-overflow: ellipsis;
        }
        </style>
        <div class="row">
            <!-- {{ $i=0}}
{!! var_dump($campos=arrayHeaderPlant(1) )!!}
            -->
            @foreach ($campos as $element) @if ($i>=12)
            <!-- {{$i=0 }} -->
        </div>
        <div class="row">
            @endif
            <div class="col-sm-1">{!! Field::number($element->name,$i,["step"=>($element->catalog_type)?"1":"any", "min"=>"0", "MAX"=>inputMaxForm($element) ]) !!}</div>
            @if (isSeccion($element->id))
            <!--   {{ $i++ }} -->
            @if ($i>=12)
            <!-- {{$i=0 }} -->
        </div>
        <div class="row">
            @endif
            <!-- {{ $alt=App\HeaderPlants::findOrFail($element->id+1) }} -->
            <div class="col-sm-1">{!! Field::number($alt->name,$i,["step"=>($alt->catalog_type)?"1":"any", "min"=>"0", "MAX"=>inputMaxForm($alt) ]) !!}</div>
            @endif
            <!-- {{ $i++ }} -->
            {{-- {{ var_dump($element->catalog_type )}} --}} @endforeach
        </div>
        <div class="text-right">

            {!! Form::button(trans('validation.attributes.save'), ['class' => 'btn teal white-text waves-effect', 'type' =>'sumbit' ]) !!}
        </div>
        {!! Form::close() !!}
        <div id="salida"></div>
<table class="table-condensed table-hover table-bordered ">
    <tr>
        <th>No.</th>
            @foreach ($campos as $element)

                <th>{{ $element->name }}</th>

        @endforeach
        <th>acciones</th>
    </tr>
    <tr>
        <td>1</td>
        @foreach ($campos as $element)
            <td>{{ inputMaxForm($element) }}</td>

        @endforeach
        <th>
            <a href="" class="orange-text">
                <span class="material-icons">create</span>
            </a>
        </th>
    </tr><tr>
        <td>2</td>
        @foreach ($campos as $element)
            <td>{{ inputMaxForm($element) }}</td>

        @endforeach
        <th>
            <a href="" class="orange-text">
                <span class="material-icons">create</span>
            </a>
        </th>
    </tr>
</table>
    </div>
</div>
@endsection
