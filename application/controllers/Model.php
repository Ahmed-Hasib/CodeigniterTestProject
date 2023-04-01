<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_model');
    }


    public function index()
    {

        $data['allModels'] = $this->M_model->getModel();
        $data['allBrands'] = $this->M_model->getBrandByNameAsc();

        $title = "Model Page";
        $data['title'] = $title;
        $this->load->view('include/header', $data);
        $this->load->view('pageModel');
        $this->load->view('include/footer');
    }

    function addModelPost()
    {
        $insertStatus = false;
        if (isset($_POST['brand_id']) && isset($_POST['name'])) {
            $brand_id = $_POST['brand_id'];
            $model_name = $_POST['name'];
            $status = $this->M_model->checkModel($brand_id, $model_name);
            if ($status) {
                $insertStatus = "Model already exists on this brand";
            } else {
                $insertStatus = $this->M_model->insertModel($_POST);
            }
        }
        echo $insertStatus;
    }
    function updateModelPost()
    {
        echo "<pre>";
        print_r($_POST);
    }
}
