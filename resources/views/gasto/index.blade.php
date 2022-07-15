@extends('layouts.plantillabase2')

@section('template_title')
    Gasto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Gasto declarados admin') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('gastos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>&nbsp;&nbsp;
                                <a class="btn btn-primary btn-sm float-left" href="{{ route('postulants.index') }}"> Atras</a>
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
                                        
                                        
										<th>Id Postulant</th>
										<th>Nombre Dg</th>
										<th>Monto Dg</th>
										<th>Observ Dg</th>
										<th>Documento Dg</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gastos as $gasto)
                                        <tr>                         
                                            
											<td>{{ $gasto->id_postulant }}</td>
											<td>{{ $gasto->nombre_dg }}</td>
											<td>{{ $gasto->monto_dg }}</td>
											<td>{{ $gasto->observ_dg }}</td>
											
                                            <td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($gasto->documento_dg) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>

                                            <td>
                                                <form action="{{ route('gastos.destroy',$gasto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('gastos.show',$gasto->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('gastos.edit',$gasto->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
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
        </div>
    </div>
@endsection
