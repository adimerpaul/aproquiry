
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>
            <!-- Button trigger modal -->
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>N</th>
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
                $query=$this->db->query("SELECT * FROM socio");
                foreach ($query->result() as $row){
                    $c=$c+1;
                    echo "<tr>
                            <td>$c</td>
                            <td>".$this->User->consulta('nombre','comunidad','idcomunidad',$row->idcomunidad)."</td>
                            <td>".$row->nombreproductor."</td>
                            <td>".$row->fechaingreso."</td>
                            <td>".$this->User->consulta('user','usuario','idusuario',$row->idusuario)."</td>
                            <td>
                            <a href='".base_url()."Eliminarsocio/delete/".$row->idsocio."' class='eliminar'>
                                <i class='fa fa-trash btn-danger btn-sm'> Eliminar</i>
                            </a>
                            </td>
                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script >
    var eli=document.getElementsByClassName('eliminar');
    for (var i=0;i<eli.length;i++){
        eli[i].addEventListener('click',function (e) {
            if (!confirm("Seguro de eliminar?"))
            e.preventDefault();
        });
    }
</script>