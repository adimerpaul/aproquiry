
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Detalle de Gasto</th>
                    <th>Cantidad Bs.</th>
                    <th>N° comprobante</th>
                    <th>Nombre (quien gasto)</th>
                    <th>Fecha hora</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $c=0;
                $sum=0;
                $query=$this->db->query("SELECT * FROM gasto");
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
                            <td>".$row->detalle."</td>
                            <td>".$row->cantidad."</td>
                            <td>$nro</td>
                            <td>".$row->nombre."</td>
                            <td>".$row->fecha."</td>
                        </tr>";
                }
                ?>

                </tbody>
            </table>
            <h3>Cantidad total gastos (Bs.): <?=$sum?></h3>
        </div>
    </div>
</div>

