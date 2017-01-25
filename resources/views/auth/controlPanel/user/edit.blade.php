@extends('layouts.app') @section('content')
<div class="container">
<div class=" col-md-10 col-md-offset-1">
   <div class="row">
        <div class="col-sm-offset-9">
            <a class="waves-effect  btn  green green-text text-lighten-5" href="javascript:history.back()">@lang('buttons.back')</a>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('validation.attributes.user')</div>
                <div class="panel-body">
                    {{-- {{ var_dump($errors) }}  --}}
                    {{-- {!! Form::open(['action'=>'HomeController@index']) !!} --}} {!! Form::open(['action'=>['UserController@update',$user->id],'method' => 'put']) !!}
                        {!! Field::text('name',$user->name) !!}
                        {!! Field::email('email',$user->email) !!}
                        {!! Field::password('password') !!}
                        {!! Field::password('password_confirmation') !!}
                        {!! Form::button(trans('validation.attributes.save'), ['class' => 'btn teal white-text waves-effect', 'type' =>'sumbit' ]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
