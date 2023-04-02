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
        ORDER BY items.entry_date DESC";


        return  $result = $this->db->query($sql)->result();
    }
    function getModelByNameAsc()
    {
        $sql = "SELECT name,id,brand_id FROM `models` ORDER BY name ASC";
        return  $result = $this->db->query($sql)->result();
    }





    function checkItem($brand_id, $model_id, $itemName)
    {

        $this->db->where("model_id", $model_id);
        $this->db->where("brand_id", $brand_id);
        $this->db->where("name", $itemName);
        return $this->db->get('items')->result();
    }
    function insertItem($data)
    {
        return $this->db->insert('items', $data);
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
