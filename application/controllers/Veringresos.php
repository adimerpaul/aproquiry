<?php
/**
 * Created by PhpStorm.
 * User: Adimer
 * Date: 16/11/2018
 * Time: 9:21
 */

class Veringresos extends CI_Controller
{
    public function index(){

        if($_SESSION['idusuario']==""){
            header("Location: ".base_url());
        }
        $data['title']="Usted esta en la opcion: Ver ingresos";
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
    <script src='".base_url()."js/socio.js'></script>";
        $this->load->view("templates/header",$data);
        $this->load->view('veringresos');
        $this->load->view("templates/footer",$data);
    }
    public function insert(){

        if($_SESSION['idusuario']==""){
            header("Location: ".base_url());
        }
        $descripcion=strtoupper( $_POST['descripcion']);
        $cantidad=$_POST['cantidad'];
        $this->db->query("INSERT INTO ingreso(cantidad,descripcion,idusuario) 
      VALUES('$cantidad','$descripcion','".$_SESSION['idusuario']."')");
        header("Location: ".base_url()."Ingresos");
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