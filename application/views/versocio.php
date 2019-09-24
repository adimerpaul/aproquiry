
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>

            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Comunidad</th>
                    <th>Nombre del productor</th>
                    <th>Carnet de identidad</th>
                    <th>Lugar ext. C.I.</th>
                    <th>Sexo</th>
                    <th>Regional</th>
                    <th>Estatus</th>
                    <th>Código de productor</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $c=0;
                $query=$this->db->query("SELECT * FROM comunidad c INNER JOIN socio s ON c.idcomunidad=s.idcomunidad ORDER BY c.nombre");
                foreach ($query->result() as $row){
                    $c=$c+1;
                    echo "<tr>
                            <td>$c</td>
                            <td>".$this->User->consulta('nombre','comunidad','idcomunidad',$row->idcomunidad)."</td>
                            <td>".$row->nombreproductor."</td>
                            <td>".$row->ci."</td>
                            <td>".$row->expedido."</td>
                            <td>".$row->sexo."</td>
                            <td>".$row->regional."</td>
                            <td>".$row->estatus."</td>
                            <td>".$row->codigoproductor."</td>
                           
                        </tr>";
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
