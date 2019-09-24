
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
                <i class="fa fa-user"></i>
                Registrar nuevo socio
            </button>

            <!-- Modal -->
            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registro de Socio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url()?>Socio/insert" method="post">
                                <div class="form-group row">
                                    <label for="nombreproductor" class="col-sm-2 col-form-label">Nombre productor</label>
                                    <div class="col-sm-10">
                                        <input type="text" style="text-transform: uppercase" class="form-control" id="nombreproductor" required placeholder="nombreproductor" name="nombreproductor">
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label for="ci" class="col-sm-2 col-form-label">C.I.</label>
                                    <div class="col-sm-10">
                                        <input type="text" style="text-transform: uppercase" class="form-control" id="ci" required placeholder="ci" name="ci">
                                    </div>

                                </div>
                                <div class="form-group row">
                                   <label for="expedido" class="col-sm-2 col-form-label">Expedido</label>
                                    <div class="col-sm-10">
                                        <select name="expedido" id="expedido" class="form-control" required>
                                            <option value="">Selecionar...</option>
                                            <option value="Or">Or</option>
                                            <option value="Bn">Bn</option>
                                             <option value="Cbba">Cbba</option>
                                             <option value="Ch">Ch</option>
                                             <option value="Lp">Lp</option>
                                             <option value="Pa">Pa</option>
                                             <option value="Pt">Pt</option>
                                             <option value="Sc">Sc</option>
                                             <option value="Tj">Tj</option>
                                             <option value="Otros">Otros</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                                    <div class="col-sm-10">
                                        <input type="radio" id="sexo" required  name="sexo" value="MASCULINO"> Masculino
                                        <input type="radio" id="sexo" required  name="sexo" value="FEMENINO"> Femenino
                                        <input type="radio" id="sexo" required  name="sexo" value="OTROS"> Otros
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="regional" class="col-sm-2 col-form-label">Regional</label>
                                    <div class="col-sm-10">
                                        <select name="regional" id="regional" class="form-control" required>
                                            <option value="">Selecionar...</option>
                                             <option value="102-APROQUIRY-CT">102-APROQUIRY-CT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="">Selecionar...</option>
                                             <option value="ORGÁNICO">ORGÁNICO</option>
                                             <option value="TRANSICIÓN 1">TRANSICIÓN 1</option>
                                             <option value="TRANSICIÓN 2">TRANSICIÓN 2</option>
                                             <option value="TRANSICIÓN 3">TRANSICIÓN 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="codigoproductor" class="col-sm-2 col-form-label">Codigo productor</label>
                                    <div class="col-sm-10">
                                        <input type="text" style="text-transform: uppercase" class="form-control" id="codigoproductor" required placeholder="codigoproductor" name="codigoproductor">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idcomunidad" class="col-sm-2 col-form-label">idcomunidad</label>
                                    <div class="col-sm-10">
                                        <select name="idcomunidad" id="idcomunidad" class="form-control" required>
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
                    <th>Fecha de ingreso</th>
                    <th>Usuario que registro</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $c=0;
                $query=$this->db->query("SELECT * FROM socio WHERE estado='' ORDER BY idcomunidad");
                foreach ($query->result() as $row){
                    $c=$c+1;
                    echo "<tr>
                            <td>$c</td>
                            <td>".$this->User->consulta('nombre','comunidad','idcomunidad',$row->idcomunidad)."</td>
                            <td>".$row->nombreproductor."</td>
                            <td>".$row->fechaingreso."</td>
                            <td>".$this->User->consulta('user','usuario','idusuario',$row->idusuario)."</td>
                            <td>
                            <i class='fa fa-pencil btn-warning btn-sm' data-toggle='modal' data-target='#exampleModal' 
                            data-nombreproductor='".$row->nombreproductor."' 
                            data-idcomunidad='".$row->idcomunidad."'
                            data-idsocio='".$row->idsocio."'   
                            data-estatus='".$row->estatus."' 
                            data-ci='".$row->ci."' 
                            data-sexo='".$row->sexo."' 
                            data-expedido='".$row->expedido."' 
                            data-regional='".$row->regional."' 
                            data-codigoproductor='".$row->codigoproductor."' 
                                                       
                            > Editar</i>
                            <a href='".base_url()."Socio/Aceptar/".$row->idsocio."'>
                            <i class='fa fa-child btn-success btn-sm aceptar' > Aceptar</i>
                            </a>
                            </td>
                        </tr>";
                }
                ?>

                </tbody>
            </table>
            <script !src="">
                var aceptar=document.getElementsByClassName("aceptar");
                for (var i=0;i<aceptar.length;i++){
                    aceptar[i].addEventListener('click',function (e) {
                        if (!confirm("Ya no podra modificar sus datos del nuevo socio. Esta seguro de aceptar?")){
                            e.preventDefault();
                        }

                    });
                }
            </script>
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
                        <label for="nombreproductorm" class="col-sm-2 col-form-label">Nombre Productor</label>
                        <div class="col-sm-10">
                            <input type="text" name="idsocio" id="idsociom" hidden>
                            <input type="text" style="text-transform: uppercase" class="form-control" id="nombreproductorm" required placeholder="nombreproductorm" name="nombreproductor">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="idcomunidadm" class="col-sm-2 col-form-label">Comunidad</label>
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

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="statusm" class="form-control" required>
                                <option value="">Selecionar...</option>
                                <option value="ORGÁNICO">ORGÁNICO</option>
                                <option value="TRANSICIÓN 1">TRANSICIÓN 1</option>
                                <option value="TRANSICIÓN 2">TRANSICIÓN 2</option>
                                <option value="TRANSICIÓN 3">TRANSICIÓN 3</option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cim" class="col-sm-2 col-form-label">C.I.</label>
                        <div class="col-sm-10">
                            <input type="text" style="text-transform: uppercase" class="form-control" id="cim" required placeholder="ci" name="ci">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expedido" class="col-sm-2 col-form-label">Expedido</label>
                        <div class="col-sm-10">
                            <select name="expedido" id="expedidom" class="form-control" required>
                                <option value="">Selecionar...</option>
                                <option value="Or">Or</option>
                                <option value="Bn">Bn</option>
                                <option value="Cbba">Cbba</option>
                                <option value="Ch">Ch</option>
                                <option value="Lp">Lp</option>
                                <option value="Pa">Pa</option>
                                <option value="Pt">Pt</option>
                                <option value="Sc">Sc</option>
                                <option value="Tj">Tj</option>
                                <option value="Otros">Otros</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sexom" class="col-sm-2 col-form-label">Sexo</label>
                        <div class="col-sm-10">
                            <input type="radio" id="sexom1" required  name="sexo" value="MASCULINO"> Masculino
                            <input type="radio" id="sexom2" required  name="sexo" value="FEMENINO"> Femenino
                            <input type="radio" id="sexom3" required  name="sexo" value="OTROS"> Otros
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="regionalm" class="col-sm-2 col-form-label">Regional</label>
                        <div class="col-sm-10">
                            <input type="text" style="text-transform: uppercase" class="form-control" id="regionalm" required placeholder="regionalm" name="regional">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="codigoproductorm" class="col-sm-2 col-form-label">Codigo Productor</label>
                        <div class="col-sm-10">
                            <input type="text" style="text-transform: uppercase" class="form-control" id="codigoproductorm" required placeholder="codigoproductorm" name="codigoproductor">
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