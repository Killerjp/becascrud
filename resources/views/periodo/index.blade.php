@extends('layouts.plantillabase2')

@section('template_title')
    Periodo
@endsection

@section('content')<br>
@admin
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Periodo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('periodos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
                                        
										<th>Año</th>
										<th>Inicio Periodo</th>
										<th>Termino Periodo</th>
										<th>Mensualidad Anual</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periodos as $periodo)
                                        <tr>
                                           
                                            
											<td>{{ $periodo->ano_pe }}</td>
											<td>{{ $periodo->inicio_pe }}</td>
											<td>{{ $periodo->termino_Pe }}</td>
											<td>{{ $periodo->montoanual }}</td>

                                            <td>
                                                <form action="{{ route('periodos.destroy',$periodo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('periodos.show',$periodo->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('periodos.edit',$periodo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $periodos->links() !!}
            </div>
        </div>
    </div>
    @endadmin
    @user
    <center>
    <b>Usted no tiene autorizacion para este contenido</b>   
</center>
    @enduser
    @secre
    <center>
    <b>Usted no tiene autorizacion para este contenido</b>
</center>
    @endsecre
@endsection
