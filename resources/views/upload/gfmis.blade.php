@section('title')Inportar GFMIS @endsection
@extends('upload.form')
 @section('afterUpload'){{ asset('/subir/GFMIS/create')}}@endsection
@section('formOpen')

{!! Form::open(['route'=> 'upload.GFMIS.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => ' cyan lighten-5 dropzone well']) !!} @endsection
@section('suggestedFormat')
<div class="panel panel-default ">
    <div class="panel-heading  indigo accent-1 ">
        <h3 class="panel-title">Columnas de Importacion


<a href="\content/formats/FormatGFMIS.xlsx" class=" waves-effect waves-light btn btn-flat indigo accent-3 white-text" ><i class="material-icons">file_download</i> Descargar </a>

        </h3>
    </div>

        <div class="table-responsive">
            <table class="table table-condensed table-streped table-bordered" id="a">
                <tr>
                    @foreach(headersGfmisArray() as $header)
                    <td>
                    {{   ($header==="orden") ? "".$header : "".$header }}
                    </td>
                    @endforeach
                </tr>
            </table>
        </div>

</div>
<input style="display:none" id="table" type="text" value="
@foreach(headersGfmisArray() as $header)
{{   ($header==="orden") ? "".$header."  " : "".$header."  " }}
@endforeach
">
<style type="text/css">
  .table-bordered>tbody>tr>td {
    border: 1px solid black;
      border-collapse: collapse;
  }
</style>
<script type="text/javascript">
  function copyToClipboard(elemento) {
  var $temp = $("<input>")
  $("body").append($temp);
  $temp.val($(elemento).val()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>
@endsection

