
<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>
            <form class="form-inline" action="<?=base_url()?>Historial/verhistorial" method="POST">

                    <!--div class="col-12">
                        <input type="date" class="form-control" name="fecha" id="fecha" value="<?=date('Y-m-d')?>">
                    </div>
                <br>
                    <button type="submit" class="btn btn-info mb-2"> <i class="fa fa-eye"></i> Ver fecha acopiada</button-->

            <?php 
            $query=$this->db->query("SELECT SUBSTRING(fecha,1,10) as fecha FROM acopio GROUP BY SUBSTRING(fecha,1,10) ORDER BY fecha DESC ");
            foreach ($query->result() as $row) {
                    echo " <button>  <input type='radio' value='".$row->fecha."' name='fecha' required > ".$row->fecha."</button><br>";
                }    
             ?>
            <button class="btn-sm btn-primary"><input type="radio" name="tipo" value="BLANCA" required> <i class="fa fa-cogs"></i>  Quinua Blanca
                </button>
                <button class="btn-sm btn-danger"><input type="radio" name="tipo" value="ROJA" required> <i class="fa fa-cogs"></i>  Quinua Roja
                </button>
                <button class="btn-sm btn-warning"><input type="radio" name="tipo" value="NEGRA" required> <i class="fa fa-cogs"></i>  Quinua Negra
                </button>

            <hr>
             <button type="submit" class="btn btn-info btn-block"> <i class="fa fa-eye"></i> Ver fecha acopiada</button>
            </form>
        </div>
    </div>
</div>