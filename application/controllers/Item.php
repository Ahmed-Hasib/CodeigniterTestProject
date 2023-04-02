<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_item');
        $this->load->model('M_model');
    }


    public function index()
    {

        $data['allModels'] = $this->M_item->getModelByNameAsc();



        $data['allBrands'] = $this->M_model->getBrandByNameAsc();
        $data['allItems'] = $this->M_item->getItems();



        $title = "Model Page";
        $data['title'] = $title;
        $this->load->view('include/header', $data);
        $this->load->view('pageItem');
        $this->load->view('include/footer');
    }

    function addItemPost()
    {
        $insertStatus = false;
        if (isset($_POST['brand_id']) && isset($_POST['name']) && isset($_POST['model_id'])) {
            $brand_id = $_POST['brand_id'];
            $itemName = $_POST['name'];
            $model_id = $_POST['model_id'];
            $status = $this->M_item->checkItem($brand_id, $model_id, $itemName);
            if (count($status) > 0) {
                $insertStatus = "Item already exists";
            } else {
                $insertStatus = $this->M_item->insertItem($_POST);
            }
        }
        echo $insertStatus;
    }

    function updateItemPost()
    {

        $updateStatus = false;
        if (isset($_POST['brand_id']) && isset($_POST['model_id']) && isset($_POST['id']) && isset($_POST['name'])) {

            $brand_id = $_POST['brand_id'];
            $model_id = $_POST['model_id'];
            $id = $_POST['id'];
            $name = $_POST['name'];
            $items = $this->M_item->checkItem($brand_id, $model_id, $name);
            if (count($items) > 0) {
                $updateStatus = "Item exists";
                foreach ($items as $item) {
                    if ($item->id == $id) {

                        $updateStatus = $this->M_item->updateItem($id, $brand_id, $model_id, $name);
                    }
                }
            } else {

                $updateStatus = $this->M_item->updateItem($id, $brand_id, $model_id, $name);
            }

            echo $updateStatus;
        }
    }

    function deleteModel()
    {
        if (isset($_GET['id'])) {
            $status = $this->M_item->deleteItem($_GET['id']);
            if ($status) {
                $this->session->set_flashdata('deleteItemStatus', 'Item deleted successfully');
            }
            redirect("Item");
        }
    }
}
