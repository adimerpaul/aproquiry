
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>
            <h4>Tipo: <?=$tipo?></h4>
            <a href="<?=base_url()?>Verestimacion/index/BLANCA" class="fa fa-cogs btn btn-sm btn-primary"> Quinua Blanca</a>
            <a href="<?=base_url()?>Verestimacion/index/ROJA" class="fa fa-cogs btn btn-sm btn-danger"> Quinua Roja</a>
            <a href="<?=base_url()?>Verestimacion/index/NEGRA" class="fa fa-cogs btn btn-sm btn-warning"> Quinua Negra</a>
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Comunidad</th>
                    <th>Nombre socio</th>
                    <th>Tipo</th>
                    <th>Estimacion registrada</th>
                    <th>Fecha</th>
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
                    $c=$c+1;
                    $sum=$sum+$row->cantidad;
                    echo "<tr>
                            <td>$c</td>
                            <td>".$this->User->consulta('nombre','comunidad','idcomunidad',$this->User->consulta('idcomunidad','socio','idsocio',$row->idsocio))."</td>
                            <td>".$this->User->consulta('nombreproductor','socio','idsocio',$row->idsocio)."</td>
                            <td>".$row->tipo."</td>
                            <td>".$row->cantidad."</td>

                            <td>".$row->fecha."</td>
                            
                        </tr>";
                }
                ?>
                </tbody>
            </table>
            <h3>Total estimacion registrada <?=$sum?></h3>
        </div>
    </div>
</div>