<?php
/**
 * Created by PhpStorm.
 * User: Adimer
 * Date: 16/11/2018
 * Time: 9:21
 */

class Historial extends CI_Controller
{
    public function index()
    {

        if ($_SESSION['idusuario'] == "") {
            header("Location: " . base_url());
        }
        $data['title'] = "Usted esta en la opcion: Ver historial (Seleccionar la fecha acopiada)";
        $data['css'] = "
    <link rel='stylesheet' href='" . base_url() . "css/jquery.dataTables.min.css'>
    <link rel='stylesheet' href='" . base_url() . "css/buttons.dataTables.min.css'>
    ";
        $data['js'] = "<script src='" . base_url() . "js/jquery-3.3.1.js'></script>
<script src='" . base_url() . "js/jquery-1.9.1.js'></script>
    <script src='" . base_url() . "js/bootstrap.min.js'></script>
    <script src='" . base_url() . "js/jquery.dataTables.min.js'></script>
    <script src='" . base_url() . "js/dataTables.buttons.min.js'></script>
    <script src='" . base_url() . "js/jszip.min.js'></script>
    <script src='" . base_url() . "js/pdfmake.min.js'></script>
    <script src='" . base_url() . "js/vfs_fonts.js'></script>
    <script src='" . base_url() . "js/buttons.html5.min.js'></script>
    <script src='" . base_url() . "js/socio.js'></script>";
        $this->load->view("templates/header", $data);
        $this->load->view('historial');
        $this->load->view("templates/footer", $data);
    }
    public  function verhistorial(){
        $fecha=$_POST['fecha'];
        $tipo=$_POST['tipo'];
        $data['fecha']=$fecha;
        if ($_SESSION['idusuario'] == "") {
            header("Location: " . base_url());
        }
        $data['tipo'] =$tipo;
        $data['title'] = "Historial de acopio";
        $data['css'] = "
    <link rel='stylesheet' href='" . base_url() . "css/jquery.dataTables.min.css'>
    <link rel='stylesheet' href='" . base_url() . "css/buttons.dataTables.min.css'>
    ";
        $data['js'] = "<script src='" . base_url() . "js/jquery-3.3.1.js'></script>
<script src='" . base_url() . "js/jquery-1.9.1.js'></script>
    <script src='" . base_url() . "js/bootstrap.min.js'></script>
    <script src='" . base_url() . "js/jquery.dataTables.min.js'></script>
    <script src='" . base_url() . "js/dataTables.buttons.min.js'></script>
    <script src='" . base_url() . "js/jszip.min.js'></script>
    <script src='" . base_url() . "js/pdfmake.min.js'></script>
    <script src='" . base_url() . "js/vfs_fonts.js'></script>
    <script src='" . base_url() . "js/buttons.html5.min.js'></script>
    <script src='" . base_url() . "js/verhistorial.js'></script>";
        $this->load->view("templates/header", $data);
        $this->load->view('verhisorial',$data);
        $this->load->view("templates/footer", $data);
    }

}