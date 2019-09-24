
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$title?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url()?>css/owl.theme.css">
    <link rel="stylesheet" href="<?=base_url()?>css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?=base_url()?>css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?=base_url()?>css/calendar/fullcalendar.print.min.css">
    <!-- codemirror CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/code-editor/codemirror.css">
    <link rel="stylesheet" href="<?=base_url()?>css/code-editor/ambiance.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/responsive.css">
    <?=$css?>
    <!-- modernizr JS
		============================================ -->
    <script src="<?=base_url()?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href=""><img style="width: 205px;height: 60px" class="main-logo" src="<?=base_url()?>img/logo/logo.png" alt="" /></a>
            <!--strong><img width="205" src="<?=base_url()?>img/logo/logosn.png" alt="" /></strong-->
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <?php
                    $query=$this->db->query("SELECT nombre,url,icono FROM tipomenu t INNER JOIN MENU m ON t.idmenu=m.idmenu
                                                 WHERE t.idtipo='".$_SESSION['idtipo']."'");
                    foreach ($query->result() as $row){
                        echo "<li>
                                    <a title='Landing Page' href='".base_url().$row->url."' aria-expanded='false'>
                                        <i class='fa ".$row->icono." icon-wrap sub-icon-mg' aria-hidden='true'></i> 
                                        <span class='mini-click-non'>".$row->nombre."</span>
                                     </a>
                                  </li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <!--div class="header-top-menu tabl-d-n">
                                        <ul class="nav navbar-nav mai-top-nav">
                                            <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link">About</a>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                            </li>
                                            <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                            </li>
                                        </ul>
                                    </div-->
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                            <li class="nav-item">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
                                                    <span class="admin-name"><?=$_SESSION['username']?></span>
                                                    <!--i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i-->
                                                </a>
                                                <a href="<?=base_url()?>welcome/logout" >
                                                    <i class="fa fa-power-off" aria-hidden="true"></i>
                                                    <span class="admin-name">Salir</span>
                                                    <!--i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i-->
                                                </a>
                                                <!--ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    <li><a href="register.html"><span class="fa fa-home author-log-ic"></span>Register</a>
                                                    </li>
                                                    <li><a href="#"><span class="fa fa-user author-log-ic"></span>My Profile</a>
                                                    </li>
                                                    <li><a href="lock.html"><span class="fa fa-diamond author-log-ic"></span> Lock</a>
                                                    </li>
                                                    <li><a href="#"><span class="fa fa-cog author-log-ic"></span>Settings</a>
                                                    </li>
                                                    <li><a href="<?=base_url()?>welcome/logout"><span class="fa fa-lock author-log-ic"></span>Cerrar session</a>
                                                    </li>
                                                </ul-->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul class="mobile-menu-nav">
                                    <?php
                                    $query=$this->db->query("SELECT nombre,url,icono FROM tipomenu t INNER JOIN MENU m ON t.idmenu=m.idmenu
                                                                                     WHERE t.idtipo='".$_SESSION['idtipo']."'");
                                    foreach ($query->result() as $row){
                                        echo "<li>
                                                <a href='".base_url().$row->url."'> <i class='fa ".$row->icono."'></i>  ".$row->nombre."</a>
                                            </li>";
                                    }
                                    ?>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list single-page-breadcome">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <!--div class="breadcome-heading">
                                        <form role="search" class="">
                                            <input type="text" placeholder="Search..." class="form-control">
                                            <a href=""><i class="fa fa-search"></i></a>
                                        </form>
                                    </div-->
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <ul class="breadcome-menu">
                                        <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod"><?=$title?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Code Editor Start -->
    <div class="code-editor-area mg-tb-15">
        <div class="container-fluid">