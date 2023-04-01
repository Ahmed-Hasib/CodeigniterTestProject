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
        echo "<pre>";
        print_r($_POST);
    }
}
