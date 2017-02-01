@extends('layouts.base')
@extends('layouts.startcss')
@extends('layouts.head') @section('content')
<style>
.encabezado>tbody>tr>td {
    border: 1px solid black;
    border-collapse: collapse;
}


     .table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th{
font-size: 10px;
width: 1%;
    padding: 0px;

}

.encabezado>tbody>tr>th {


    padding: 0px;
    /*width: 80px;*/
    /*height: 20px;*/
}

.table-condensed>tbody>tr>td.strech{
width: 0.3%;

}
.table-condensed>tbody>tr>td.numero{
width: 0.1%;

}
</style>
<div class="row text-capitalize">
    <div class="panel panel-default">
        <div class="panel-heading text-center">Boleta General de Inventarios ###</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3">

                        <table class="  table-condensed encabezado">
                            <tr>
                                <th >motivo del inventario</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>País</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>Fondo (empresa)</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>Finca(predio)</th>
                                {{ cols(1) }}
                            </tr>
                        </table>

                </div>
                <div class="col-xs-3">

                        <table class="  table-condensed encabezado">

                            <tr>
                                <th>rodal</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>subrodal (Estrato)</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>Lote</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>año de plantacion</th>
                                {{ cols(1) }}
                            </tr><tr>
                                <th>motivo de inventario</th>
                                {{ cols(1) }}
                            </tr>
                        </table>

                </div>
                <div class="col-xs-3">

                        <table class="  table-condensed encabezado">
                            <tr>
                                <th>Parcela No.</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>sup(m2)Parcela</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>Responsable</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>fecha</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th rowspan="2" ="2">UTM wgs84 z15</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                {{ cols(1) }}
                            </tr>
                        </table>

                </div>
                <!-- <div class="col-xs-3">

                        <table class="  table-condensed encabezado">
                            <tr>
                                <th>tipos de invetario</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>País</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>Fondo (empresa)</th>
                                {{ cols(1) }}
                            </tr>
                            <tr>
                                <th>Finca(predio)</th>
                                {{ cols(1) }}
                            </tr>
                        </table>

                </div> -->
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table-condensed encabezado">
                    {{ matriz($ors) }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table-condensed encabezado">


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
</table>
@endsection
