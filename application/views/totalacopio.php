
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>
            <h4>Tipo: <?=$tipo?></h4>
            <a href="<?=base_url()?>Veracopio/index/BLANCA" class="fa fa-cogs btn btn-sm btn-primary"> Quinua Blanca</a>
            <a href="<?=base_url()?>Veracopio/index/ROJA" class="fa fa-cogs btn btn-sm btn-danger"> Quinua Roja</a>
            <a href="<?=base_url()?>Veracopio/index/NEGRA" class="fa fa-cogs btn btn-sm btn-warning"> Quinua Negra</a>
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>N</th>
                    <th>Comunidad</th>
                    <th>Nombre socio</th>
                    <th>Estimacion</th>
                    <th>Cantidad acopiada</th>
                    <th>Cantidad por acopiar</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $c=0;
                $sum=0;
                $suma=0;
                $suma1=0;
                $cantidadfaltanta=0;
                $veri="%";
                $query=$this->db->query("SELECT  c.nombre,s.nombreproductor,e.cantidad,a.cantidad as 'acopio',a.fecha,e.tipo
                                        FROM socio s 
                                        INNER JOIN comunidad c ON c.idcomunidad=s.idcomunidad
                                        INNER JOIN estimacion e ON s.idsocio=e.idsocio
                                        INNER JOIN acopio a ON a.idestimacion=e.idestimacion
                                        WHERE a.estado='ACEPTADO' AND e.tipo='$tipo'
                                        order by a.fecha DESC");
                foreach ($query->result() as $row){

                    $c=$c+1;

                    if ($veri!=$row->nombreproductor){
                        $veri=$row->nombreproductor;
                        $cantidadfaltanta=$row->cantidad;
                    }
                    $cantidadfaltanta=intval($cantidadfaltanta)-$row->acopio;
                    if($cantidadfaltanta==0) $cantidadfaltanta="Agotado";
                    if( intval($cantidadfaltanta)<0) $cantidadfaltanta="Error";
                    $sum=$sum+$row->acopio;
                    $suma=$suma+$row->cantidad;
                    $suma1=$suma1+$cantidadfaltanta;

                    echo "<tr>
                            <td>$c</td>
                            <td>".$row->nombre."</td>
                            <td>".$row->nombreproductor."</td>
                            <td>".$row->cantidad."</td>
                            <td>".$row->acopio."</td>
                            <td>$cantidadfaltanta</td>
                            <td>".$row->tipo."</td>
                            <td>".$row->fecha."</td>
                            
                        </tr>";
                        
                }
                ?>
                </tbody>
            </table>
            <h3 id="estimacion">Total Estimacion (qq): <?=$suma?></h3>
            <h3 id="acopio">Total Cantidad Acopiada (qq): <?=$sum?></h3>
            <h3 id="acopiar">Total Cantidad por Acopiar (qq): <?=$suma1?></h3>
        </div>
    </div>
</div>