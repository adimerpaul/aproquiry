
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?>  </h2>
            <h4>Tipo: <?=$tipo?></h4>
            <a href="<?=base_url()?>Aceptar/index/BLANCA" class="fa fa-cogs btn btn-sm btn-primary"> Quinua Blanca</a>
            <a href="<?=base_url()?>Aceptar/index/ROJA" class="fa fa-cogs btn btn-sm btn-danger"> Quinua Roja</a>
            <a href="<?=base_url()?>Aceptar/index/NEGRA" class="fa fa-cogs btn btn-sm btn-warning"> Quinua Negra</a>
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Comunidad</th>
                    <th>Nombre socio</th>
                    <th>Fecha</th>
                    <th>Estimacion registrada</th>
                    <th>Aceptar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $c=0;
                $query=$this->db->query("SELECT * FROM estimacion WHERE estado='CREADO' AND tipo='$tipo'");
                foreach ($query->result() as $row){
                    $c=$c+1;
                    echo "<tr>
                            <td>$c</td>
                            <td>".$this->User->consulta('nombre','comunidad','idcomunidad',$this->User->consulta('idcomunidad','socio','idsocio',$row->idsocio))."</td>
                            <td>".$this->User->consulta('nombreproductor','socio','idsocio',$row->idsocio)."</td>
                            <td>".$row->fecha."</td>
                            <td>".$row->cantidad."</td>
                            <td><a href='".base_url()."Aceptar/modificar/".$row->idestimacion."'> 
                                    <i class='fa fa-archive btn-info btn-sm modificar' data-toggle='modal' data-target='#exampleModal'> Aceptar</i>
                            </a></td>
                        </tr>";
                }
                ?>
                </tbody>
            </table>
            <script !src="">
                var estimacion=document.getElementsByClassName("modificar");
                for(var i=0;i<estimacion.length;i++){
                    estimacion[i].addEventListener('click',function (e) {
                        if (!confirm("APROQUIRY – C. T.\n" +
                            "¿Una vez aceptado REGISTRAR ESTIMACIONES usted ya no podrá modificar la estimacion del socio. Esta de acuerdo?\n")){
                            e.preventDefault();
                        }
                    }
                    )
                }
            </script>
        </div>
    </div>
</div>