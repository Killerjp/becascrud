@extends('layouts.plantillabase2')

@section('Lista de Usuarios')
    User
@endsection

@section('content')
@secre (session('status'))

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mt-4">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                    
                                

                    
                        <span id="card_title">
                        @php
                            $suma=0;
                            $nombre2='';
                            $numero='';
                            $id='';
                        @endphp
                        @foreach ($grupofs as $grupof) 
                            @php
                            $id=$grupof->id;
                            $numero=count($grupofs);
                            $nombre2=$grupof->nombre_post;
                            $suma+=$grupof->ingresos_gf;//sumanos los valores, ahora solo fata mostrar dicho valor
                            @endphp
                            @endforeach


                            <b>POSTULANTE</b>
                        </span>
                        
                        
                    
                        
                         <div class="float-right">                         
                            &nbsp;&nbsp;
                            <a class="btn btn-primary btn-sm float-left" href="{{ route('postulants.index') }}"> Atras</a>
                          </div>
                    </div>
                </div>
                @if ($message = Session::get('success3'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table id="postulantes"class="table table-striped table-hover ">
                            <thead class="thead">
                                <tr>
                                                                          
                                    <th>Rut Post</th>
                                    <th>Nombre </th>                                                                          
                                    <th>Curso</th>
                                    <th>Apoderado</th>
                                    <th>Correo apoderado</th>
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
                <div class="card-body">
                    <div class="table-responsive">
                   <b> GRUPO FAMILIAR</b>
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
                                        

                                        
                                    </tr>
                                   
                                @endforeach
                                
                            </thead>
                            </tbody>
                        </table>
                        <b>GASTOS DECLARADOS</b>
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                               
                                <tr>                                        
                                    <th>Nombre Dg</th>
                                    <th>Monto Dg</th>
                                    <th>Observ Dg</th>
                                    <th>Documento Dg</th>                                       
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gastos as $gasto)
                                    <tr>                         
                                       
                                        
                                        <td>{{ $gasto->nombre_dg }}</td>
                                        <td>{{ number_format($gasto->monto_dg, 0,3 ) }}</td>
                                        <td>{{ $gasto->observ_dg }}</td>
                                        
                                        <td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($gasto->documento_dg) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>

                                        
                                    </tr>
                                   
                                @endforeach
                            </tbody>
                        </table>
                        @php
                                                       
                                $descuento=0;
                                $resultado=0; 
                                $resultado2=0;                              
                                $numero2='0';
                                $numero3='0';
                                $numero4='0';
                                $numero5='0';
                                $resultado3=0;
                                $descuento2=0;
                                $resultado4=0;
                                $resultado5=0;
                               

                            @endphp
                            @foreach ($result as $postulant) 
                                @php                                                                
                                $numero2=$postulant->montoanual;
                                $descuento=$postulant->monto_r;                               
                                $resultado2=($numero2 * $descuento / 100 -$numero2) *  -1 / 10                          
                                @endphp
                                @endforeach

                                @foreach ($result as $postulant) 
                                @php                                                                
                                $numero3=$postulant->montoanual;
                                $descuento2=$postulant->monto_r;                        
                                $resultado3=($numero3 * $descuento2 / 100 -$numero3) * -1
                                
                                @endphp
                                @endforeach

                                @foreach ($result as $postulant) 
                                @php                                                                
                                $numero4=$postulant->montoanual; 
                                $descuento2=$postulant->monto_r;                                                  
                                $resultado4=($numero4 * $descuento2 / 100 )
                                
                                @endphp
                                @endforeach

                                @foreach ($result as $postulant) 
                                @php                                                                
                                $numero5=$postulant->montoanual; 
                                $descuento2=$postulant->monto_r;                                                  
                                $resultado5=($numero5 * $descuento2 / 100 ) / 10
                                
                                @endphp
                                @endforeach
                            <b>RESOLUCION</b>
                        <table id="postulantes"class="table table-striped table-hover ">
                            <thead class="thead">
                           
                                <tr>                               
                                   																		
                                    <th>Periodo</th>
                                    <th>Monto Anual sin descuento</th>
                                    <th>Fecha de postulacion</th>
                                    <th>Estado</th>
                                    <th>Monto descuento</th>
                                                               
                                    

                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $results)
                                    <tr>                                    
                                        																				
                                        <td>{{ $results->ano_pe }}</td>
                                        <td>{{ number_format($numero2 , 0,3 ) }}</td>
                                        <td>{{ $results->fecha_r }}</td>
                                        <td>{{ $results->estado_r }}</td>
                                        <td>{{ $results->monto_r }} %</td>
                                        
                                        <td>
                                        
                                           

                                        </td>
                                    </tr>
                                    
                                @endforeach
                                @include('postulant.modal-update-result')
                            </tbody>
                        </table>

                        <div style="background-color:#1E8449;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ; float: center; height:100; width:100;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                               <a class="col-sm-5 text-light"   href="#">
                                
                                <table align="center"  >
                                <tr>                              
                                <td align="center" width="220"><font size="+1"><p><b><br>Monto descuento <br>Anual</b></p></font></td>                                 
                                <td align="center" width="220"><font size="+1"><p><b><br>Monto descuento<br> Mes</b></p></font></td>
                                <td align="center" width="220"><font size="+1"><p><b><br>% aprox.<br>Descuento</b></p></font> </td>                               
                                <td align="center" width="220"><font size="+1"><p><b><br>Valor colegiatura <br>anual a pagar</b></p></font> </td>
                                <td align="center" width="220"><font size="+1"><p><b><br>Monto a cancelar <br>cuota (1)</b></p></font> </td>
                                </tr>
                                @foreach ($postulants as $postulant)
                                <tr>                              
                                <td align="center"><font size="+1"><p><b>{{ number_format($resultado4 , 0,3 ) }}</b></p></font> </td>                                 
                                <td align="center"><font size="+1"><p><b>{{ number_format($resultado5 , 0,3 ) }}</b></p></font> </td>
                                <td align="center"><font size="+1"><p><b>{{ $results->monto_r }}&nbsp;%</b></p></font>  </td>                               
                                <td align="center"><font size="+1"><p><b>{{ number_format($resultado3 , 0,3 ) }}</b></p></font> </td>
                                <td align="center"><font size="+1"><p><b>{{ number_format($resultado2 , 0,3 ) }}</b></p></font> </td>
                                </tr>                                
                                
                                </table>
                                &nbsp;&nbsp;&nbsp;Cálculo considerando 10 cuotas.<hr>
                              <b>&nbsp;&nbsp;Justificación</b><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $results->comentario_r }}</p></a>
                              <br>@endforeach

                              

                              

                              
                                
                            </div><br>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsecre
@endsection
