<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_brand');
    }


    public function index()
    {

        $data['allBrands'] = $this->M_brand->getBrand();

        $title = "Brand Page";
        $data['title'] = $title;
        $this->load->view('include/header', $data);
        $this->load->view('pageBrand');
        $this->load->view('include/footer');
    }
    function addBrandPost()
    {
        $status = "";
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = $_POST['name'];
            $status = $this->M_brand->checkBrand($name);
            if (count($status) > 0) {
                $status = "Brand name already exists";
            } else {
                $status = $this->M_brand->insertBrand($_POST);
            }
        }

        echo $status;
    }

    function updateBrandPost()
    {
        $updateStatus = false;

        if (isset($_POST['id']) && isset($_POST['name'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $brands = $this->M_brand->checkBrand($name);

            if (count($brands) > 0) {
                $updateStatus = "Brand exists";
                foreach ($brands as $brand) {
                    if ($brand->id == $id) {
                        $updateStatus = $this->M_brand->updateBrand($id, $name);
                    }
                }
            } else {
                $updateStatus = $this->M_brand->updateBrand($id, $name);
            }
        }

        echo $updateStatus;
    }
    function deleteBrand()
    {
        if (isset($_GET['id'])) {
            $status = $this->M_brand->deleteBrand($_GET['id']);
            if ($status) {
                $this->session->set_flashdata('deleteBrandStatus', 'Brand deleted successfully');
            }
            redirect("brand");
        }
    }
}
