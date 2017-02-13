@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
                    <div class="right">

            <a class="waves-effect  btn  green green-text text-lighten-5 tooltipped" data-position="bottom" data-delay="0" data-tooltip="Nuevo" onclick="window.location='{{ route('FormGenerator.create') }}'" {{ ((findPermission(11)))? "": "disabled" }}>@lang('buttons.create')</a>
        </div>
    </div>
    <div class="row text-capitalize">
        <div class="panel panel-default">
            <div class="panel-heading text-center"> @lang('alerts.custom.forms')</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
<div class="row table-responsive">
        <table class="table table-condensed table-hover highlight ">
            <thead>
                <tr>
                    <th data-field="price">No.</th>
                    <th data-field="id">@lang('alerts.custom.name')</th>
                    <th data-field="name">@lang('alerts.custom.description')</th>
                    <th data-field="name">@lang('alerts.custom.userCreator')</th>
                    <th data-field="name">@lang('alerts.custom.userModifier')</th>
                    <th data-field="name">@lang('alerts.custom.actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($forms as $form)
                <tr class="{{($form->state)?:'grey'}}">
                    <td>{{ $form->id }}</td>
                    <td>{{ $form->name }}</td>
                    <td>{{ $form->description }}</td>
                    <td>{{ userName( $form->userCreator_id) }}</td>
                    <td>{{ userName( $form->userModifier_id) }}</td>
                    <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['FormGenerator.destroy', $form->id]]) }}
                        <a href="{{  route('FormGenerator.show', $form->id) }}" class="btn-floating btn-sm waves-effect waves-light blue" target="_blank" {{ ((findPermission(10))||(currentUser()->id== $form->userCreator_id))? "": "disabled" }}>
                            <i class="material-icons">info</i>
                        </a>
                        <a href="{{  route('FormGenerator.edit', $form->id) }}" class="btn-floating btn-sm waves-effect waves-light orange" {{ ((findPermission(12))||(currentUser()->id== $form->userCreator_id))? "": "disabled" }}>
                            <i class="material-icons">mode_edit</i>
                        </a>
                    @if((findPermission(13))||(currentUser()->id== $form->userCreator_id))
                        @if($form->state)
                        {!! Form::button('<i class="material-icons">thumb_down</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light red', 'type' =>'sumbit', 'name'=>'delete_'.$form->id, 'id'=>'delete_'.$form->id]) !!}
                        {{ Form::close() }}
                        @else
                        {!! Form::button('<i class="material-icons">thumb_up</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light green', 'type' =>'sumbit', 'name'=>'delete_'.$form->id, 'id'=>'delete_'.$form->id]) !!}
                        {{ Form::close() }}
                        @endif
                    @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{ $forms->links() }}
        </div>
    </div>
                 {{--    {!! Form::open() !!}
<div class="row">
            @foreach ($forms as $key => $value)

            @endforeach

</div>
                        {!! Field::text('name') !!}
                        {!! Field::email('email') !!}
                        {!! Field::password('password') !!}
                        {!! Field::password('password_confirmation') !!}
                        {!! Form::button(trans('buttons.generate'), ['class' => 'btn teal white-text waves-effect', 'type' =>'submit']) !!}

                    {!! Form::close() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
