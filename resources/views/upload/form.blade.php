@extends('layouts.app')
@section('css')
    <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
@endsection
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
                <div class="panel-heading">
                    Subir Archivos
                </div>
                <div class="panel-body">
                    {!! Form::open(['route'=> 'file.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                    <div class="dz-message" style="height:500;">
                        Arrastra tus arhivos aqui
                    </div>
                    <div class="dropzone-previews">

                    </div>

<dir class="row">
<div class="col-md-3 col-md-offset-9">

                    <button type="submit" class="btn btn-success btn-lg" id="submit">
                    <span class="glyphicon glyphicon-floppy-disk"></span>
                    Grabar</button>
</div>
</dir>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    {!! Html::script('js/dropzone.js'); !!}

    <script>
    $('document').ready(
        function() {
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
                    window.location.href = "{{ asset('/file/create')}}";
                    });
                });

                this.on("success",
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>

@endsection