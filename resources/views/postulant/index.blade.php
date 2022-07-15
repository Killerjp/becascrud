@extends('layouts.plantillabase2')

@section('template_title')
    Postulant
@endsection



@section('content')<br>
@secre (session('status'))
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
										<th>Apoderado</th>
										
										

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
											
											

                                            <td>
                                                <form action="{{ route('postulants.destroy',$postulant->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('postulants.show',$postulant->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('postulants.edit',$postulant->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  class="btn btn-danger btn-sm "><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    <a class="btn btn-sm btn-info" href="{{ route('gf.create',$postulant->id) }}" ><i class="fa fa-fw fa-edit"></i> Agregar Grupo Familiar</a>
                                                    <a class="btn btn-sm btn-info" href="{{ route('gasto.create',$postulant->id) }}" ><i class="fa fa-fw fa-edit"></i> Agregar Gastos </a>
                                                   
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
                            @endphp
                            @foreach ($grupofs as $grupof)
                                @php
                                $suma+=$grupof->ingresos_gf;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach


                                {{ __('Grupo Familiar') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Total de ingresos Grupo Familiar:</b>&nbsp;&nbsp;${{ number_format($suma , 0,3 ) }}
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
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
                                        <th>Id</th>
										<th>Id Postulante</th>
                                        <th>Id Usuario</th>
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
                                            
                                            <td>{{ $grupof->id }}</td>
											<td>{{ $grupof->id_postulant }}</td>
                                            <td>{{ $grupof->id_user }}</td>
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
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    
                    <div class="container-fluid">
                    
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                @php
                                $suma2=0;
                            @endphp
                            @foreach ($gastos as $gasto)
                                @php
                                $suma2+=$gasto->monto_dg ;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach

                            <span id="card_title">
                                {{ __('Gastos Mensuales ') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Total de Gastos Mensuales:</b>&nbsp;&nbsp;${{ number_format($suma2 , 0,3 ) }}
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
                                        <th>Id </th>
										<th>Id Postulant</th>
                                        
										<th>Nombre Dg</th>
										<th>Monto Dg</th>
										<th>Observ Dg</th>
										<th>Documento Dg</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gastos as $gastoss)
                                        <tr>
                                                                                      
											<td>{{ $gastoss->id}}</td>
                                            <td>{{ $gastoss->id_postulant}}</td>
											<td>{{ $gastoss->nombre_dg }}</td>
											<td>{{ number_format($gastoss->monto_dg , 0,3 ) }}</td>
											<td>{{ $gastoss->observ_dg }}</td>
											<td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($gastoss->documento_dg) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>

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
                                        </tr>
                                        @include('gasto.modal-update-gasto')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><br>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    
                
            </div>
            

            

        </div>
        
    </div>
    
        </div>
        
   
    </div>
   
    @endsecre
    @admin (session('status'))
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-sm-12 ">
                <div class="card shadow mt-4">
                    <div class="card-header ">
                        <div style="display: flex; justify-content: space-between; align-items: center; ">

                            <span id="card_title">
                                {{ __('Postulante Admin') }}
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
										<th>Apoderado</th>
                                        <th>Periodo</th>
										
										

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($postulantsadmin as $postulant)
                                        <tr>
                                            
                                            
											<td>{{ $postulant->rut_post }}</td>
											<td>{{ $postulant->nombre_post }}</td>
											
																						
											<td>{{ $postulant->curso_post }}</td>
											<td>{{ $postulant->apod_post }}</td>
                                            <td>{{ $postulant->periodo_id }}</td>
											
											

                                            <td>
                                                <form action="{{ route('postulants.destroy',$postulant->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('postulants.show',$postulant->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
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
@endsection
