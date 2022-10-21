<!-- modal actualizar-->
<div class="modal fade" id="modal-create-grupof-{{ $grupof->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-default">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Crear Grupo Familiar</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            </div>
                                    <form action="{{ route('admigf.store', $grupof->id) }}" method="POST" role="form" enctype="multipart/form-data"> 
                                    @csrf
                                        <div class="modal-body">
                                            
                                            <div class="modal-group">
                                                <label for="id_postulant">Id postulante</label>
                                                <input type="text" name="id_postulant" class="form-control" id="id_postulant" value="{{ $grupof->id_postulant }}">
                                            </div>
                                            <div class="modal-group">
                                                <label for="id_user">Id usuario</label>
                                                <input type="text" name="id_user" class="form-control" id="id_user" value="{{ $grupof->id_user }}">
                                            </div>
                                            <div class="modal-group">
                                                <label for="periodo">Periodo</label>
                                                <input type="text" name="periodo" class="form-control" id="periodo" value="{{ $grupof->periodo }}">
                                            </div>
                                            <div class="modal-group">
                                                <label for="nombre_gf">Nombre</label>
                                                <input type="text" name="nombre_gf" class="form-control" id="nombre_gf" >
                                            </div>
                                            <div class="modal-group">
                                                <label for="rut_gf">Rut</label>
                                                <input type="text" name="rut_gf" class="form-control" id="rut_gf" >
                                            </div>
                                            <div class="modal-group">
                                                <label for="edad_gf">Edad</label>
                                                <input type="text" name="edad_gf" class="form-control" id="edad_gf" >
                                            </div>
                                            <div class="modal-group">
                                                <label for="parentesco_gf">Parentesco</label>
                                                <input type="text" name="parentesco_gf" class="form-control" id="parentesco_gf" >
                                            </div>
                                            <div class="modal-group">
                                                <label for="profesion_gf">Profesion</label>
                                                <input type="text" name="profesion_gf" class="form-control" id="profesion_gf" >
                                            </div>
                                            <div class="modal-group">
                                                <label for="ingresos_gf">Ingresos</label>
                                                <input type="text" name="ingresos_gf" class="form-control" id="ingresos_gf" >
                                            </div>
                                            <div class="modal-group">
                                                <label for="documento">Documento</label>
                                                <input type="file" name="documento" class="form-control" id="documento" >
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-outline-primary">Crear</button>
                                        </div>
                                    </form> 
                                    </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        <!-- /.modal -->