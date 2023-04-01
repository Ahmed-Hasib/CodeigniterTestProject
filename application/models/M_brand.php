<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_brand extends CI_Model
{
    function getBrand()
    {
        $this->db->order_by("entry_date", "desc");
        return $this->db->get('brand')->result();
    }

    function checkBrand($name)
    {
        $this->db->where("name", $name);
        return $this->db->get('brand')->result();
    }
    function insertBrand($data)
    {
        return $this->db->insert('brand', $data);
    }

    function updateBrand($id, $name)
    {
        $this->db->set('name', $name);
        $this->db->where('id', $id);
        return $this->db->update('brand');
    }
    function deleteBrand($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('brand');
    }
}
