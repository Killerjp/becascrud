@extends('layouts.plantillabase2')

@section('template_title')
    Grupo Familiar
@endsection

@section('content')<br>
@admin (session('status'))

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                        
                                    
 </td>
                        
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


                                {{ __('Grupo Familiar de  ') }} <b>{{ $nombre2 }}</b>&nbsp;&nbsp;&nbsp;&nbsp;Numero de Integrantes  <b>{{ $numero }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Total de ingresos:</b>&nbsp;{{ number_format($suma , 0,3 ) }}
                            </span>
                            
                            
                        
                            
                             <div class="float-right">
                             <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-create-grupof-{{ $id }}">
                                                    Nuevo
                                                    </button>
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
                                            </td>
                                        </tr>
                                        @include('grupof.modal-update-grupof')
                                        @include('grupof.modal-create-grupof')
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @endadmin
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


                                {{ __('Grupo Familiar de  ') }} <b>{{ $nombre2 }}</b>&nbsp;&nbsp;&nbsp;&nbsp;Numero de Integrantes  <b>{{ $numero }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Total de ingresos:</b>&nbsp;{{ number_format($suma , 0,3 ) }}
                            </span>
                            
                            
                        
                            
                             <div class="float-right">
                             <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-create-grupof-{{ $id }}">
                                                    Nuevo
                                                    </button>
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
                                            </td>
                                        </tr>
                                        @include('grupof.modal-update-grupof')
                                        @include('grupof.modal-create-grupof')
                                    @endforeach
                                    
                                </thead>
                                </tbody>
                            </table>
                           
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @endsecre
@endsection
