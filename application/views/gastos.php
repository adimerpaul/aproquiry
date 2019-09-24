
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                <i class="fa fa-usd"></i>
                Gasto Con Comprobante
            </button>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#create2">
                <i class="fa fa-usd"></i>
                Gasto Sin Comprobante
            </button>

            <!-- Modal -->
            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">RegistrarGasto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url()?>Gastos/insert" method="post">
                                <div class="form-group row">
                                    <label for="detalle" class="col-sm-2 col-form-label">Detalle</label>
                                    <div class="col-sm-10">
                                        <input type="text" style="text-transform: uppercase" class="form-control" id="detalle" required placeholder="detalle" name="detalle">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                                    <div class="col-sm-10">
                                        <input type="number"  class="form-control" id="cantidad" required placeholder="cantidad" name="cantidad">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Nombre Quien gasto</label>
                                    <div class="col-sm-10">
                                        <input type="text" style="text-transform: uppercase" class="form-control" id="nombre" required placeholder="nombre" name="nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ncomprobante" class="col-sm-2 col-form-label">ncomprobante</label>
                                    <div class="col-sm-10">
                                        <input type="number" style="text-transform: uppercase" class="form-control" id="ncomprobante" required placeholder="ncomprobante" name="ncomprobante">
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
                            <h5 class="modal-title" id="exampleModalLabel">RegistrarGasto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url()?>Gastos/insert" method="post">
                                <div class="form-group row">
                                    <label for="detalle" class="col-sm-2 col-form-label">Detalle</label>
                                    <div class="col-sm-10">
                                        <input type="text" style="text-transform: uppercase" class="form-control" id="detalle" required placeholder="detalle" name="detalle">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                                    <div class="col-sm-10">
                                        <input type="number"  class="form-control" id="cantidad" required placeholder="cantidad" name="cantidad">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-2 col-form-label">Nombre Quien gasto</label>
                                    <div class="col-sm-10">
                                        <input type="text" style="text-transform: uppercase" class="form-control" id="nombre" required placeholder="nombre" name="nombre">
                                    </div>
                                </div>
                                <div class="form-group row hidden">
                                    <label for="ncomprobante" class="col-sm-2 col-form-label">ncomprobante</label>
                                    <div class="col-sm-10">
                                        <input type="number" style="text-transform: uppercase" class="form-control" id="ncomprobante"  placeholder="ncomprobante" name="ncomprobante">
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
                    <th>Detalle de Gasto</th>
                    <th>Cantidad Bs.</th>
                    <th>N° comprobante</th>
                    <th>Nombre (quien gasto)</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $c=0;
                $query=$this->db->query("SELECT * FROM gasto");
                foreach ($query->result() as $row){
                    $c=$c+1;
                    echo "<tr>
                            <td>$c</td>
                            <td>".$row->detalle."</td>
                            <td>".$row->cantidad."</td>
                            <td>".$row->ncomprobante."</td>
                            <td>".$row->nombre."</td>
                        </tr>";
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

