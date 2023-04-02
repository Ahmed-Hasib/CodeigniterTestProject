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

        $updateStatus = false;
        if (isset($_POST['brand_id']) && isset($_POST['id']) && isset($_POST['name'])) {
            $brand_id = $_POST['brand_id'];
            $id = $_POST['id'];
            $name = $_POST['name'];
            $models = $this->M_model->checkModel($brand_id, $name);
            if (count($models) > 0) {
                $updateStatus = "Model exists";
                foreach ($models as $model) {
                    if ($model->id == $id) {
                        $updateStatus = $this->M_model->updateModel($brand_id, $id, $name);
                    }
                }
            } else {
                $updateStatus = $this->M_model->updateModel($brand_id, $id, $name);
            }

            echo $updateStatus;
        }
    }

    function deleteModel()
    {
        if (isset($_GET['id'])) {
            $status = $this->M_model->deleteModel($_GET['id']);
            if ($status) {
                $this->session->set_flashdata('deleteModelStatus', 'Model deleted successfully');
            }
            redirect("Model");
        }
    }
}
