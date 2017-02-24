@extends('layouts.app') @section('css')
<style type="text/css">
th {
    background-color: #c8e6c9;
}
td{
    text-align: center;
}
</style>
@endsection @section('content')
<div class="container">
    <div class=" col-md-10 col-md-offset-1 text-capitalize">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading  light-green lighten-1">
                <div class="row">
                    <div class="col-xs-6">
                        <h5>Sub Rodal No. {{ $subRodal->id }} </h5>
                    </div>
                    <div class="col-xs-6 text-right right">
                        <a class="waves-effect btn btn-floating  red green-text text-lighten-5 tooltipped" data-position="bottom" data-delay="0" data-tooltip="Regresar" href="{{  route('subRodal.index') }}">@lang('buttons.back')</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive striped highlight">
                <table class="table table-condensed table-hover  table-bordered striped highlight">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <th data-field="price">ObjetcID</th>
                            <td>{{ $subRodal->objectid }}</td>
                            <th data-field="id">@lang('validation.attributes.country')</th>
                            <td>{{ $subRodal->country }}</td>
                            <th data-field="name">fondo</th>
                            <td>{{ $subRodal->fund }}</td>
                        </tr>
                        <tr>
                            <th data-field="name">Finca</th>
                            <td>{{ $subRodal->property }}</td>
                            <th data-field="price">rodal</th>
                            <td>{{ $subRodal->rodal }}</td>
                            <th data-field="price">subrodal</th>
                            <td>{{ $subRodal->subrodal }}</td>
                        </tr>
                        <tr>
                            <th data-field="name">municipality</th>
                            <td>{{ $subRodal->municipality }}</td>
                            <th data-field="price">zona</th>
                            <td>{{ $subRodal->zona }}</td>
                            <th data-field="price">area</th>
                            <td>{{ $subRodal->area }}</td>
                        </tr>
                        <tr>
                            <th data-field="name">surface</th>
                            <td>{{ $subRodal->surface }} ha</td>
                            <th data-field="price">dencidad</th>
                            <td>{{ $subRodal->pruning_density }}</td>
                            <th data-field="price">Origen de Planta</th>
                            <td>{{ $subRodal->percent_clon }}</td>
                        </tr>
                        <tr>
                            <th data-field="name">plantation_date</th>
                            <td>{{ ($subRodal->plantation_date)?date( "d-m-Y", strtotime( $subRodal->plantation_date ) ):"" }}</td>
                            <th data-field="price">raleo_date</th>
                            <td>{{ ($subRodal->raleo_date)?date( "d-m-Y", strtotime( $subRodal->raleo_date ) ):"" }}</td>
                            <th data-field="price">pruning_date</th>
                            <td>{{ ($subRodal->pruning_date)?date( "d-m-Y", strtotime( $subRodal->pruning_date ) ):"" }}</td>
                        </tr>
                        <tr>
                            <th data-field="name">supervisor</th>
                            <td>{{ $subRodal->supervisor }}</td>
                            <th data-field="price">forest_guard</th>
                            <td>{{ $subRodal->forest_guard }}</td>
                            <th data-field="price">specie</th>
                            <td>{{ $subRodal->specie }}</td>
                        </tr>
                        <tr>
                            <th data-field="name">pruning_density</th>
                            <td>{{ $subRodal->pruning_density }}</td>
                            <th data-field="name">edad actual</th>
                            <td>{{CalculaEdad( $subRodal->plantation_date) }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right">
                <a href="{{  route('subRodal.edit', $subRodal->id) }}" class="btn-floating btn-sm waves-effect waves-light orange">
                            <i class="material-icons">mode_edit</i>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
