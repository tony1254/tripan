@section('title')Generador de Formularios - Imprimir @endsection
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
                    <div class="col-down col-xs-1">
                        <table class="table-condensed encabezado">
                        <tr>
                            <th class="catalogNC {{ $catalogE }}" colspan="2">{{ $value->name }}</th>
                        </tr>
                            <tr>
                                <th class='catalogN {{ $catalogE }}'>Codigo</th>
                                <th class="catalogD {{ $catalogE }}">Descripción</th>

                            </tr>
                            <!-- {{ $j=$j+2 }} -->
@endif

                    <tr>
                        <td class='catalogN text-center'>{{ $value->code }}</td>
                        <td class="catalogD " nowrap>{{ $value->description }}</td>

                    </tr>
                    <!-- {{ $j++ }} -->
                    @if($j>(9))
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
    text-transform: capitalize;

}

.table-condensed>tbody>tr>td.strech {
    /*width: 1%;*/
        width: 50px;
    min-width: 15px;
    max-width: 0.6%;
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
.encabezado>tbody>tr>th.catalogNC ,
.encabezado>tbody>tr>th.catalogN ,
.encabezado>tbody>tr>td.catalogN {
     border: 1px solid black;
    border-collapse: collapse;
    width: 0.4%;
    font-size: 9px;
}
.encabezado>tbody>tr>th.catalogD ,
.encabezado>tbody>tr>td.catalogD {
     border: 1px solid black;
    border-collapse: collapse;
    width:3%;
    font-size: 9px;
}

.encabezado>tbody>tr>th.catalogD ,
.encabezado>tbody>tr>th.catalogN {
    font-size: 5px;

}
.table-condensed>tbody>tr>td.strech
{
    font-size: 9px;

}
.table-condensed>tbody>tr>td.strech.subSeccion,
.encabezado>tbody>tr>th.catalogNC {
    font-size: 8px;

}

.col-down{
    padding-right: 0px;
    margin-right: 0px;
    padding-left: 0px;
    width: 120px;
}
.col-down1{
    padding-right: 0px;
    margin-right: 0px;
    width: 130px;
}
table {
    width: 0%;
}
.panel {
    margin: 0px;
}
.panel > .panel-heading, .panel.panel-default > .panel-heading {
    padding-top: 0px;
    padding-bottom: 0px;
    }
.panel>.panel-body{
    padding-top:  1px;
}
.space{
margin-bottom: 2px;
margin-top: 2px;

    border-top: thick double #e0e0e0      ;
    border-width: 1px;
}
</style>
<br>


    <div class="panel panel-default" id="sheet">
        <div class="panel-heading text-left transparent">
        <div class="row">
            <div class="col-xs-4">
                <IMG id="logo" SRC="{{ asset('/content/logo3.jpg')}}" WIDTH=85 HEIGHT=40>
            </div>
            <div class="col-xs-4 text-center">
            <p></p>
            <p></p>
            <p></p>
             Boleta de Formulario: {{$form->name}}
            </div>
        </div>
        </div>
            <p class="space"></p>

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
                            <td colspan="12">&nbsp;</td>
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

                @foreach(arrayTitle($form->headers) as $name)
                <div class="col-xs-3">
                    <table class="table-condensed encabezado">
                        <tr>
                            <th class="text-nowrap">{{ $name }}
                            </th>
                            {{ cols(4,2) }}

                        </tr>
                    </table>
                </div>
                @endforeach
            </div>
            <p class="space"></p>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table-condensed encabezado">

                        {{matriz(arrayOrs($form->headers))}}
                    </table>

                </div>
            </div>


    <!-- {{ $catalogE=" text-center  grey lighten-2 " }} -->
                    <div class="col-down1 col-xs-1">
                        <table class="table-condensed encabezado">
                        <tr>
                            <td class="catalogNC {{ $catalogE }}" colspan="1">No. Parcelas por Estrato</td>
                            <td class="catalogNC {{ $catalogE }}" colspan="1">No. Alturas por Parcela</td>
                        </tr>


                    <tr>
                        <td class='catalogD text-center'>3</td>
                        <td class="catalogD text-center" nowrap>10</td>

                    </tr>
                    <tr>
                        <td class='catalogD text-center'>4</td>
                        <td class="catalogD text-center" nowrap>8</td>
                    </tr>
                    <tr>
                        <td class='catalogD text-center'>5</td>
                        <td class="catalogD text-center" nowrap>6</td>
                    </tr>
                    <tr>
                        <td class='catalogD text-center'>>5</td>
                        <td class="catalogD text-center" nowrap>5</td>
                    </tr>

                    </table>
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


