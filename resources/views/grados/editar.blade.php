@extends('layout')

@section('header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
           <h4> Grados
        <small>• Editar</small>
        </h4>
    </ol>

  </nav>

@stop

@section('content')
<section class="content">
    <form method="POST" action="{{route('grado.update', $grado)}}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Editar Grado</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group {{$errors->has('sigla') ? 'has-error' :''}}">
                            <label for="apellido">SIGLA</label>
                            <input name = "sigla" 
                                  type="imput" 
                                  class="form-control" 
                                  id="apellido" 
                                  placeholder="..."
                                  value="{{$grado->sigla}}">
                            {!! $errors->first('sigla','<span class=error style=color:red>:message</span>')!!}
                        </div>

                        <div class="form-group {{$errors->has('nombre') ? 'has-error' : ''}} ">
                            <label for="nombre">Nombre</label>
                            <input name = "nombre" 
                                  type="imput" 
                                  class="form-control" 
                                  id="nombre" 
                                  placeholder="..." 
                                  value="{{old('nombre',$grado->nombre)}}">
                            <!--- Muestro los errores de validacion.-->
                            {!! $errors->first('nombre','<span class=error style=color:red>:message</span>')!!}
                        </div>

                        <div class="form-group">
                            <label for="fuerza">Fuerza</label>
                            <select name="fuerza_id" 
                                    class="form-control select2" 
                                    style="width: 100%;" 
                                    id="fuerza_id">
                              <option value="{{$gradoFuerza->id}}"> Seleccione una Fuerza</option>
                                  @foreach ($fuerzas as $fuerza)
                                  <option value="{{$fuerza->id}}"
                                      {{old('fuerza_id', $grado->fuerza_id) == $fuerza->id ? 'selected' : ''}}>
                                      {{$fuerza->nombre}}</option>
                                  @endforeach
                            </select> 
                          </div>
                        
                    </div>

                    <div class="card-footer">
                        <div class="col-md-4" style="float: left;">
                        <button type="submit" class="btn btn-success btn-block">Guardar</button>
                        </div>
                        <div class="col-md-4" style="float: right;">
                        <a href="{{route('grado.index')}}"  class="btn btn-block btn-outline-primary">Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </form>
</section>
@stop


@push('styles')
<!--ESTILOS PARA CALENDARIO daterange picker -->
<link rel="stylesheet" href="/adminLTE/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="/adminLTE/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/adminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminLTE/css/adminlte.min.css">
@endpush
@push('scripts')
<!-- INICIO TODO ESTO PARA CALENDARIO -->
<!-- date-range-picker -->
<script src="/adminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="/adminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="/adminLTE/plugins/moment/moment.min.js"></script>
<script src="/adminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
 $(function () {
   //Initialize Select2 Elements
   $('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
    
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })

  </script>
@endpush
