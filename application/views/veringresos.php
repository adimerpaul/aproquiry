
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>

            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Quien ingreso</th>
                    <th>Fecha hora</th>
                    <th>Decripcion del ingreso</th>
                    <th>Cantidad Bs.</th>
                    <th>N° comprobante</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $c=0;
                $sum=0;
                $query=$this->db->query("SELECT * FROM ingreso");
                foreach ($query->result() as $row){
                    $c=$c+1;
                    $sum=$sum+$row->cantidad;
                    if ($row->ncomprobante=="0") {
                        $nro="sn";
                    }else{
                        $nro=$row->ncomprobante;
                    }
                    echo "<tr>
                            <td>$c</td>
                            <td>".$row->nombre."</td>
                            <td>".$row->fecha."</td>
                            <td>".$row->descripcion."</td>
                            <td>".$row->cantidad."</td>
                            <td>$nro</td>
                        </tr>";
                }
                ?>

                </tbody>
            </table>
            <h3>Cantidad total ingresos (Bs): <?=$sum?></h3>
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