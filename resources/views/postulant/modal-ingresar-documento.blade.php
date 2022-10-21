<!-- modal actualizar-->
<div class="modal fade" id="modal-ingresar-documento-{{ $postulant->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-default">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Ingreso de documentacion</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            </div>
                            <form action="{{ route('documents.store', $postulant->id) }}" method="POST" role="form" enctype="multipart/form-data"> 
                            @csrf
                                    <div class="modal-body">  
                                        <div class="modal-group">
                                                <label for="id_postulant">idpostulant</label>
                                                <input type="text" name="id_postulant" class="form-control" id="id_postulant" value="{{ $postulant->id }}" >
                                            </div>                    
                                            
                                        <div class="modal-group">
                                                <label for="nombre_doc">Eliga el documento a subir</label><br>
                                                
                                                <select name="nombre_doc" id="nombre_doc" class="form-control">
                                                <option></option>
                                                    <option>DECLARACION JURADA NOTARIAL</option>
                                                    <option>CERTIFICADO DE RESIDENCIA</option>
                                                    <option>DECLARACION NOTARIAL DE APORTE ECONOMICOS DE TERCEROS</option>                                                    
                                                </select>
                                            </div>                        
                                               
                                            <div class="modal-group">
                                                <label for="documento_doc">Buscar Archivo a subir</label>
                                                <input type="file" name="documento_doc" class="form-control" id="documento_doc" >
                                            </div>
                                            
                                            
                                        </div>                                    
                                        
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-outline-primary">Subir</button>
                                        </div>
                                    </form> 
                                    </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        <!-- /.modal -->







                        