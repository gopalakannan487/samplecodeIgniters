<?php
class Welcome_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    function registerdata($data)
    {             
        $this->db->insert('register',$data);
        return true;    
    }

    }
    ?>
