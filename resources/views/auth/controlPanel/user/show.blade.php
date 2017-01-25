@extends('layouts.app') @section('content')
<div class="container">
    <div class="well col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-sm-offset-9">
                <a class="waves-effect  btn  green green-text text-lighten-5" href="{{  route('user.index') }}">@lang('buttons.back')</a>
            </div>
        </div>
        <div class="row ">
            <table class="table table-condensed table-hover highlight responsive-table">
                <thead>
                    <tr>
                        <th data-field="price">No.</th>
                        <th data-field="id">Name</th>
                        <th data-field="name">Email</th>
                        <th data-field="name">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="{{($user->state)?:'grey'}}">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) }}

                            <a href="{{ $user->id }}/edit" class="btn-floating btn-sm waves-effect waves-light orange">
                                <i class="material-icons">mode_edit</i>
                            </a>
                            @if($user->state)
                        {!! Form::button('<i class="material-icons">thumb_down</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light red', 'type' =>'sumbit', 'name'=>'delete_'.$user->id, 'id'=>'delete_'.$user->id]) !!}
                        {{ Form::close() }}
                        @else
                        {!! Form::button('<i class="material-icons">thumb_up</i>', ['class' => 'btn-floating btn-sm waves-effect waves-light green', 'type' =>'sumbit', 'name'=>'delete_'.$user->id, 'id'=>'delete_'.$user->id]) !!}
                        {{ Form::close() }}
                        @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
            </div>
        </div>
        @lang('validation.attributes.permission')
        <div class="row ">
            <table class="table table-condensed table-hover highlight ">
                <thead>
                    <tr>
                        <th data-field="price">No.</th>
                        <th data-field="id">Menu</th>
                        <th data-field="name">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{findMenuName( $permission->menu_id) }}</td>
                        <td>
                            <!-- Switch -->
                            <div class="switch" id="permission_{{ $permission->id }}">
                                <label>
                                    Off
                                    <input name="permission_{{ $permission->id }}"
                                    {{ (auth()->user()->id!=$permission->user_id)?:'disabled ' }}
                                    type="checkbox" {{ ( $permission->state==0)?:'checked' }} onclick=" $('#carga').load('{{ route('permission.edit',$permission->id)}}'); ">
                                    <span class="lever"></span> On
                                </label>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="carga"></div>
@endsection
