@extends('layouts.plantillabase2')

@section('template_title')
    Postulant
@endsection



@section('content')<br>
@user (session('status'))
 @php
 $estado=0;
 @endphp
 @foreach ($result as $results) 
            @php                                            
            $estado=count($result);                              
            @endphp
 @endforeach
 @if($estado >= 1)
 <div class="container-fluid ">
        <div class="row ">
            <div class="col-sm-12 ">
                <div class="card shadow mt-4">
                    <div class="card-header ">
                        <div style="display: flex; justify-content: space-between; align-items: center; ">

                            <span id="card_title">
                                {{ __('Postulante') }}
                            </span>

                             
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="postulantes"class="table table-striped table-hover ">
                                <thead class="thead">
                                    <tr>
                                                                              
										<th>Rut Post</th>
										<th>Nombre </th>																	
										<th>Curso</th>
										<th>Apoderado</th>
                                        <th>Correo Apoderado</th>
                                        <th>Periodo</th>
										
										

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postulants as $postulant)
                                        <tr>                                          
											<td>{{ $postulant->rut_post }}</td>
											<td>{{ $postulant->nombre_post }}</td>																						
											<td>{{ $postulant->curso_post }}</td>
											<td>{{ $postulant->apod_post }}</td>
                                            <td>{{ $postulant->correoapo_post }}</td>
                                            <td>{{ $postulant->ano_pe }}</td>
                                            
                                        </tr>
                                        @include('postulant.modal-ingresar-documento')
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>

                    
                </div>
                
            </div>
            <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                        
                                    
 </td>
                    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
                    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                            <span id="card_title">
                            @php
                                $suma=0;
                                
                                $numero='';
                                $id='';
                            @endphp
                            @foreach ($grupofs as $grupof) 
                                @php
                                $id=$grupof->id;
                                $numero=count($grupofs);                                
                                $suma+=$grupof->ingresos_gf;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach


                                {{ __('Grupo Familiar ') }} &nbsp;&nbsp;&nbsp;&nbsp;Numero de Integrantes:  <b>{{ $numero }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total de ingresos:&nbsp;<b>{{ number_format($suma , 0,3 ) }}</b>
                            </span>

                             <div class="float-right">
                                
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success2'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                            
                        </div>
                    @endif
                    
                                     
                <table>
                <tr >                                       
                  <td id="td" width="245"><center><font color="#AB0031"><a class="contact_bt" href="#" id="alternar-respuesta-ej1" ><b>+ Ver Integrantes</b></a></center>
                    <div id="respuesta-ej1" style="display:none" >

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>                                        
                                        
                                        <th>Periodo</th>
										<th>Nombre integrante</th>
										<th>Rut integrante</th>
										<th>Edad integrante</th>
										<th>Parentesco integrante</th>
										<th>Profesion integrante</th>
										<th>Ingresos integrante</th>
										<th>Documento</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                @foreach ($grupofs as $grupof)
                                 
                                        <tr>                                          
                                            
                                            <td>{{ $grupof->periodo }}</td>
											<td>{{ $grupof->nombre_gf }}</td>
											<td>{{ $grupof->rut_gf }}</td>
											<td>{{ $grupof->edad_gf }}</td>
											<td>{{ $grupof->parentesco_gf }}</td>
											<td>{{ $grupof->profesion_gf }}</td>
                                            <td>{{ number_format($grupof->ingresos_gf , 0,3 ) }}</td>
                                            <td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($grupof->documento) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>
                                            
                                        </tr>
                                        @include('grupof.modal-update-grupof')
                                    @endforeach
                                    
                    
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    </div></td>   
                      <script type="text/javascript">
                        $(document).ready(function(){$('#alternar-respuesta-ej1').on('click',function(e){$('#respuesta-ej1').toggle('slow');e.preventDefault();
                        });
                        });
                      </script>
                    </font>  </td>
                    </tr>
                    </table>
                    
                    <div class="container-fluid">
                    
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                        @php
                                $suma=0;                                
                                $numero='';
                                $id='';                                
                            @endphp
                            @foreach ($gastos as $gasto) 
                                @php
                                $id=$gasto->id;                                
                                $numero=count($gastos);                                
                                $suma+=$gasto->monto_dg;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach

                                {{ __('Gasto declarados') }}&nbsp;&nbsp;&nbsp;&nbsp;Total de gastos declarados:&nbsp;&nbsp;<b>{{ number_format($suma , 0,3 ) }}</b>
                            </span>

                             <div class="float-right">                               
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success3'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                <table>
                <tr>                                     
                  <td id="td" width="510"><font color="#AB0031"><center>  <a href="#" target="_new" id="alternar-respuesta-ej3"><b>+ Ver Gastos Declarados</b></a></center>
                    <div id="respuesta-ej3" style="display:none" >
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>                                        
                                                                                
										<th>Nombre de gasto</th>
										<th>Monto</th>
										<th>Observacion</th>
										<th>Documento</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gastos as $gastoss)
                                        <tr>                                                                                      
											
											<td>{{ $gastoss->nombre_dg }}</td>
											<td>{{ number_format($gastoss->monto_dg , 0,3 ) }}</td>
											<td>{{ $gastoss->observ_dg }}</td>
											<td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($gastoss->documento_dg) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                        @include('postulant.modal-update-gasto')
                                    @endforeach                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
                            
    
    </div>
        
 </div>
    
    
                
            </div>    

            

        </div>      
    </div>    
 </div>
</div></td>  
                            <script type="text/javascript">
                      $(document).ready(function(){$('#alternar-respuesta-ej3').on('click',function(e){$('#respuesta-ej3').toggle('slow');e.preventDefault();
                      });
                      });
                    </script>
                    </font></td>                   
            </tr>
        </table>  
    </div>  
    
    </div>

<br><br>
<div class="container-fluid">                    
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            
                        @php
                                $suma=0;                                
                                $numero='0';
                                $id='0';                                
                            @endphp
                            @foreach ($documentos as $docu) 
                                @php
                                $id=$docu->id;                                
                                $numero=count($documentos);
                                
                                
                                @endphp
                                @endforeach

                                {{ __('Documentos en el Sistema') }}&nbsp;&nbsp;&nbsp;&nbsp;Numero de Documentos:&nbsp;&nbsp;<b>{{ $numero }}</b></b>
                            </span>

                             <div class="float-right">
                               
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success3'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                <table>
                <tr >
                                     
                  <td id="td" width="510"><font color="#AB0031"><center>  <a href="#" target="_new" id="alternar-respuesta-ej4"><b>+ Ver Documentos ya Subidos</b></a></center>
                    <div id="respuesta-ej4" style="display:none" >
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
                                        
										<th>Nombre del Documnto</th>                                        
										<th>Documnto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documentos as $docu)
                                        <tr>                                                                                      
											
                                            <td>{{ $docu->nombre_doc}}</td>
											
											<td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($docu->documento_doc) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>

                                            <td>
                                                
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
                            
    
    </div>
        
</div>
    
    
                
            </div>    

            

        </div>      
    </div>    
</div>
</div></td>  
                            <script type="text/javascript">
                      $(document).ready(function(){$('#alternar-respuesta-ej4').on('click',function(e){$('#respuesta-ej4').toggle('slow');e.preventDefault();
                      });
                      });
                    </script>
                    </font>  </td>              
                    
            </tr>
            </table>  
    </div>  
    </div>
</div>                    

                            @php
                                $id_post=0;
                                $id_periodo=0;
                            @endphp
                            @foreach ($gastos as $gasto)
                                @php
                                $id_post=$grupof->id_postulant ;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach
                                @foreach ($postulants as $postulant)
                                @php
                                $id_periodo=$postulant->periodo_id;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach

                                  
                                 
                               
                                    
                                    

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 ">                    
              <div class="card ">                
                
            </div><br><center>
            <form action="{{ route('results.store') }}" method="POST" role="form" enctype="multipart/form-data">            
             @csrf
            
            <div class="modal-group">
                     
                     <input type="hidden" name="idpostulantr" class="form-control" id="idpostulantr" value="{{ $id_post }}" >
            </div> 
            <div class="modal-group">
                     
                     <input type="hidden" name="idperiod" class="form-control" id="idperiod" value="{{ $id_periodo }}" >
            </div> 
            <div class="modal-group">
                     
                     <input type="hidden" name="fecha_r" class="form-control" id="fecha_r" value="{{ $date2 }}" >
            </div>
            <div class="modal-group">
                     
                     <input type="hidden" name="estado_r" class="form-control" id="estado_r" value="Postulando" >
            </div> 
            <div class="modal-group">
                     
                     <input type="hidden" name="monto_r" class="form-control" id="monto_r" value="0" >
            </div> 
            <div class="modal-group">
                     
                     <input type="hidden" name="comentario_r" class="form-control" id="comentario_r" value="..." >
            </div>
             @csrf            
            <button type="submit" class="btn btn-danger btn-block" title="Usted ya a postulado no puede realizar cambios " disabled="disabled"><i class="fa fa-user mr-3"></i> Postular</button>
           </form></center>
            <br>  
            </div>
            
 @else
                            @php
                                $inicio='0';
                                $termino='0';
                                $date='0';
                            @endphp
                             @foreach ($postulants as $postulant)
                                @php                         
                                
                                $termino=date('Ymd', strtotime($postulant->termino_Pe));                                
                                $inicio=date('Ymd', strtotime($postulant->inicio_pe));
                                
                                @endphp
                                @endforeach 


  <div class="container-fluid ">
        <div class="row ">
            <div class="col-sm-12 ">
                <div class="card shadow mt-4">
                    <div class="card-header ">
                        <div style="display: flex; justify-content: space-between; align-items: center; ">

                            <span id="card_title">
                                {{ __('Postulante') }}
                            </span>

                             <div class="float-right">
                             @if ($date3 >= $inicio and $date3 <= $termino)
                                <a href="{{ route('postulants.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                                @else
                                <a href="{{ route('postulants.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                                @endif
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="postulantes"class="table table-striped table-hover ">
                                <thead class="thead">
                                    <tr>                                                                              
										<th>Rut Post</th>
										<th>Nombre </th>																			
										<th>Curso</th>
										<th>Apoderado</th>	                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postulants as $postulant)
                                        <tr>                      
                                            
											<td>{{ $postulant->rut_post }}</td>
											<td>{{ $postulant->nombre_post }}</td>																						
											<td>{{ $postulant->curso_post }}</td>
											<td>{{ $postulant->apod_post }}</td>
											
											@if ($date3 >= $inicio and $date3 <= $termino)

                                            <td>
                                                <form action="{{ route('postulants.destroy',$postulant->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('postulants.show',$postulant->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('postulants.edit',$postulant->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  class="btn btn-danger btn-sm "><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    
                                                    <a class="btn btn-sm btn-info" href="{{ route('gf.create',$postulant->id) }}" ><i class="fa fa-fw fa-edit"></i> Agregar Grupo Familiar</a>
                                                    <a class="btn btn-sm btn-info" href="{{ route('gasto.create',$postulant->id) }}" ><i class="fa fa-fw fa-edit"></i> Agregar Gastos </a>
                                                    
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-ingresar-documento-{{ $postulant->id }}">
                                                    <i class="fa fa-fw fa-edit"></i>Agregar Documentos
                                                    </button>
                                                </form>

                                                @else

                                                @endif
                                               
                                                   
                                                
                                               
    
                                            </td>
                                        </tr>
                                        @include('postulant.modal-ingresar-documento')
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>

                    
                </div>
                
            </div>
            <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                        
                                    
 </td>
                    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
                    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                            <span id="card_title">
                            @php
                                $suma=0;
                                
                                $numero='';
                                $id='';
                            @endphp
                            @foreach ($grupofs as $grupof) 
                                @php
                                $id=$grupof->id;
                                $numero=count($grupofs);                                
                                $suma+=$grupof->ingresos_gf;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach


                                {{ __('Grupo Familiar ') }} &nbsp;&nbsp;&nbsp;&nbsp;Numero de Integrantes:  <b>{{ $numero }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total de ingresos:&nbsp;<b>{{ number_format($suma , 0,3 ) }}</b>
                            </span>

                             <div class="float-right">
                                
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success2'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                                     
                <table>
                <tr >                                       
                  <td id="td" width="245"><center><font color="#AB0031"><a class="contact_bt" href="#" id="alternar-respuesta-ej1" ><b>+ Ver Integrantes</b></a></center>
                    <div id="respuesta-ej1" style="display:none" >

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>                                        
                                        
                                        <th>Periodo</th>
										<th>Nombre Gf</th>
										<th>Rut Gf</th>
										<th>Edad Gf</th>
										<th>Parentesco Gf</th>
										<th>Profesion Gf</th>
										<th>Ingresos Gf</th>
										<th>Documento</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                               
                                @foreach ($grupofs as $grupof)
                                 
                                        <tr>                                 
                                            
                                            <td>{{ $grupof->periodo }}</td>
											<td>{{ $grupof->nombre_gf }}</td>
											<td>{{ $grupof->rut_gf }}</td>
											<td>{{ $grupof->edad_gf }}</td>
											<td>{{ $grupof->parentesco_gf }}</td>
											<td>{{ $grupof->profesion_gf }}</td>
                                            <td>{{ number_format($grupof->ingresos_gf , 0,3 ) }}</td>

                                            
                                            <td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($grupof->documento) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>
                                            @if ($date3 >= $inicio and $date3 <= $termino)
                                            <td>
                                                <form action="{{ route('grupofs.destroy',$grupof->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('grupofs.show',$grupof->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    @csrf
                                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-update-grupof-{{ $grupof->id }}">
                                                    Editar
                                                    </button>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                                @else
                                                @endif
                                            </td>
                                        </tr>
                                        @include('grupof.modal-update-grupof')
                                    @endforeach
                                    
                    
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    </div></td>   
                      <script type="text/javascript">
                        $(document).ready(function(){$('#alternar-respuesta-ej1').on('click',function(e){$('#respuesta-ej1').toggle('slow');e.preventDefault();
                        });
                        });
                      </script>
                    </font>  </td>
                    </tr>
                    </table>
                    
                    <div class="container-fluid">
                    
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                        @php
                                $suma=0;                                
                                $numero='';
                                $id='';                                
                            @endphp
                            @foreach ($gastos as $gasto) 
                                @php
                                $id=$gasto->id;                                
                                $numero=count($gastos);                                
                                $suma+=$gasto->monto_dg;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach

                                {{ __('Gasto declarados') }}&nbsp;&nbsp;&nbsp;&nbsp;Total de gastos declarados:&nbsp;&nbsp;<b>{{ number_format($suma , 0,3 ) }}</b>
                            </span>

                             <div class="float-right">                               
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success3'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                <table>
                <tr>                                     
                  <td id="td" width="510"><font color="#AB0031"><center>  <a href="#" target="_new" id="alternar-respuesta-ej3"><b>+ Ver Gastos Declarados</b></a></center>
                    <div id="respuesta-ej3" style="display:none" >
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>                                        
                                                                                
										<th>Nombre de gasto</th>
										<th>Monto </th>
										<th>Observ </th>
										<th>Documento </th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gastos as $gastoss)
                                        <tr>                                                                                      
											
											<td>{{ $gastoss->nombre_dg }}</td>
											<td>{{ number_format($gastoss->monto_dg , 0,3 ) }}</td>
											<td>{{ $gastoss->observ_dg }}</td>
											<td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($gastoss->documento_dg) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>
                                            @if ($date3 >= $inicio and $date3 <= $termino)
                                            <td>
                                                <form action="{{ route('gastos.destroy',$gasto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('gastos.show',$gastoss->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>                                                    
                                                    @csrf
                                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-update-gasto-{{ $gastoss->id }}">
                                                    Editar
                                                    </button>                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                            @else
                                            @endif
                                        </tr>
                                        @include('postulant.modal-update-gasto')
                                    @endforeach                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
                            
    
    </div>
        
</div>
    
    
                
            </div>    

            

        </div>      
    </div>    
</div>
</div></td>  
                            <script type="text/javascript">
                      $(document).ready(function(){$('#alternar-respuesta-ej3').on('click',function(e){$('#respuesta-ej3').toggle('slow');e.preventDefault();
                      });
                      });
                    </script>
                    </font></td>                   
            </tr>
        </table>  
    </div>  
    
    </div>

<br><br>
<div class="container-fluid">                    
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            
                        @php
                                $suma=0;                                
                                $numero='0';
                                $id='0';                                
                            @endphp
                            @foreach ($documentos as $docu) 
                                @php
                                $id=$docu->id;                                
                                $numero=count($documentos);
                                
                                
                                @endphp
                                @endforeach

                                {{ __('Documentos en el Sistema') }}&nbsp;&nbsp;&nbsp;&nbsp;Numero de Documentos:&nbsp;&nbsp;<b>{{ $numero }}</b></b>
                            </span>

                             <div class="float-right">
                               
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success3'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                <table>
                <tr >
                                     
                  <td id="td" width="510"><font color="#AB0031"><center>  <a href="#" target="_new" id="alternar-respuesta-ej4"><b>+ Ver Documentos ya Subidos</b></a></center>
                    <div id="respuesta-ej4" style="display:none" >
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
                                        
										<th>Nombre del Documnto</th>
                                        <th>Documnto</th>                                         
										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documentos as $docu)
                                        <tr>                                                                                      
											
                                            <td>{{ $docu->nombre_doc}}</td>
											
											<td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($docu->documento_doc) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>

                                            <td>
                                            @if ($date3 >= $inicio and $date3 <= $termino)
                                                <form action="{{ route('documents.destroy',$docu->id) }}" method="POST">
                                                                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                            @else
                                            @endif
                                        </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
                            
    
    </div>
        
</div>
    
    
                
            </div>    

            

        </div>      
    </div>    
</div>
</div></td>  
                            <script type="text/javascript">
                      $(document).ready(function(){$('#alternar-respuesta-ej4').on('click',function(e){$('#respuesta-ej4').toggle('slow');e.preventDefault();
                      });
                      });
                    </script>
                    </font>  </td>              
                    
            </tr>
            </table>  
    </div>  
    </div>
</div>                    

                            @php
                                $id_post=0;
                                $id_periodo=0;
                            @endphp
                            @foreach ($gastos as $gasto)
                                @php
                                $id_post=$grupof->id_postulant ;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach
                                @foreach ($postulants as $postulant)
                                @php
                                $id_periodo=$postulant->periodo_id;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach

                               

                               
                                
                                @if ($date3 >= $inicio and $date3 <= $termino)
                                                    

                             <div class="container-fluid">
                                 <div class="row justify-content-center">
                                    <div class="col-md-8 ">                    
                                    <div class="card ">                
                                    </div><br><center>
                                     <form action="{{ route('results.store') }}" method="POST" role="form" enctype="multipart/form-data">            
                                     @csrf            
                                     <div class="modal-group">
                                    
                                    <input type="hidden" name="idpostulantr" class="form-control" id="idpostulantr" value="{{ $id_post }}" >
                                    </div> 
                                 <div class="modal-group">
                                    
                                     <input type="hidden" name="idperiod" class="form-control" id="idperiod" value="{{ $id_periodo }}" >
                                 </div> 
                                    <div class="modal-group">
                                    
                                    <input type="hidden" name="fecha_r" class="form-control" id="fecha_r" value="{{ $date2 }}" >
                                     </div>
                                     <div class="modal-group">
                                     
                                     <input type="hidden" name="estado_r" class="form-control" id="estado_r" value="Postulando" >
                                 </div> 
                                <div class="modal-group">
                                      
                                       <input type="hidden" name="monto_r" class="form-control" id="monto_r" value="0" >
                                 </div> 
                                     <div class="modal-group">
                                
                                 <input type="hidden" name="comentario_r" class="form-control" id="comentario_r" value="..." >
                                 </div>
                                     @csrf            
                                <button type="submit" class="btn btn-danger btn-block" title="Al postular no se podra modificar los datos ya ingresados "><i class="fa fa-user mr-3"></i> Postular</button>
                                </form></center>
                                 <br>  
                                </div>
                                
                                 @else
                                 <br><br>
                                    <center><b> Proceso de postulacion Cerrrado</b> </center>   
                                    <br><br>                  
                                 @endif
                                 
                             
 @endif     
@enduser

@beca (session('status'))                            
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-sm-12 ">
                <div class="card shadow mt-4">
                    <div class="card-header ">
                        <div style="display: flex; justify-content: space-between; align-items: center; ">

                            <span id="card_title">
                                {{ __('Postulantes') }}
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <form class="form-inline my-1 my-lg-0 float-right">                                 
                                    <select name="anope" class="form-control"  placeholder="Search" aria-label="Search" value="{{ $anope }}">
                                    @foreach ($periodo as $periodos)                                                                               
                                    <option >{{ $periodos->ano_pe }}</option>
                                    @endforeach                                                                                                         
                                    </select>&nbsp;
                                                                                                                                                      
                                    <input name="buscarpor2"  class="form-control mr-sm-1" type="search" placeholder="Rut" aria-label="Search" value="{{ $buscarpor2 }}">  &nbsp; 
                                    <input name="buscarpor"  class="form-control mr-sm-1" type="search" placeholder="Nombre" aria-label="Search" value="{{ $buscarpor }}">  &nbsp;                                              
                                    <button type="submit" class="btn btn-success my-1 my-sm-0"> Buscar</button>                                                  
                                </form>
                            </span>

                             
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="postulantes"class="table table-striped table-hover ">
                                <thead class="thead">
                                    <tr>
                                                                        
										<th>Rut Post</th>
										<th>Nombre </th>																		
										<th>Curso</th>
										<th>Apoderado</th>
                                        <th>Email Apoderado</th>
                                        <th>Periodo</th>
                                        <th>Fecha de Postulacion</th> 
                                        <th>Estado de la Postulacion</th>                                 
                                    </tr>
                                </thead>
                                <tbody>
                                     @php
                                     $estado=0;
                                     $estado2='Postulando';                                
                                     @endphp
                                    @foreach ($postulantsadmin as $postulantss)
                                    @php
                                     $estado=$postulantss->estado_r ;
                                     @endphp
                                     
                                        <tr>  
                                        
											<td>{{ $postulantss->rut_post }}</td>
											<td>{{ $postulantss->nombre_post }}</td>																					
											<td>{{ $postulantss->curso_post }}</td>
											<td>{{ $postulantss->apod_post }}</td>
                                            <td><a class="btn btn-sm btn-info" href="mailto:{{ $postulantss->correoapo_post }}" title="Enviar un correo">{{ $postulantss->correoapo_post }}</td>
                                            <td>{{ $postulantss->ano_pe }}</td>
                                            <td>{{ $postulantss->fecha_r }}</td>
                                            @if ($estado == $estado2 )
                                            <td><a class="btn btn-sm btn-danger " href="#">{{ $postulantss->estado_r }}</a></td>
                                            @else
                                            <td><a class="btn btn-sm btn-success " href="#">{{ $postulantss->estado_r }}</a></td>
                                            @endif
                                            <td>
                                                <form action="{{ route('beca.index',$postulantss->id) }}" method="POST">
                                                
                                                    <a class="btn btn-sm btn-primary " href="{{ route('beca.index',$postulantss->id) }}"><i class="fa fa-fw fa-eye"></i> Asignar Beca</a>
                                                    
                                                    @csrf
                                                   
                                                
                                                
                                                   
                                                </form>
                                               
    
                                            </td>
                                        </tr>
                                        
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>

                    
                </div>
                
            </div>
        

 @endbeca

@admin (session('status'))

    <div class="container-fluid ">
        <div class="row ">
            <div class="col-sm-12 ">
                <div class="card shadow mt-4">
                    <div class="card-header ">
                        <div style="display: flex; justify-content: space-between; align-items: center; ">

                            <span id="card_title">
                                {{ __('Postulante Admin') }}
                                @php   
                                                                         
                                $estado=0;                           
                                @endphp
                                @foreach ($postulantsadmin2 as $postulant) 
                                @php                                            
                                $estado=count($postulantsadmin2);                              
                                @endphp
                                @endforeach
                                    @if($estado >= 1)
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <form class="form-inline my-1 my-lg-0 float-right">                                 
                                    <select name="anope" class="form-control"  placeholder="Search" aria-label="Search" value="{{ $anope }}">
                                   
                                    @foreach ($periodo as $periodos)                                                                                                                   
                                    <option >{{ $periodos->ano_pe }}</option>                                    
                                    @endforeach                                                                                                         
                                    </select>&nbsp;
                                                                                                                                                      
                                    <input name="buscarpor2"  class="form-control mr-sm-1" type="search" placeholder="Rut" aria-label="Search" value="{{ $buscarpor2 }}">  &nbsp; 
                                    <input name="buscarpor"  class="form-control mr-sm-1" type="search" placeholder="Nombre" aria-label="Search" value="{{ $buscarpor }}">  &nbsp;                                              
                                    <button type="submit" class="btn btn-success my-1 my-sm-0"> Buscar</button>&nbsp;
                                    <a class="btn btn-danger my-1 my-sm-0" href="{{ route('postulanta.export',$anope) }}" ><i class="fa fa-fw fa-file"></i> EXPORTAR AÑO <b>{{ $anope }}</b> </a>                                                
                                </form>
                                @else
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <form class="form-inline my-1 my-lg-0 float-right">                                 
                                    <select name="anope" class="form-control"  placeholder="Search" aria-label="Search" value="{{ $anope }}">
                                    @foreach ($periodo as $periodos)                                                                               
                                    <option >{{ $periodos->ano_pe }}</option>                                    
                                    @endforeach                                                                                                         
                                    </select>&nbsp;
                                                                                                                                                      
                                    <input name="buscarpor2"  class="form-control mr-sm-1" type="search" placeholder="Rut" aria-label="Search" value="{{ $buscarpor2 }}">  &nbsp; 
                                    <input name="buscarpor"  class="form-control mr-sm-1" type="search" placeholder="Nombre" aria-label="Search" value="{{ $buscarpor }}">  &nbsp;                                              
                                    <button type="submit" class="btn btn-success my-1 my-sm-0"> Buscar</button>&nbsp;
                                                                                     
                                </form>
                                 @endif
                            </span>

                             <div class="float-right">
                                <a href="{{ route('postulants.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example"class="table table-striped table-hover ">
                                <thead class="thead">
                                    <tr>                                                                             
										<th>Rut Post</th>
										<th>Nombre </th>																		
										<th>Curso</th>
										<th>Apoderado</th>
                                        <th>Email Apoderado</th>
                                        <th>Periodo</th>                                                                               
                                    </tr>
                                </thead>
                                <tbody>
                               
                                    
                                    @foreach ($postulantsadmin as $postulant)
                                        <tr>                                          
											<td>{{ $postulant->rut_post }}</td>
											<td>{{ $postulant->nombre_post }}</td>																					
											<td>{{ $postulant->curso_post }}</td>
											<td>{{ $postulant->apod_post }}</td>
                                            <td><a class="btn btn-sm btn-info" href="mailto:{{ $postulant->correoapo_post }}" title="Enviar un correo">{{ $postulant->correoapo_post }}</td>
                                            <td>{{ $postulant->ano_pe }}</td>
                                            
                                            <td>
                                                <form action="{{ route('postulants.destroy',$postulant->id) }}" method="POST">
                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('postulants.edit',$postulant->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  class="btn btn-danger btn-sm "><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    
                                                    <a class="btn btn-sm btn-info" href="{{ route('gf.index',$postulant->id) }}" ><i class="fa fa-fw fa-eye"></i> Ver Grupo Familiar</a>
                                                    <a class="btn btn-sm btn-info" href="{{ route('gasto.index',$postulant->id) }}" ><i class="fa fa-fw fa-eye"></i> Ver Gastos Declarados </a>
                                                   
                                                </form>
                                                
                                                   
                                                </form>
                                               
    
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                               
                            
                            
                        </div>
                        
                    </div>

                    
                </div>
                
            </div>
            
@endadmin

@secre (session('status'))
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-sm-12 ">
                <div class="card shadow mt-4">
                    <div class="card-header ">
                        <div style="display: flex; justify-content: space-between; align-items: center; ">

                            <span id="card_title">
                                {{ __('Lista de Postulante ') }}
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <form class="form-inline my-1 my-lg-0 float-right">                                 
                                    <select name="anope" class="form-control"  placeholder="Search" aria-label="Search" value="{{ $anope }}">
                                    @foreach ($periodo as $periodos)                                                                               
                                    <option >{{ $periodos->ano_pe }}</option>
                                    @endforeach                                                                                                         
                                    </select>&nbsp;
                                                                                                                                                      
                                    <input name="buscarpor2"  class="form-control mr-sm-1" type="search" placeholder="Rut" aria-label="Search" value="{{ $buscarpor2 }}">  &nbsp; 
                                    <input name="buscarpor"  class="form-control mr-sm-1" type="search" placeholder="Nombre" aria-label="Search" value="{{ $buscarpor }}">  &nbsp;                                              
                                    <button type="submit" class="btn btn-success my-1 my-sm-0"> Buscar</button>                                                  
                                </form>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('postulants.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="postulantes"class="table table-striped table-hover ">
                                <thead class="thead">
                                    <tr>
                                                                              
										<th>Rut Post</th>
										<th>Nombre </th>																		
										<th>Curso</th>									
                                        <th>Periodo</th>
                                        <th>Apoderado</th>
                                        <th>Email Apoderado</th>
                                        <th>Estado</th>
										
										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach ($postulantsadmin as $postulant)
                                        <tr>
                                            
                                            
											<td>{{ $postulant->rut_post }}</td>
											<td>{{ $postulant->nombre_post }}</td>																				
											<td>{{ $postulant->curso_post }}</td>											
                                            <td>{{ $postulant->ano_pe }}</td>
                                            <td>{{ $postulant->apod_post }}</td>
                                            <td><a class="btn btn-sm btn-info" href="mailto:{{ $postulant->correoapo_post }}" title="Enviar un correo">{{ $postulant->correoapo_post }}</td>
                                            @if ($postulant->estado_r == "Finalizado" )                                            
                                            <td> <a class="btn btn-sm btn-success" href="{{ route('rs.index',$postulant->id) }}" ><i class="fa fa-fw fa-eye"></i>
                                            {{ $postulant->estado_r }}
                                            </a></td>
                                            @else
                                            <td><a class="btn btn-sm btn-danger " href="#">{{ $postulant->estado_r }}</a></td>
                                            @endif
											 

                                            <td>
                                                <form action="{{ route('postulants.destroy',$postulant->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('postulants.show',$postulant->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('postulants.edit',$postulant->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    
                                                    <a class="btn btn-sm btn-info" href="{{ route('gf.index',$postulant->id) }}" ><i class="fa fa-fw fa-eye"></i> Ver Grupo Fa.</a>
                                                    <a class="btn btn-sm btn-info" href="{{ route('gasto.index',$postulant->id) }}" ><i class="fa fa-fw fa-eye"></i> Ver Gastos </a>
                                                   
                                                </form>
                                                
                                                   
                                                </form>
                                               
    
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>

                    
                </div>
                
            </div>

@endsecre
@endsection
