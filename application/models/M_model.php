<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_model extends CI_Model
{
    function getModel()
    {
        $sql = "SELECT models.name,
        brand.name as brand_name,
        models.entry_date as entry_date,
        brand.id as brand_id,
        models.id as model_id FROM `models`,
        brand WHERE brand.id=models.brand_id 
        ORDER BY models.entry_date ASC";


        return  $result = $this->db->query($sql)->result();
    }
    function getBrandByNameAsc()
    {
        $sql = "SELECT name,id FROM `brand` ORDER BY name ASC";
        return  $result = $this->db->query($sql)->result();
    }
    function checkModel($id, $model_name)
    {

        $this->db->where("brand_id", $id);
        $this->db->where("name", $model_name);
        return $this->db->get('models')->result();
    }
    function insertModel($data)
    {
        return $this->db->insert('models', $data);
    }


    // 

    function checkBrand($name)
    {
        $this->db->where("name", $name);
        return $this->db->get('Brand')->result();
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
