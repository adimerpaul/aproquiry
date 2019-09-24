<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presidente extends CI_Controller {
    public function index()
    {
        $this->load->view('presidente');
    }

}
