<!-- modal actualizar-->
<div class="modal fade" id="modal-update-gasto-{{ $gasto->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-default">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Actualizar Declaracion de Gastos</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            </div>
                                    <form action="{{ route('gastos.update', $gasto->id) }}" method="POST" enctype="multypart/from-data">
                                    {{ method_field('PATCH') }}
                                    @csrf
                                        <div class="modal-body">
                                        <div class="modal-group">
                                                <label for="id">Id</label>
                                                <input type="text" name="id" class="form-control" id="id" value="{{ $gasto->id }}">
                                            </div>
                                            <div class="modal-group">
                                                <label for="id_postulant">Id Postulante</label>
                                                <input type="text" name="id_postulant" class="form-control" id="id_postulant" value="{{ $gasto->id_postulant }}">
                                            </div>
                                            <div class="modal-group">
                                                <label for="nombre_dg">Nombre Gasto</label>
                                                <input type="text" name="nombre_dg" class="form-control" id="nombre_dg" value="{{ $gasto->nombre_dg }}">
                                            </div>
                                            <div class="modal-group">
                                                <label for="monto_dg">Monto</label>
                                                <input type="text" name="monto_dg" class="form-control" id="monto_dg" value="{{ $gasto->monto_dg }}">
                                            </div>
                                            <div class="modal-group">
                                                <label for="observ_dg">Observacion</label>
                                                <input type="text" name="observ_dg" class="form-control" id="observ_dg" value="{{ $gasto->observ_dg }}">
                                            </div>
                                            <div class="modal-group">
                                                <label for="documento_dg">Documento</label>
                                                <input type="text" name="documento_dg" class="form-control" id="documento_dg" value="{{ $gasto->documento_dg }}">
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