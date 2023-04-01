<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_brand extends CI_Model
{
    function getBrand()
    {
        $this->db->order_by("entry_date", "desc");
        return $this->db->get('Brand')->result();
    }

    function checkBrand($name)
    {
        $this->db->where("name", $name);
        return $this->db->get('Brand')->result();
    }
    function insertBrand($data)
    {
        return $this->db->insert('brand', $data);
    }
}
