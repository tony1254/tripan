@extends('layouts.app')
@section('content')
<div class="well col-md-10 col-md-offset-1">
	<div class="row">
		<div class="col-sm-offset-10">
                   <button  class="waves-effect  btn  green green-text text-lighten-5" onclick="window.location='{{ route("home") }}'">@lang('buttons.create')</button>

		</div>
	</div>
	<div class="row">
		@foreach($permissions as $permission)
		<p>{{ $permission }}</p>
		@endforeach
	</div>
</div>
@endsection