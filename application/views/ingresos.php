
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                <i class="fa fa-usd"></i>
                Ingreso Con Comprobante
            </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#create2">
                <i class="fa fa-usd"></i>
                Ingreso Sin Comprobante
            </button>

            <!-- Modal -->
            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar Ingreso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url()?>Ingresos/insert" method="post">
                                <div class="form-group row">
                                    <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                    <div class="col-sm-10">
                                        <input type="text" style="text-transform: uppercase" class="form-control" id="descripcion" required placeholder="descripcion" name="descripcion">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Quien ingresa?</label>
                                    <div class="col-sm-10">
                                        <input type="text"  class="form-control" id="nombre" required placeholder="nombre" name="nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                                    <div class="col-sm-10">
                                        <input type="number"  class="form-control" id="cantidad" required placeholder="cantidad" name="cantidad">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ncomprobante" class="col-sm-2 col-form-label">ncomprobante</label>
                                    <div class="col-sm-10">
                                        <input type="number"  class="form-control" id="ncomprobante" required placeholder="ncomprobante" name="ncomprobante">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="create2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar Ingreso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url()?>Ingresos/insert" method="post">
                                <div class="form-group row">
                                    <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                    <div class="col-sm-10">
                                        <input type="text" style="text-transform: uppercase" class="form-control" id="descripcion" required placeholder="descripcion" name="descripcion">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Quien ingresa?</label>
                                    <div class="col-sm-10">
                                        <input type="text"  class="form-control" id="nombre" required placeholder="nombre" name="nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                                    <div class="col-sm-10">
                                        <input type="number"  class="form-control" id="cantidad" required placeholder="cantidad" name="cantidad">
                                    </div>
                                </div>
                                <div class="form-group row hidden">
                                    <label for="ncomprobante" class="col-sm-2 col-form-label">ncomprobante</label>
                                    <div class="col-sm-10">
                                        <input type="number"  class="form-control" id="ncomprobante"  placeholder="ncomprobante" name="ncomprobante">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Quien entrego</th>
                    <th>Decripcion del ingreso</th>
                    <th>Cantidad Bs.</th>
                    <th>N° Comprobante</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $c=0;
                $query=$this->db->query("SELECT * FROM ingreso");
                foreach ($query->result() as $row){
                    $c=$c+1;
                    echo "<tr>
                            <td>$c</td>
                            <td>".$row->descripcion."</td>
                            <td>".$row->nombre."</td>
                            <td>".$row->cantidad."</td>
                            <td>".$row->ncomprobante."</td>
                        </tr>";
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>Socio/update" method="post">
                    <div class="form-group row">
                        <label for="nombreproductorm" class="col-sm-2 col-form-label">nombre productor</label>
                        <div class="col-sm-10">
                            <input type="text" name="idsocio" id="idsociom" hidden>
                            <input type="text" style="text-transform: uppercase" class="form-control" id="nombreproductorm" required placeholder="nombreproductorm" name="nombreproductor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idcomunidadm" class="col-sm-2 col-form-label">idcomunidadm</label>
                        <div class="col-sm-10">
                            <select name="idcomunidad" id="idcomunidadm" class="form-control" required>
                                <option value="">Seleccionar..</option>
                                <?php
                                $query=$this->db->query("SELECT * FROM comunidad");
                                foreach ($query->result() as $row){
                                    echo "<option value='".$row->idcomunidad."'>".$row->nombre."</option>
                                            ";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>