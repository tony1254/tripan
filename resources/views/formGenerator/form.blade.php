@extends('layouts.base') @extends('layouts.startcss') @extends('layouts.head') @section('content')
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
}

.encabezado>tbody>tr>th {
    padding: 0px;
    /*width: 80px;*/
    /*height: 20px;*/
}

.table-condensed>tbody>tr>td.strech {
    width: 0.3%;
}

.table-condensed>tbody>tr>td.numero {
    width: 0.1%;
}
</style>
<p></p>
<div class="row text-capitalize">
    <div class="panel panel-default">
        <div class="panel-heading text-center grey lighten-1">
            <b>  Boleta de Formulario: {{$form->name}}        </b>
        </div>
        <div class="panel-body">
            <div class="">
                <div class="col-xs-3">
                    <table class="  table-condensed encabezado">
                        <tr>
                            <th class="text-nowrap">motivo del inventario</th>
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
                        {{ matriz($form->headers) }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <table class="table-condensed encabezado">


    <tr>
        <td rowspan="2">&nbsp;dap</td>
        <td colspan="2">&nbsp;seccion</td>
        <td rowspan="2">&nbsp;ht</td>
        <td rowspan="2">&nbsp;ht</td>
        <td rowspan="2">&nbsp;ht</td>
        <td rowspan="2">&nbsp;ht</td>

    </tr>
        <tr>

        <td>&nbsp;cal</td>
        <td>&nbsp;atl</td>
    </tr>


    <tr>
        <td>c</td>
        <td>c</td>
        <td>c</td>
        <td>c</td>
        <td>c</td>
        <td>c</td>
        <td>c</td>
    </tr>
</table> -->
@endsection
