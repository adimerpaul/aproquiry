<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function index()
    {
        if($_SESSION['idusuario']==""){
            header("Location: ".base_url());
        }
        $data['title']="APROQUIRY - C. T.";
        $data['css']="";
        $data['js']="";
        $data['img']="";
        $this->load->view("templates/header",$data);
        $this->load->view('admin');
        $this->load->view("templates/footer",$data);
    }

}
