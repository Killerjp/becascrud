@extends('layouts.plantillabase2')

@section('Lista de Usuarios')
    User
@endsection

@section('content')
@admin<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Lista de Usuarios') }}
                                &nbsp;&nbsp; <a class="btn btn-sm btn-primary " href="{{ route('users.export') }}"><i class="fa fa-fw fa-eye"></i>Exportar Usuarios Excel</a>
                            </span>                           
                            @php
                            $rol=0;                                                    
                        @endphp
                        @foreach ($users as $user) 
                            @php
                            $rol=$user->rol;                            
                            @endphp
                            @endforeach                            
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
										<th>Name</th>
										<th>Rol</th>
										<th>Email</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                                                                      
											<td>{{ $user->name }}</td>
                                            @if ($user->rol == 1 )
											<td>Administrador</td>
                                            @elseif ($user->rol == 2 )
                                            <td>Secretaria</td>
                                            @elseif ($user->rol == 4 )
                                            <td>Comite de Becas</td>
                                            @else
                                            <td>Usuario</td>
                                            @endif
											<td>{{ $user->email }}</td>                           

                                            <td>
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $users->links() !!}
            </div>
        </div>
    </div>
    @endadmin
    @user
    <center><b>Usuario sin privilegios para ver este contenido</b></center>
    @enduser
    @beca
    <center><b>Usuario sin privilegios para ver este contenido</b></center>
    @endbeca
    @secre
    <center><b>Usuario sin privilegios para ver este contenido</b></center>
    @endsecre
@endsection
