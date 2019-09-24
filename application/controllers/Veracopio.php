<?php
/**
 * Created by PhpStorm.
 * User: Adimer
 * Date: 16/11/2018
 * Time: 9:21
 */

class Veracopio extends CI_Controller
{
    public function index($tipo='BLANCA'){

        if($_SESSION['idusuario']==""){
            header("Location: ".base_url());
        }
        $data['tipo']=$tipo;
        $data['title']="Usted esta en la opcion: Ver cantidad acopiado";
        $data['css']="
    <link rel='stylesheet' href='".base_url()."css/jquery.dataTables.min.css'>
    <link rel='stylesheet' href='".base_url()."css/buttons.dataTables.min.css'>
    ";
        $data['js']="<script src='".base_url()."js/jquery-3.3.1.js'></script>
<script src='".base_url()."js/jquery-1.9.1.js'></script>
    <script src='".base_url()."js/bootstrap.min.js'></script>
    <script src='".base_url()."js/jquery.dataTables.min.js'></script>
    <script src='".base_url()."js/dataTables.buttons.min.js'></script>
    <script src='".base_url()."js/jszip.min.js'></script>
    <script src='".base_url()."js/pdfmake.min.js'></script>
    <script src='".base_url()."js/vfs_fonts.js'></script>
    <script src='".base_url()."js/buttons.html5.min.js'></script>
    <script src='".base_url()."js/veracopio.js'></script>";
        $this->load->view("templates/header",$data);
        $this->load->view('veracopio');
        $this->load->view("templates/footer",$data);
    }
    public function insert(){

        if($_SESSION['idusuario']==""){
            header("Location: ".base_url());
        }
        $idestimacion=( $_POST['idestimacion']);
        $cantidad=$_POST['cantidad'];
        $this->db->query("INSERT INTO acopio(idestimacion,cantidad,idusuario) 
      VALUES('$idestimacion','$cantidad','".$_SESSION['idusuario']."')");
        header("Location: ".base_url()."Acopio");
    }
    public function update(){

        if($_SESSION['idusuario']==""){
            header("Location: ".base_url());
        }
        $nombreproductor=strtoupper( $_POST['nombreproductor']);
        $idcomunidad=$_POST['idcomunidad'];
        $idsocio=$_POST['idsocio'];
        $this->db->query("UPDATE socio SET nombreproductor='$nombreproductor', idcomunidad='$idcomunidad' WHERE idsocio='$idsocio'");
        header("Location: ".base_url()."Socio");
    }
}