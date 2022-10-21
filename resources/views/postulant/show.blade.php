@extends('layouts.plantillabase2')

@section('template_title')
   
@endsection

@section('content')<br>
@user
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Postulante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('postulants.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id:</strong>
                            {{ $postulant->id }}
                        </div>
                        <div class="form-group">
                            <strong>rut_post:</strong>
                            {{ $postulant->rut_post }}
                        </div>
                        <div class="form-group">
                            <strong>Termino Pe:</strong>
                            {{ $postulant->nombre_post }}
                        </div>
                        <div class="form-group">
                            <strong>periodo_id:</strong>
                            {{ $postulant->periodo_id }}
                        </div>
                        <div class="form-group">
                            <strong>users_id:</strong>
                            {{ $postulant->users_id }}
                        </div>
                        <div class="form-group">
                            <strong>curso_post:</strong>
                            {{ $postulant->curso_post }}
                        </div>
                        <div class="form-group">
                            <strong>apod_post:</strong>
                            {{ $postulant->apod_post }}
                        </div>
                        <div class="form-group">
                            <strong>correoapo_post:</strong>
                            {{ $postulant->correoapo_post }}
                        </div>
                        <div class="form-group">
                            <strong>descuento_post:</strong>
                            {{ $postulant->descuento_post }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @enduser

    @secre
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Postulante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('postulants.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        
                        <div class="form-group">
                            <strong>Rut :</strong>
                            {{ $postulant->rut_post }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre :</strong>
                            {{ $postulant->nombre_post }}
                        </div>
                        
                        
                        <div class="form-group">
                            <strong>Curso:</strong>
                            {{ $postulant->curso_post }}
                        </div>
                        <div class="form-group">
                            <strong>Apoderado :</strong>
                            {{ $postulant->apod_post }}
                        </div>
                        <div class="form-group">
                            <strong>Correo Apoderado:</strong>
                            {{ $postulant->correoapo_post }}
                        </div>
                        <div class="form-group">
                            <strong>Algun Otro descuento en el año :</strong>
                            {{ $postulant->descuento_post }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsecre
    @beca

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
                            <a class="btn btn-primary" href="{{ route('postulants.index') }}"> Atras</a>
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
                                        <th>Periodo</th>
										
										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postulants as $postulant)
                                        <tr>
                                            
                                            
											<td>{{ $postulant->rut_post }}</td>
											<td>{{ $postulant->nombre_post }}</td>				
																						
											<td>{{ $postulant->curso_post }}</td>
											<td>{{ $postulant->apod_post }}</td>
                                            <td>{{ $postulant->ano_pe }}</td>
											
											

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
                                        
                                        
										<th>Nombre integrante</th>
										<th>Rut integrante</th>
										<th>Edad integrante</th>
										<th>Parentesco integrante</th>
										<th>Profesion integrante</th>
										<th>Ingresos integrante</th>
										<th>Documento</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                               
                                @foreach ($grupofs as $grupof)
                                 
                                        <tr>                                          
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
                <tr >
                                     
                  <td id="td" width="510"><font color="#AB0031"><center>  <a href="#" target="_new" id="alternar-respuesta-ej3"><b>+ Ver Gastos Declarados</b></a></center>
                    <div id="respuesta-ej3" style="display:none" >
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
                                                                                
										<th>Nombre gasto</th>
										<th>Monto gasto</th>
										<th>Observ </th>
										<th>Documento gasto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gastos as $gastoss)
                                        <tr>                                                                                      
											
											<td>{{ $gastoss->nombre_dg }}</td>
											<td>{{ number_format($gastoss->monto_dg , 0,3 ) }}</td>
											<td>{{ $gastoss->observ_dg }}</td>
											<td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($gastoss->documento_dg) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>

                                            
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
                    </font>  </td>              
                    
            </tr>
            </table>  
    </div>  
    
    </div>

<br>
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
 <br>                
</div>
</div>
</div>
</div>
</div>

<div class="container-fluid ">
        <div class="row ">
            <div class="col-sm-12 ">
                <div class="card shadow mt-4">
                    <div class="card-header ">
                        <div style="display: flex; justify-content: space-between; align-items: center; ">

                            <span id="card_title">
                                {{ __('Asignacion de Plan de descuento') }}
                            </span>

                            @php
                                $mensualidad=0;
                                $positivo=1; 
                                $descuento=0;
                                $resultado=0; 
                                $resultado2=0;                              
                                $numero2='';
                                $numero3='';
                                $resultado3=0;
                                $descuento2=0;
                            @endphp
                            @foreach ($postulants as $postulant) 
                                @php                                                                
                                $numero2=$postulant->montoanual;
                                $descuento=$postulant->monto_r;                               
                                $resultado2=($numero2 * $descuento / 100 -$numero2) *  -1 / 10                          
                                @endphp
                                @endforeach

                                @foreach ($postulants as $postulant) 
                                @php                                                                
                                $numero3=$postulant->montoanual;
                                $descuento2=$postulant->monto_r;                        
                                $resultado3=($numero3 * $descuento2 / 100 -$numero3) * -1
                                
                                @endphp
                                @endforeach

                                
                            <div class="float-right"> 
                            Valor anualidad con el descuento:&nbsp;<b>{{ number_format($resultado3 , 0,3 ) }}</b>&nbsp;&nbsp;&nbsp;&nbsp;Monto mensualidad con beca:&nbsp; &nbsp;<b>{{ number_format($resultado2 , 0,3 ) }}</b>                         
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
                                                                              
																												
										<th>Periodo</th>
                                        <th>Monto Anual</th>
										<th>Fecha de postulacion</th>
                                        <th>Estado</th>
                                        <th>Monto en %</th>

                                        <th>Justificación</th>
										
										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postulants as $postulant)
                                        <tr>                                    
																															
											<td>{{ $postulant->ano_pe }}</td>
                                            <td>{{ number_format($numero2 , 0,3 ) }}</td>
											<td>{{ $postulant->fecha_r }}</td>
                                            <td>{{ $postulant->estado_r }}</td>
                                            <td>{{ $postulant->monto_r }}</td>
                                            <td>{{ $postulant->comentario_r }}</td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-update-result-{{ $postulant->id }}">
                                                    Asignar Resolución
                                                    </button>
                                               
    
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    @include('postulant.modal-update-result')
                                </tbody>
                            </table>
                            
                        </div>
                        
                    </div>

                    
                </div>
                
            </div>
            </div>
            
            
            

                    
    @endbeca
@endsection