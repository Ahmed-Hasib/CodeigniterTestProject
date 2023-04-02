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
}
