<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_item extends CI_Model
{
    function getitems()
    {
        $sql = "SELECT 
        items.name as item_name,
        models.name as model_name, 
        brand.name as brand_name,
        items.entry_date as entry_date,
        brand.id as brand_id,
        models.id as model_id,
        items.id as id FROM items,
        brand,models 
        WHERE items.model_id=models.id 
        and items.brand_id=brand.id
        ORDER BY models.entry_date DESC";


        return  $result = $this->db->query($sql)->result();
    }
    function getModelByNameAsc()
    {
        $sql = "SELECT name,id,brand_id FROM `models` ORDER BY name ASC";
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

    function updateModel($brand_id, $id, $name)
    {
        $this->db->set('name', $name);
        $this->db->set('brand_id', $brand_id);
        $this->db->where('id', $id);

        return $this->db->update('models');
    }

    // 




    function deleteModel($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('models');
    }
}
