@extends('layouts.base')
@extends('layouts.startcss')
@extends('layouts.startscripts')
@extends('layouts.head')
@section('catalogs')
            <div class="row">

<!-- a{{ $i=0 }}
{{ $j=1 }}
{{ $header=0 }}
{{ $foot=0 }}
a -->
@foreach (catalogArray($form->headers) as $value)

    @if($i==0)
<!--      {{ $header=1 }}
    {{ $foot=0 }}
{{$i=$value->catalog_subId}} -->

    @else
        @if (($value->catalog_subId!=$i))

<!--
        {{$i=$value->catalog_subId}}

        {{ $header=1 }}


 -->

        @endif
    @endif
@if($header==1)
    <!-- {{ $header=0 }} -->

    @if ($foot==1)
    <!-- {{ $foot=0 }} -->
                        </table>
                    </div>
    @endif
    <!-- {{ $catalogE=" text-center  grey lighten-2 " }} -->
                    <div class="col-xs-2">
                        <table class="table-condensed encabezado">
                        <tr>
                            <th class="catalogN {{ $catalogE }}" colspan="2">{{ $value->name }}</th>
                        </tr>
                            <tr>
                                <th class='catalogN {{ $catalogE }}'>Codigo</th>
                                <th class="catalogD {{ $catalogE }}">Descripción</th>

                            </tr>
                            <!-- {{ $j=$j+2 }} -->
@endif

                    <tr>
                        <td class='catalogN text-center'>{{ $value->code }}</td>
                        <td class="catalogD ">{{ $value->description }}</td>

                    </tr>
                    <!-- {{ $j++ }} -->
                    @if($j>9)
                     <!-- {{ $foot=1 }}
                         {{ $header=1 }}
                         {{ $j=1 }}
                                         -->
                    @endif
@endforeach

                    </table>
                </div>


@endsection
@section('content')
<style>
.encabezado>tbody>tr>td {
    border: 1px solid black;
    border-collapse: collapse;
}

.table-condensed>tbody>tr>td,
.table-condensed>tbody>tr>th,
.table-condensed>tfoot>tr>td,
.table-condensed>tfoot>tr>th,
.table-condensed>thead>tr>td,
.table-condensed>thead>tr>th {
    font-size: 10px;
    width: 1%;
    padding: 0px;
    max-width: 10px;

}

.encabezado>tbody>tr>th {
    padding: 0px;
       /* min-width: 15px;
           max-width: 15px; */
    width: 8%;

}

.table-condensed>tbody>tr>td.strech {
    /*width: 1%;*/
        width: 50px;
    min-width: 15px;
    max-width: 1%;
    overflow: hidden;
    /*text-overflow: ellipsis;*/
    /*white-space: pre;*/


}

.table-condensed>tbody>tr>td.coma {
width: 50px;
    min-width: 5px;
    max-width: 5px;


}
.table-condensed>tbody>tr>td.numero {
        width: 50px;
    min-width: 20px;
    max-width: 20px;


}
.encabezado>tbody>tr>th.catalogN ,
.encabezado>tbody>tr>td.catalogN {
     border: 1px solid black;
    border-collapse: collapse;
    width: 0.8%;
}
.encabezado>tbody>tr>th.catalogD ,
.encabezado>tbody>tr>td.catalogD {
     border: 1px solid black;
    border-collapse: collapse;
    width:3%;
}
.col-xs-2{
    padding-right: 0px;
}
table {
    width: 0%;
}
.panel {
    margin: 0px;
}
</style>
<p></p>


    <div class="panel panel-default" id="sheet">
        <div class="panel-heading text-center grey lighten-1">
            <b>  Boleta de Formulario: {{$form->name}}        </b>
        </div>
        <div class="panel-body">
            <div class="">
                <div class="col-xs-3">
                    <table class="  table-condensed encabezado">
                        <tr>
                            <th class="text-nowrap" width="60px">motivo del inventario</th>
                            {{ cols(3) }}
                        </tr>
                        <tr>
                            <th class="text-nowrap">País</th>
                            {{ cols(3) }}
                        </tr>
                        <tr>
                            <th class="text-nowrap">Fondo (empresa)</th>
                            {{ cols(3) }}
                        </tr>
                        <tr>
                            <th class="text-nowrap">Finca(predio)</th>
                            {{ cols(3) }}
                        </tr>
                    </table>
                </div>
                <div class="col-xs-3">
                    <table class="  table-condensed encabezado">
                        <tr>
                            <th class="text-nowrap">rodal</th>
                            {{ cols(3) }}
                        </tr>
                        <tr>
                            <th class="text-nowrap">subrodal (Estrato)</th>
                            {{ cols(3) }}
                        </tr>
                        <tr>
                            <th class="text-nowrap">Lote</th>
                            {{ cols(3) }}
                        </tr>
                        <tr>
                            <th class="text-nowrap">año de plantacion</th>
                            {{ cols(4) }}
                        </tr>
                        <tr>
                            <th class="text-nowrap">motivo de inventario</th>
                            {{ cols(3) }}
                        </tr>
                    </table>
                </div>
                <div class="col-xs-3">
                    <table class="  table-condensed encabezado">
                        <tr>
                            <th class="text-nowrap">Parcela No.</th>
                            {{ cols(3,2) }}
                        </tr>
                        <tr>
                            <th class="text-nowrap">sup(m2)Parcela</th>
                            {{ cols(3,2) }}
                        </tr>
                        <tr>
                            <th class="text-nowrap">Responsable</th>
                            <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                            <th class="text-nowrap">fecha</th>
                            {{ cols(3,'2%') }}
                        </tr>
                        <tr>
                            <th rowspan="2"="2" class="text-nowrap">UTM wgs84 z15</th>
                            {{ cols(6) }}
                        </tr>
                        <tr>
                            {{ cols(6) }}
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                @for($i=0;$i<3;$i++)
                <div class="col-xs-3">
                    <table class="table-condensed encabezado">
                        <tr>
                            <th class="text-nowrap">motivo de inventario
                            </th>
                            {{ cols(3,2) }}

                        </tr>
                    </table>
                </div>
                @endfor
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table-condensed encabezado">

                        {{matriz(arrayOrs($form->headers))}}
                    </table>

                </div>
            </div>
                @yield('catalogs')

        </div>
    </div>


@endsection
@section('scripts')
<script type="text/javascript">
$( document ).ready(function() {
    window.print();


});

</script>
@endsection


