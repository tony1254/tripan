@extends('layouts.app')
@section('content')
<div class="well col-md-10 col-md-offset-1">
	<div class="row">
		<div class="col-sm-offset-10">
                   <button type="submit" class="	waves-effect waves-light btn  green green-text text-lighten-5" id="submit">
                    <span class="glyphicon glyphicon-plus"></span>
                    Crear</button>

		</div>
	</div>
	<div class="row">
		@foreach($permissions as $permission)

		@endforeach
	</div>
</div>
@endsection