
</div>
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-60 col-md-60 col-sm-60 col-xs-60">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="<?=base_url()?>img/logo/logo.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class=" col-xs-12">
        <div class="code-editor-single responsive-mg-b-30">
            <h2><?=$title?></h2>
            <div class="jumbotron">
                <h2 class="display-4 text-center">ASOCIACION DE PRODUCTORES DE QUINUA REAL YARETANI - CAMELIDOS Y TURISMO
                    <br>“GESTORES DE SU PROPIO DESARROLLO”
                </h2>


                <br>
                <br>
                <p class="lead">USTED ESTA EN LA OPCION: <h2><?=$this->User->consulta('nombre','tipo','idtipo',$_SESSION['idtipo']) ?></h2></p>
                <hr class="my-4">
                <p>
                    <br>
                    COMUNIDADES AFILIADAS A APROQUIRY – CT:
                    <br> <br>
                    CHALLUMA. PUQUI. LIPIPUJIO. SONTURO. CATUYO. CHITE. QUITAMALLA. CHALHUA. CAJHUATA. RODEO. COCHEVILLQUE. JUPACOLLO. CAÑAVICOTA. TAMBILLO. JILSTATA. JAYOCOTA. SIGUALACA.
                </p>
                <!--a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a-->
            </div>
        </div>
    </div>