<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function login(){
	    $username=$_POST['username'];
        $password=$_POST['password'];
        $query=$this->db->query("SELECT * FROM usuario WHERE user='$username' AND password='$password'");
        if($query->num_rows()==1){
            $row=$query->row();
            $_SESSION['username']=$row->user;
            $_SESSION['password']=$row->password;
            $_SESSION['idtipo']=$row->idtipo;
            $_SESSION['idusuario']=$row->idusuario;
            header("Location: ".base_url()."Admin");
        }else{
            header("Location: ".base_url());
        }
    }
    public function logout(){
	    session_destroy();
	    header("Location: ".base_url());
    }
}
