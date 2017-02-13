@extends('layouts.app') @section('content')
<div class="container">

<div class="well col-md-10 col-md-offset-1">
    <div class="row">
          <div class="right ">
            <button class="waves-effect  btn  green green-text text-lighten-5" onclick="window.location='{{ route('register') }}'">@lang('buttons.create')</button>
        </div>
    </div>
    <div class="row table-responsive">
        <table class="table table-condensed table-hover highlight ">
            <thead>
                <tr>
                    <th data-field="price">No.</th>
                    <th data-field="id">Nombres</th>
                    <th data-field="name">Email</th>
                    <th data-field="name">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="{{($user->state)?:'grey'}}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) }}
                        <a href="{{  route('user.show', $user->id) }}" class="btn-floating btn-sm waves-effect waves-light blue">
                            <i class="material-icons">info</i>
                        </a>
                        <a href="{{  route('user.edit', $user->id) }}" class="btn-floating btn-sm waves-effect waves-light orange">
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
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{ $users->links() }}
        </div>
    </div>
</div>
</div>
@endsection
