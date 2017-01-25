@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('validation.attributes.login')</div>
                <div class="panel-body">
                     {{-- {!! Form::open(['action'=>'HomeController@index']) !!} --}}
                    {!! Form::open() !!}

                        {!! Field::email('email') !!}
                        {!! Field::password('password') !!}
                        {!! Field::checkbox('remember') !!}
                        {!! Form::button(trans('validation.attributes.login'), ['class' => 'btn teal white-text waves-effect white-text btn btn-primary', 'type'=>'sumbit']) !!}

                        <a class="transparent blue-text  btn-link" href="{{ url('/password/reset') }}">
                                    @lang('validation.attributes.password_forget')
                                </a>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
