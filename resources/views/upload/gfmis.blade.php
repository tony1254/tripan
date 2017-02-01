@extends('upload.form')
@section('formOpen')
{!! Form::open(['route'=> 'upload.GFMIS.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => ' cyan lighten-5  dropzone well']) !!}

@endsection
@section('afterUpload'){{ asset('/subir/GFMIS/create')}}@endsection