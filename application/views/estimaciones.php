
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>
            <h4>Tipo: <?=$tipo?></h4>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
                <i class="fa fa-angle-double-down"></i>
                Registrar nueva estimacion
            </button>
            <br>
            <a href="<?=base_url()?>Estimaciones/index/BLANCA" class="fa fa-cogs btn btn-sm btn-primary"> Quinua Blanca</a>
            <a href="<?=base_url()?>Estimaciones/index/ROJA" class="fa fa-cogs btn btn-sm btn-danger"> Quinua Roja</a>
            <a href="<?=base_url()?>Estimaciones/index/NEGRA" class="fa fa-cogs btn btn-sm btn-warning"> Quinua Negra</a>


            <!-- Modal -->
            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registro de Estimacion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url()?>Estimaciones/insert" method="post">
                                <div class="form-group row">
                                    <label for="idsocio" class="col-sm-2 col-form-label">Socio</label>
                                    <div class="col-sm-10">
                                        <select name="idsocio" id="idsocio" class="form-control" required>
                                            <option value="">Seleccionar..</option>
                                            <?php
                                            $query=$this->db->query("SELECT * FROM socio WHERE idsocio not in (SELECT idsocio FROM estimacion )");
                                            foreach ($query->result() as $row){
                                                echo "<option value='".$row->idsocio."'>".$row->nombreproductor."</option>
                                            ";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tipo" class="col-sm-2 col-form-label">Tipo de quinua</label>
                                    <div class="col-sm-10">
                                        <select name="tipo" id="tipo" class="form-control" required>
                                            <option value="">Seleccionar..</option>
                                            <option value="BLANCA">BLANCA</option>
                                            <option value="ROJA">ROJA</option>
                                            <option value="NEGRA">NEGRA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="0" required >
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
                    <th>Comunidad</th>
                    <th>Nombre socio</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Usuario que registro</th>
                    <th>Estimacion registrada</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $c=0;
                $query=$this->db->query("SELECT * 
                FROM estimacion e INNER JOIN socio s ON e.idsocio=s.idsocio
                INNER JOIN comunidad c ON c.idcomunidad=s.idcomunidad
                where e.estado='CREADO' AND tipo='$tipo'
                ORDER BY c.nombre");
                foreach ($query->result() as $row){
                    $c=$c+1;
                    echo "<tr>
                            <td>$c</td>
                            <td>".$this->User->consulta('nombre','comunidad','idcomunidad',$this->User->consulta('idcomunidad','socio','idsocio',$row->idsocio))."</td>
                            <td>".$this->User->consulta('nombreproductor','socio','idsocio',$row->idsocio)."</td>
                            <td>".$row->tipo."</td>
                            <td>".$row->fecha."</td>
                            <td>".$this->User->consulta('user','usuario','idusuario',$row->idusuario)."</td>
                            <td>".$row->cantidad."</td>
                            <td>
                            <button type='button' class='btn btn-sm btn-warning' data-toggle='modal'
                             data-cantidad='".$row->cantidad."' 
                             data-idestimacion='".$row->idestimacion."' 
                             data-target='#exampleModal'>
                                <i class='fa fa-edit'> Editar Estimacion</i>
                            </button></td>
                        </tr>";
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>Estimaciones/update" method="post">

                    <div class="form-group row">
                        <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                        <div class="col-sm-10">
                            <input type="number" name="idestimacion" id="idestimacionm"  required hidden  >
                            <input type="number" name="cantidad" id="cantidadm" class="form-control" placeholder="0" required >
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
