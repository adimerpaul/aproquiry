
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>
            <h4>Tipo: <?=$tipo?></h4>
            <a href="<?=base_url()?>Acopio/index/BLANCA" class="fa fa-cogs btn btn-sm btn-primary"> Quinua Blanca</a>
            <a href="<?=base_url()?>Acopio/index/ROJA" class="fa fa-cogs btn btn-sm btn-danger"> Quinua Roja</a>
            <a href="<?=base_url()?>Acopio/index/NEGRA" class="fa fa-cogs btn btn-sm btn-warning"> Quinua Negra</a>
            <hr>
            <!-- Button trigger modal -->
            <!--button type="button" class="btn btn-info" data-toggle="modal" data-target="#crear">
                <i class="fa fa-newspaper-o"></i>
                Crear Acopio
            </button-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                <i class="fa fa-angle-double-down"></i>
                Registrar Acopio
            </button>
            <!-- Modal -->
            <div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear acopio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url()?>Acopio/insert" method="post">
                                <table  class="table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Comunidad</th>
                                        <th>Nombre socio</th>
                                        <th>Fecha</th>
                                        <th>Estimacion registrada</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $c=0;
                                    $query=$this->db->query("SELECT * 
FROM estimacion e
INNER JOIN socio s ON e.idsocio=s.idsocio
INNER JOIN comunidad c ON c.idcomunidad=s.idcomunidad
WHERE e.estado='ACEPTADO' AND e.tipo='$tipo'
ORDER BY c.nombre
");
                                    $sum=0;
                                    foreach ($query->result() as $row){
                                        echo "<tr>
                            <td><input type='radio' name='idestimacion' id='' required value='".$row->idestimacion."'></td>
                            <td>".$this->User->consulta('nombre','comunidad','idcomunidad',$this->User->consulta('idcomunidad','socio','idsocio',$row->idsocio))."</td>
                            <td>".$this->User->consulta('nombreproductor','socio','idsocio',$row->idsocio)."</td>
                            <td>".$row->fecha."</td>
                            <td>".$row->cantidad."</td>

                        </tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <div class="form-group row">
                                    <label for="nombre" class="col-sm-2 col-form-label">nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cantidad" class="col-sm-2 col-form-label">cantidad</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="cantidad" >
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Crear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar acopio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url()?>Acopio/insert" method="post">
                                <div class="form-group row">
                                    <label for="idestimacion" class="col-sm-2 col-form-label">idestimacion</label>
                                    <div class="col-sm-10">
                                        <select name="idestimacion" required="" class="form-control">
                                            <option value="">Seleccionar...</option>
                                            <?php 
                                            $query=$this->db->query("SELECT * FROM estimacion WHERE tipo ='$tipo' AND estado='ACEPTADO'" );
                                            foreach ($query->result() as $row) {
                                                echo "<option value='".$row->idestimacion."'> ".$this->User->consulta('nombreproductor','socio','idsocio',$row->idsocio)."  ".$row->cantidad."</option>";
                                            }
                                             ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cantidad" class="col-sm-2 col-form-label">cantidad</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="cantidad" >
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Crear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>N</th>
                    <th>Comunidad</th>
                    <th>Nombre socio</th>
                    <th>Estimacion</th>
                    <th>Cantidad acopiada</th>
                    <th>Cantidad por acopiar</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $c=0;
                $cantidadfaltanta=0;
                $veri="%";
                $query=$this->db->query("SELECT  c.nombre,s.nombreproductor,e.cantidad,a.cantidad as 'acopio',a.fecha,a.idacopio,s.idsocio
                                        FROM socio s 
                                        INNER JOIN comunidad c ON c.idcomunidad=s.idcomunidad
                                        INNER JOIN estimacion e ON s.idsocio=e.idsocio
                                        INNER JOIN acopio a ON a.idestimacion=e.idestimacion
                                        WHERE a.estado='CREADO'
                                        order by c.nombre,s.nombreproductor,a.fecha");
                foreach ($query->result() as $row){
                    $c=$c+1;

                    if ($veri!=$row->nombreproductor){
                        $veri=$row->nombreproductor;
                        $cantidadfaltanta=$row->cantidad;
                    }
                    $cantidadfaltanta=intval($cantidadfaltanta)-$row->acopio;
                    if($cantidadfaltanta==0) $cantidadfaltanta="Agotado";
                    if( intval($cantidadfaltanta)<0) $cantidadfaltanta="Error";
                    echo "<tr>
                            <td>$c</td>
                            <td>".$row->nombre."</td>
                            <td>".$row->nombreproductor."</td>
                            <td>".$row->cantidad."</td>
                            <td>".$row->acopio."</td>
                            <td>$cantidadfaltanta</td>
                            <td>".$row->fecha."</td>
                            <td>
                            <i class='fa fa-pencil btn-warning btn-sm' data-toggle='modal' data-target='#exampleModal' 
                            data-cantidad='".$row->cantidad."'
                            data-nombre='".$this->User->consulta('nombreproductor','socio','idsocio',$row->idsocio)."'
                            data-idacopio='".$row->idacopio."'            
                            > Editar</i>
                           <a href='".base_url()."Acopio/update/".$row->idacopio."'><i class='fa fa-apple btn-success btn-sm modificar'> Aceptar</i></a> 
                            </td>
                        </tr>";
                }
                ?>

                </tbody>
            </table>
            <script !src="">
                var modificar= document.getElementsByClassName("modificar");
                for (var i=0;i<modificar.length;i++){
                    modificar[i].addEventListener('click',function (e) {
                        if (!confirm("Seguro de aceptar el acopio"))
                        e.preventDefault();
                    })
                }
            </script>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>Acopio/update" method="post">
                    
                    <div class="form-group row">
                        <label for="cantidadm" class="col-sm-2 col-form-label">Nombre socio</label>
                        <div class="col-sm-10">
                            <span id="nombrem"></span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="cantidadm" class="col-sm-2 col-form-label">Cantidad</label>
                        <div class="col-sm-10">
                            <input type="text" name="idacopio" id="idacopiom" hidden>
                            <input type="number" style="text-transform: uppercase" class="form-control" id="cantidadm" required placeholder="cantidadm" name="cantidad">
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