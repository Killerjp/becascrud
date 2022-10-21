@extends('layouts.plantillabase2')

@section('content')<br>
                    
            
                    @secre (session('status'))
                    @php                                
                                $numero='0';                                
                            @endphp
                            @foreach ($postulantsregis2 as $postulantsregiss)
                                @php                                
                                $numero=count($postulantsregis2);                             
                                @endphp
                                @endforeach

                                @php                                
                                $numero2='0';                                
                            @endphp
                            @foreach ($postulantspost as $postulantsposts)
                                @php                                
                                $numero2=count($postulantspost);                             
                                @endphp
                                @endforeach
                            @php                                
                                $numero3='0';                                
                            @endphp
                            @foreach ($postulantsfin as $postulantsfins)
                                @php                                
                                $numero3=count($postulantsfin);                             
                                @endphp
                            @endforeach
                                
                                <div class="card shadow mt-4">
                            <div class="card-header">{{ __('Estadísticas de Postulación') }}</div>
                           <div class="card-body">               
                              @if (session('status'))
                               <div class="alert alert-success" role="alert">                        
                            {{ session('status') }}
                            </div>
                               @endif
                       
                            <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                               <a class="col-sm-3 text-light shadow mt-4" style="background-color:#00aae4;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="{{ route('postulantr.export') }}">
                                <div> <center>                               
                                <br>
                                <font size="+8"><b>{{ $numero }}</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 50px;" class="fa fa-users fa-x5" ></span>                                 
                                <font size="+2"> <p><b> Registrados</b> </p></font> </center>
                              </div></a>

                              <a class="col-sm-3 text-light shadow mt-4" style="background-color:#cc6600;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="{{ route('postulantp.export') }}">
                                <div> <center>                               
                                <br>
                                <font size="+8"><b>&nbsp;&nbsp;{{ $numero2 }}</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 50px;" class="fa fa-users fa-x5" ></span>                                 
                                <font size="+2"> <p><b> Postulando</b> </p></font> </center>
                              </div></a>


                              <a class="col-sm-3 text-light shadow mt-4" style="background-color:#1E8449;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="{{ route('postulantb.export') }}">
                                <div>  <center>                              
                                <br>
                                <font size="+8"><b>&nbsp;&nbsp;{{ $numero3 }}</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<span style="font-size: 50px;" class="fa fa-users fa-x5" ></span>                                 
                                <font size="+2"> <p><b>Resolución</b> </p></font> </center>
                              </div></a>                             

                            </div>                       
                        </div>
                     </div>
                     

                     <div class="card shadow mt-4">
                <div class="card-header">{{ __('Documentación Necesaria') }}</div>
                <div class="card-body">               
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">                        
                            {{ session('status') }}
                        </div>
                         @endif
                       
                            <div class="row">
                            <table align="center">
                                <tr>                              
                                <td align="center" width="300"><font size="+1"><p><b>DOCUMENTOS</b></p></font></td>                                 
                                <td align="center" width="300"><font size="+1"><p><b>DETALLES </b></p></font></td>                               
                                </tr>                                
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\Reglamento.pdf" target="_new"><i class="fa fa-fw fa-file"></i> REGLAMENTO PLAN DE DESCUENTOS</a></b></p></font> </td>                                 
                                <td align="center"><font size="+1" align="justify"><p><b>Reglamento y requisitos para postular al beneficio, es muy importante que se tenga conocimiento de esta información.</b></p></font> </td>                                
                                </tr> 
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\declaracionjurada.pdf" target="_new"><i class="fa fa-fw fa-file"></i> DECLARACIÓN JURADA NOTARIAL</a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Declaracion jurada notarial es para todos los postulantes al beneficio, debe ser subida al sistema en la pestaña postular</b></p></font> </td>                                
                                </tr>                                                                 
                                </table>  
                                <table align="center">
                                <tr>                              
                                <td align="center" width="300"><font size="+1"><p><b>DOCUMENTOS</b></p></font></td>                                 
                                <td align="center" width="300"><font size="+1"><p><b>DETALLES </b></p></font></td>                               
                                </tr>                              
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\certificado de residencia.pdf" target="_new"><i class="fa fa-fw fa-file"></i> CERTIFICADO DE RESIDENCIA</a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Solo para el padre o madre que no vive con el postulante se debe subir al sistema en la pestaña postular</b></p></font> </td>                                
                                </tr>
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\aporteeconomico de terceros.pdf" target="_new"><i class="fa fa-fw fa-file"></i> DECLARACIÓN NOTARIAL DE APORTE ECONÓMICOS DE TERCEROS </a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Recordar que esta declaración se realiza solo si recibe aportes de terceras personas (Tío (a)s, abuela (o)s, padrinos, entre otros). </b></p></font> </td>                                
                                </tr>                                   
                                </table> 
                            </div>                       
                        </div>
                     </div>                      

                            
                    @endsecre

                    @beca (session('status'))
                    @php                                
                                $numero='0';                                
                            @endphp
                            @foreach ($postulantsregis2 as $postulantsregiss)
                                @php                                
                                $numero=count($postulantsregis2);                             
                                @endphp
                                @endforeach

                                @php                                
                                $numero2='0';                                
                            @endphp
                            @foreach ($postulantspost as $postulantsposts)
                                @php                                
                                $numero2=count($postulantspost);                             
                                @endphp
                                @endforeach

                            @php                                
                                $numero3='0';                                
                            @endphp
                            @foreach ($postulantsfin as $postulantsfins)
                                @php                                
                                $numero3=count($postulantsfin);                             
                                @endphp
                                @endforeach
                                
                                <div class="card shadow mt-4">
                <div class="card-header">{{ __('Estadísticas de Postulación') }}</div>
                <div class="card-body">               
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">                        
                            {{ session('status') }}
                        </div>
                         @endif
                       
                            <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                               <a class="col-sm-3 text-light shadow mt-4" style="background-color:#00aae4;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="{{ route('postulantr.export') }}">
                                <div> <center>                               
                                <br>
                                <font size="+8"><b>{{ $numero }}</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 50px;" class="fa fa-users fa-x5" ></span>                                 
                                <font size="+2"> <p><b> Registrados</b> </p></font> </center>
                              </div></a>

                              <a class="col-sm-3 text-light shadow mt-4" style="background-color:#cc6600;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="{{ route('postulantp.export') }}">
                                <div> <center>                               
                                <br>
                                <font size="+8"><b>&nbsp;&nbsp;{{ $numero2 }}</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 50px;" class="fa fa-users fa-x5" ></span>                                 
                                <font size="+2"> <p><b> Postulando</b> </p></font> </center>
                              </div></a>


                              <a class="col-sm-3 text-light shadow mt-4" style="background-color:#1E8449;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="{{ route('postulantb.export') }}">
                                <div>  <center>                              
                                <br>
                                <font size="+8"><b>&nbsp;&nbsp;{{ $numero3 }}</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 50px;" class="fa fa-users fa-x5" ></span>                                 
                                <font size="+2"> <p><b> Resolución</b> </p></font> </center>
                              </div></a> 
                            </div>                       
                        </div>
                     </div>

                     

                     <div class="card shadow mt-4">
                <div class="card-header">{{ __('Documentación Necesaria') }}</div>
                <div class="card-body">               
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">                        
                            {{ session('status') }}
                        </div>
                         @endif
                       
                            <div class="row">

                            <table align="center">
                                <tr>                              
                                <td align="center" width="300"><font size="+1"><p><b>DOCUMENTOS</b></p></font></td>                                 
                                <td align="center" width="300"><font size="+1"><p><b>DETALLES </b></p></font></td>                               
                                </tr>                                
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\Reglamento.pdf" target="_new"><i class="fa fa-fw fa-file"></i> REGLAMENTO PLAN DE DESCUENTOS</a></b></p></font> </td>                                 
                                <td align="center"><font size="+1" align="justify"><p><b>Reglamento y requisitos para postular al beneficio, es muy importante que se tenga conocimiento de esta información.</b></p></font> </td>                                
                                </tr> 
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\declaracionjurada.pdf" target="_new"><i class="fa fa-fw fa-file"></i> DECLARACIÓN JURADA NOTARIAL</a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Declaracion jurada notarial es para todos los postulantes al beneficio, debe ser subida al sistema en la pestaña postular</b></p></font> </td>                                
                                </tr>                                                                 
                                </table>  
                                <table align="center">
                                <tr>                              
                                <td align="center" width="300"><font size="+1"><p><b>DOCUMENTOS</b></p></font></td>                                 
                                <td align="center" width="300"><font size="+1"><p><b>DETALLES </b></p></font></td>                               
                                </tr>                              
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\certificado de residencia.pdf" target="_new"><i class="fa fa-fw fa-file"></i> CERTIFICADO DE RESIDENCIA</a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Solo para el padre o madre que no vive con el postulante se debe subir al sistema en la pestaña postular</b></p></font> </td>                                
                                </tr>
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\aporteeconomico de terceros.pdf" target="_new"><i class="fa fa-fw fa-file"></i> DECLARACIÓN NOTARIAL DE APORTE ECONÓMICOS DE TERCEROS </a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Recordar que esta declaración se realiza solo si recibe aportes de terceras personas (Tío (a)s, abuela (o)s, padrinos, entre otros). </b></p></font> </td>                                
                                </tr>                                   
                                </table>                             

                            </div>
                              

                        
                        </div>
                     </div>                      

                     
                    @endbeca
                    
                    @admin (session('status'))
                            @php                                
                                $numero='0';                                
                            @endphp
                            @foreach ($postulantsregis2 as $postulantsregiss)
                                @php                                
                                $numero=count($postulantsregis2);                             
                                @endphp
                                @endforeach

                                @php                                
                                $numero2='0';                                
                            @endphp
                            @foreach ($postulantspost as $postulantsposts)
                                @php                                
                                $numero2=count($postulantspost);                             
                                @endphp
                                @endforeach
                            @php                                
                                $numero3='0';                                
                            @endphp
                            @foreach ($postulantsfin as $postulantsfins)
                                @php                                
                                $numero3=count($postulantsfin);                             
                                @endphp
                            @endforeach
                                
                                <div class="card shadow mt-4">
                            <div class="card-header">{{ __('Estadísticas de Postulación') }}</div>
                           <div class="card-body">               
                              @if (session('status'))
                               <div class="alert alert-success" role="alert">                        
                            {{ session('status') }}
                            </div>
                               @endif
                               
                            <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                               <a class="col-sm-3 text-light shadow mt-4" style="background-color:#00aae4;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="{{ route('postulantr.export') }}">
                                <div> <center>                               
                                <br>
                                <font size="+8"><b>{{ $numero }}</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 50px;" class="fa fa-users fa-x5" ></span>                                 
                                <font size="+2"> <p><b>Registrados</b> </p></font> </center>
                              </div></a>

                              <a class="col-sm-3 text-light shadow mt-4" style="background-color:#cc6600;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="{{ route('postulantp.export') }}">
                                <div> <center>                               
                                <br>
                                <font size="+8"><b>&nbsp;&nbsp;{{ $numero2 }}</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 50px;" class="fa fa-users fa-x5" ></span>                                 
                                <font size="+2"> <p><b>Postulando</b> </p></font> </center>
                              </div></a>


                              <a class="col-sm-3 text-light shadow mt-4" style="background-color:#1E8449;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="{{ route('postulantb.export') }}">
                                <div>  <center>                              
                                <br>
                                <font size="+8"><b>&nbsp;&nbsp;{{ $numero3 }}</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 50px;" class="fa fa-users fa-x5" ></span>                                 
                                <font size="+2"> <p><b>Resolución</b> </p></font> </center>
                              </div></a>                             

                            </div>                       
                        </div>
                     </div>
                     

                     <div class="card shadow mt-4">
                <div class="card-header">{{ __('Documentación Necesaria') }}</div>
                <div class="card-body">               
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">                        
                            {{ session('status') }}
                        </div>
                         @endif
                       
                            <div class="row">
                            <table align="center">
                                <tr>                              
                                <td align="center" width="300"><font size="+1"><p><b>DOCUMENTOS</b></p></font></td>                                 
                                <td align="center" width="300"><font size="+1"><p><b>DETALLES </b></p></font></td>                               
                                </tr>                                
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\Reglamento.pdf" target="_new"><i class="fa fa-fw fa-file"></i> REGLAMENTO PLAN DE DESCUENTOS</a></b></p></font> </td>                                 
                                <td align="center"><font size="+1" align="justify"><p><b>Reglamento y requisitos para postular al beneficio, es muy importante que se tenga conocimiento de esta información.</b></p></font> </td>                                
                                </tr> 
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\declaracionjurada.pdf" target="_new"><i class="fa fa-fw fa-file"></i> DECLARACIÓN JURADA NOTARIAL</a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Declaracion jurada notarial es para todos los postulantes al beneficio, debe ser subida al sistema en la pestaña postular</b></p></font> </td>                                
                                </tr>                                                                 
                                </table>  
                                <table align="center">
                                <tr>                              
                                <td align="center" width="300"><font size="+1"><p><b>DOCUMENTOS</b></p></font></td>                                 
                                <td align="center" width="300"><font size="+1"><p><b>DETALLES </b></p></font></td>                               
                                </tr>                              
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\certificado de residencia.pdf" target="_new"><i class="fa fa-fw fa-file"></i> CERTIFICADO DE RESIDENCIA</a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Solo para el padre o madre que no vive con el postulante se debe subir al sistema en la pestaña postular</b></p></font> </td>                                
                                </tr>
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\aporteeconomico de terceros.pdf" target="_new"><i class="fa fa-fw fa-file"></i> DECLARACIÓN NOTARIAL DE APORTE ECONÓMICOS DE TERCEROS </a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Recordar que esta declaración se realiza solo si recibe aportes de terceras personas (Tío (a)s, abuela (o)s, padrinos, entre otros). </b></p></font> </td>                                
                                </tr>                                   
                                </table> 
                            </div>                       
                        </div>
                     </div>                      

                                
                         @endadmin


                     @user (session('status'))
                         @php
                            $estado='0';
                            $proceso='0';
                            $estado1='Postulando';
                            $estado2='Finalizado';
                            $estado3='';
                            
                            
                        @endphp
                        @foreach ($postulants as $postulant) 
                        @php                                            
                        $estado=count($postulants);
                        $proceso=$postulant->estado_r;                              
                        @endphp
                        @endforeach
                       
                        @switch($proceso)
                             @case("Finalizado")

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

                                @foreach ($postulants as $postulant) 
                                @php                                                                
                                $numero4=$postulant->montoanual; 
                                $descuento2=$postulant->monto_r;                                                  
                                $resultado4=($numero4 * $descuento2 / 100 )
                                
                                @endphp
                                @endforeach

                                @foreach ($postulants as $postulant) 
                                @php                                                                
                                $numero5=$postulant->montoanual; 
                                $descuento2=$postulant->monto_r;                                                  
                                $resultado5=($numero5 * $descuento2 / 100 ) / 10
                                
                                @endphp
                                @endforeach
                                
                                <div class="card shadow mt-4">
                <div class="card-header">{{ __('Estado de la Postulación') }}</div>
                <div class="card-body">               
                        
                       
                            <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                               <a class="col-sm-8 text-light shadow mt-4" style="background-color:#1E8449;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="#">
                                <div>
                                <table>
                                <tr>                              
                                <td align="center" width="200"><font size="+1"><p><b><br>Monto descuento <br>Anual</b></p></font></td>                                 
                                <td align="center" width="200"><font size="+1"><p><b><br>Monto descuento<br> Mes</b></p></font></td>
                                <td align="center" width="200"><font size="+1"><p><b><br>% aprox.<br>Descuento</b></p></font> </td>                               
                                <td align="center" width="200"><font size="+1"><p><b><br>Valor colegiatura <br>anual a pagar</b></p></font> </td>
                                <td align="center" width="200"><font size="+1"><p><b><br>Monto a cancelar <br>cuota (1)</b></p></font> </td>
                                </tr>
                                @foreach ($postulants as $postulant)
                                <tr>                              
                                <td align="center"><font size="+1"><p><b>{{ number_format($resultado4 , 0,3 ) }}</b></p></font> </td>                                 
                                <td align="center"><font size="+1"><p><b>{{ number_format($resultado5 , 0,3 ) }}</b></p></font> </td>
                                <td align="center"><font size="+1"><p><b>{{ $postulant->monto_r }}&nbsp;%</b></p></font>  </td>                               
                                <td align="center"><font size="+1"><p><b>{{ number_format($resultado3 , 0,3 ) }}</b></p></font> </td>
                                <td align="center"><font size="+1"><p><b>{{ number_format($resultado2 , 0,3 ) }}</b></p></font> </td>
                                </tr>                                
                                
                                </table>
                              </div>Cálculo considerando 10 cuotas.<hr>
                              <b>Justificación</b><p>{{ $postulant->comentario_r }}</p></a>
                              <br>@endforeach

                              

                              

                              
                                
                            </div>
                            <br>

                        
                        </div>
                     </div>
                     @break
                     @case("Postulando")
                     
                            <div class="card shadow mt-4">
                             <div class="card-header">{{ __('Estado de la Postulación') }}</div>
                            <div class="card-body">               
                             
                       
                            <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                               <a class="col-sm-8 text-light shadow mt-4" style="background-color:#cc6600;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="#">
                                <div>
                                <table>
                                <tr>                              
                                <td align="center" width="200"><font size="+1"><p><b><br>Monto descuento <br>Anual</b></p></font></td>                                 
                                <td align="center" width="200"><font size="+1"><p><b><br>Monto descuento<br> Mes</b></p></font></td>
                                <td align="center" width="200"><font size="+1"><p><b><br>% aprox.<br>Descuento</b></p></font> </td>                               
                                <td align="center" width="200"><font size="+1"><p><b><br>Valor colegiatura <br>anual a pagar</b></p></font> </td>
                                <td align="center" width="200"><font size="+1"><p><b><br>Monto a cancelar <br>cuota (1)</b></p></font> </td>
                                </tr>
                                
                                <tr>                              
                                <td align="center"><font size="+1"><p><b>En Revisión</b></p></font> </td>                                 
                                <td align="center"><font size="+1"><p><b>En Revisión</b></p></font> </td>
                                <td align="center"><font size="+1"><p><b>En Revisión</b></p></font>  </td>                               
                                <td align="center"><font size="+1"><p><b>En Revisión</b></p></font> </td>
                                <td align="center"><font size="+1"><p><b>En Revisión</b></p></font> </td>
                                </tr>                                
                                
                                </table>
                              </div>Cálculo considerando 10 cuotas.<hr>
                              <b>Justificación</b><p></p></a>
                              <br>               

                              
                                
                            </div>
                            <br>

                        
                        </div>
                     </div>
                     @break
                     @default
                     <div class="card shadow mt-4">
                             <div class="card-header">{{ __('Estado de la Postulación') }}</div>
                            <div class="card-body">               
                            
                       
                            <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                               <a class="col-sm-8 text-light shadow mt-4" style="background-color:#00aae4;  -moz-border-radius:7px 7px 7px 7px; /* Firefox */ 
								-webkit-border-radius:7px 7px 7px 7px; /* Safari y Chrome */ margin: 3px ;"  href="#">
                                <div>
                                <table>
                                <tr>                              
                                <td align="center" width="200"><font size="+1"><p><b><br>Monto descuento <br>Anual</b></p></font></td>                                 
                                <td align="center" width="200"><font size="+1"><p><b><br>Monto descuento<br> Mes</b></p></font></td>
                                <td align="center" width="200"><font size="+1"><p><b><br>% aprox.<br>Descuento</b></p></font> </td>                               
                                <td align="center" width="200"><font size="+1"><p><b><br>Valor colegiatura <br>anual a pagar</b></p></font> </td>
                                <td align="center" width="200"><font size="+1"><p><b><br>Monto a cancelar <br>cuota (1)</b></p></font> </td>
                                </tr>
                                
                                <tr>                              
                                <td align="center"><font size="+1"><p><a class="btn btn-sm btn-danger " href="#"><b>Sin Postular</b></a></p></font> </td>                                 
                                <td align="center"><font size="+1"><p><a class="btn btn-sm btn-danger " href="#"><b>Sin Postular</b></a></p></font> </td>
                                <td align="center"><font size="+1"><p><a class="btn btn-sm btn-danger " href="#"><b>Sin Postular</b></a></p></font> </td>                               
                                <td align="center"><font size="+1"><p><a class="btn btn-sm btn-danger " href="#"><b>Sin Postular</b></a></p></font> </td>
                                <td align="center"><font size="+1"><p><a class="btn btn-sm btn-danger " href="#"><b>Sin Postular</b></a></p></font> </td>
                                </tr>                                
                                
                                </table>
                              </div>Cálculo considerando 10 cuotas.<hr>
                              <b>Justificación</b><p></p></a>
                              <br>                             
                            </div>
                            <br>

                        
                        </div>
                     </div>

                     @endswitch


                     

                     <div class="card shadow mt-4">
                <div class="card-header">{{ __('Documentación Necesaria') }}</div>
                <div class="card-body">               
                   
                       
                            <div class="row">
                            
                            <table align="center">
                                <tr>                              
                                <td align="center" width="300"><font size="+1"><p><b>DOCUMENTOS</b></p></font></td>                                 
                                <td align="center" width="300"><font size="+1"><p><b>DETALLES </b></p></font></td>                               
                                </tr>                                
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\Reglamento.pdf" target="_new"><i class="fa fa-fw fa-file"></i> REGLAMENTO PLAN DE DESCUENTOS</a></b></p></font> </td>                                 
                                <td align="center"><font size="+1" align="justify"><p><b>Reglamento y requisitos para postular al beneficio, es muy importante que se tenga conocimiento de esta información.</b></p></font> </td>                                
                                </tr> 
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\declaracionjurada.pdf" target="_new"><i class="fa fa-fw fa-file"></i> DECLARACIÓN JURADA NOTARIAL</a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Declaracion jurada notarial es para todos los postulantes al beneficio, debe ser subida al sistema en la pestaña postular</b></p></font> </td>                                
                                </tr>                                                                 
                                </table>  
                                <table align="center">
                                <tr>                              
                                <td align="center" width="300"><font size="+1"><p><b>DOCUMENTOS</b></p></font></td>                                 
                                <td align="center" width="300"><font size="+1"><p><b>DETALLES </b></p></font></td>                               
                                </tr>                              
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\certificado de residencia.pdf" target="_new"><i class="fa fa-fw fa-file"></i> CERTIFICADO DE RESIDENCIA</a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Solo para el padre o madre que no vive con el postulante se debe subir al sistema en la pestaña postular</b></p></font> </td>                                
                                </tr>
                                <tr>                              
                                <td align="center"><font size="+1"><p><b><a class="btn btn-sm btn-success" href="images\doc\aporteeconomico de terceros.pdf" target="_new"><i class="fa fa-fw fa-file"></i> DECLARACIÓN NOTARIAL DE APORTE ECONÓMICOS DE TERCEROS </a></b></p></font> </td>                   
                                <td align="center"><font size="+1" align="justify"><p><b>Recordar que esta declaración se realiza solo si recibe aportes de terceras personas (Tío (a)s, abuela (o)s, padrinos, entre otros). </b></p></font> </td>                                
                                </tr>                                   
                                </table> 

                                

                            </div>
                              

                        
                        </div>
                     </div>                



                     
                         @enduser
           
       
@endsection
