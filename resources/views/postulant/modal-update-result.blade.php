<!-- modal actualizar-->
<div class="modal fade" id="modal-update-result-{{ $postulant->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-default">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Ingreso de resolución</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            </div>
                                    <form action="{{ route('rs.update', $postulant->id) }}" method="POST" enctype="multypart/from-data">
                                    
                                    @csrf
                                        <div class="modal-body">
                                        <div class="modal-group">
                                                <label for="id">Id</label>
                                                <input type="text" name="id" class="form-control" id="id" value="{{ $postulant->id }}" >
                                            </div>
                                            <div class="modal-group">
                                                <label for="idpostulantr">Id Postulante</label>
                                                <input type="text" name="idpostulantr" class="form-control" id="idpostulantr" value="{{ $postulant->idpostulantr }}" >
                                            </div>
                                            <div class="modal-group">
                                                <label for="idperiod">idperiodo</label>
                                                <input type="text" name="idperiod" class="form-control" id="idperiod" value="{{ $postulant->idperiod }}">
                                            </div>
                                            <div class="modal-group">
                                                <label for="fecha_r">Fecha</label>
                                                <input type="text" name="fecha_r" class="form-control" id="fecha_r" value="{{ $postulant->fecha_r }}">
                                            </div>
                                            <div class="modal-group">
                                                <label for="estado_r">Estado</label>
                                                <input type="text" name="estado_r" class="form-control" id="estado_r" value="Finalizado">
                                            </div>
                                            <div class="modal-group">
                                                <label for="monto_r">Monto</label>
                                                <input type="text" name="monto_r" class="form-control" id="monto_r" value="{{ $postulant->monto_r }}">
                                            </div>
                                            <div class="modal-group">
                                                <label for="comentario_r">Comentario</label>
                                                <input type="text" name="comentario_r" class="form-control" id="comentario_r" value="{{ $postulant->comentario_r }}">
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                                        </div>
                                    </form> 
                                    </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        <!-- /.modal -->