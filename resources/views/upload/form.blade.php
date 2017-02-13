@extends('layouts.app')
@section('css')
    <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
@endsection

@section('formOpen')
{!! Form::open(['route'=> 'file.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => ' cyan lighten-5  dropzone well']) !!}

@endsection
@section('afterUpload'){{ asset('/file/create')}}@endsection
@section('content')
@if(isset($error))
<div class="alert alert-danger">
<b>
    Error:
</b>
{{$error[0]}}
</div>
@endif

    <div class="container">
        <div class="row"    >
            <div class="panel panel-primary">
                <div class="panel-heading indigo accent-2">
                    Subir Archivos
                </div>
                <div class="panel-body">
                <div class="row text-center">

<div class="preloader-wrapper big active " id="loading">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
                </div>
                    @yield('formOpen')
                    <div class="dz-message " style="height:200;">
                       <h4>
                            @lang('validation.attributes.dropzone')
                       </h4>
                    </div>
                    <div class="dropzone-previews">

                    </div>

<dir class="row">
<div class="col-md-3 col-md-offset-9">

                    <button type="submit" class="waves-effect waves-light btn  green green-text text-lighten-5" id="submit">
                    <span class="glyphicon glyphicon-floppy-disk"></span>
                    Grabar</button>
</div>
</dir>
                    {!! Form::close() !!}
@yield('suggestedFormat')
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    {!! Html::script('js/dropzone.js'); !!}

    <script>
    $(document).ready(
        function() {
                    $('#loading').fadeOut();

             console.log( "document loaded file script" );
//alert("file uploaded");
}
        );
        Dropzone.options.myDropzone = {
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,//MB
            maxFiles: 2,
            acceptedFiles: ".xlx,.xlsx,.csv",



            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;

                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                this.on("addedfile", function(file) {
                    // alert("file uploaded");

                });

                this.on("complete", function(file) {
                    var _this = this;
                      $(file.previewElement).fadeOut(2000).promise().done(function() {


                    myDropzone.removeFile(file);
                    $('#my-dropzone').fadeOut();
                    $('#loading').fadeIn();
                    window.location.href = "@yield('afterUpload')";
                    });
                });

                this.on("success",
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>

@endsection