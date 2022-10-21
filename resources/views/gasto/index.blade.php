@extends('layouts.plantillabase2')

@section('template_title')
    Gasto
@endsection

@section('content')
@admin (session('status'))
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
                            @foreach ($gastos as $gasto) 
                                @php
                                $id=$gasto->id;                                
                                $numero=count($gastos);
                                $nombre2=$gasto->nombre_post;
                                $suma+=$gasto->monto_dg;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach


                                {{ __('Gasto declarados de') }} <b>{{ $nombre2 }}</b></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total de gastos declarados:&nbsp;<b>{{ number_format($suma , 0,3 ) }}</b>
                            </span>

                             <div class="float-right">
                               
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-create-gasto-{{ $id }}">
                                                    Nuevo
                                                    </button>
                                &nbsp;&nbsp;
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
                                           
											
											<td>{{ $gasto->nombre_dg }}</td>
											<td>{{ number_format($gasto->monto_dg, 0,3 ) }}</td>
											<td>{{ $gasto->observ_dg }}</td>
											
                                            <td><a class="btn btn-sm btn-info " target="_new" href="{{ asset($gasto->documento_dg) }}"><i class="fa fa-fw fa-eye"></i> Ver Documento</a></td>

                                            <td>
                                                <form action="{{ route('gastos.destroy',$gasto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('gastos.show',$gasto->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-update-gasto-{{ $gasto->id }}">
                                                    Editar
                                                    </button>
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('gasto.modal-update-gasto')
                                        @include('gasto.modal-create-gasto')
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
                            @foreach ($gastos as $gasto) 
                                @php
                                $id=$gasto->id;                                
                                $numero=count($gastos);
                                $nombre2=$gasto->nombre_post;
                                $suma+=$gasto->monto_dg;//sumanos los valores, ahora solo fata mostrar dicho valor
                                @endphp
                                @endforeach


                                {{ __('Gasto declarados de') }} <b>{{ $nombre2 }}</b></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total de gastos declarados:&nbsp;<b>{{ number_format($suma , 0,3 ) }}</b>
                            </span>

                             <div class="float-right">
                               
                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-create-gasto-{{ $id }}">
                                                    Nuevo
                                                    </button>
                                &nbsp;&nbsp;
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

                                            <td>
                                                <form action="{{ route('gastos.destroy',$gasto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('gastos.show',$gasto->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-update-gasto-{{ $gasto->id }}">
                                                    Editar
                                                    </button>
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('gasto.modal-update-gasto')
                                        @include('gasto.modal-create-gasto')
                                    @endforeach
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
