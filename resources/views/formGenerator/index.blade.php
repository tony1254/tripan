@extends('layouts.app') @section('content')
<div class="container">
    <div class="row text-capitalize">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Boleta General de Inventarios ###</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">

                    {!! Form::open() !!}
<div class="row">

            @foreach ($headerPlants as $key => $value)
<div class="col-sm-1">
            {{$value->name  }}
              <!-- Switch -->
            <div class="switch" id="{{ $value->id }}">
                <label>

                    <input name="{{ $value->id }}"
                    type="checkbox" onclick=" ">
                    <span class="lever"></span>
                </label>
            </div>

</div>
            @endforeach

</div>
                      {{--   {!! Field::text('name') !!}
                        {!! Field::email('email') !!}
                        {!! Field::password('password') !!}
                        {!! Field::password('password_confirmation') !!} --}}
                        {!! Form::button(trans('buttons.generate'), ['class' => 'btn teal white-text waves-effect', 'type' =>'sumbit']) !!}

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
