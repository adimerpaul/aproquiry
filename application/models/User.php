<?php
/**
 * Created by PhpStorm.
 * User: Adimer
 * Date: 12/11/2018
 * Time: 7:33
 */

class User extends CI_Model
{
    function consulta($mostrar,$tabla,$where,$dato){
        $query=$this->db->query("SELECT $mostrar FROM $tabla WHERE $where='$dato'");
        $row=$query->row();
        return $row->$mostrar;
    }
}