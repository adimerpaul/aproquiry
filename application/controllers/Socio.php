<?php
/**
 * Created by PhpStorm.
 * User: Adimer
 * Date: 16/11/2018
 * Time: 9:21
 */

class Socio extends CI_Controller
{
public function index(){

    if($_SESSION['idusuario']==""){
        header("Location: ".base_url());
    }
    $data['title']="Usted esta en la opcion: Agregar nuevo socio";
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
    $this->load->view('socio');
    $this->load->view("templates/footer",$data);
}
public function insert(){

    if($_SESSION['idusuario']==""){
        header("Location: ".base_url());
    }
    $nombreproductor=strtoupper( $_POST['nombreproductor']);
    $idcomunidad=$_POST['idcomunidad'];
    $ci=$_POST['ci'];
    $expedido=$_POST['expedido'];
    $sexo=$_POST['sexo'];
    $regional=$_POST['regional'];
    $status=$_POST['status'];
    $codigoproductor=$_POST['codigoproductor'];
    $this->db->query("INSERT INTO socio(nombreproductor,idcomunidad,idusuario,ci,expedido,sexo,regional,estatus,codigoproductor) 
      VALUES('$nombreproductor','$idcomunidad','".$_SESSION['idusuario']."','$ci','$expedido','$sexo','$regional','$status','$codigoproductor')");
    header("Location: ".base_url()."Socio");
}
public function update(){

        if($_SESSION['idusuario']==""){
            header("Location: ".base_url());
        }
        $nombreproductor=strtoupper( $_POST['nombreproductor']);
        $idcomunidad=$_POST['idcomunidad'];
        $idsocio=$_POST['idsocio'];
    $ci=$_POST['ci'];
    $expedido=$_POST['expedido'];
    $sexo=$_POST['sexo'];
    $regional=$_POST['regional'];
    $status=$_POST['status'];
    $codigoproductor=$_POST['codigoproductor'];

        $this->db->query("UPDATE socio SET nombreproductor='$nombreproductor', idcomunidad='$idcomunidad',ci='$ci'
 , expedido='$expedido'
 , sexo='$sexo'
 , regional='$regional'
 , estatus='$status'
  , codigoproductor='$codigoproductor'
 WHERE idsocio='$idsocio'");
        header("Location: ".base_url()."Socio");
    }
public function aceptar($idsocio){
    $this->db->query("UPDATE socio SET estado='ACEPTADO' WHERE idsocio='$idsocio'");
    header("Location: ".base_url()."Socio");
}
}