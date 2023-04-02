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
        echo "<pre>";
        print_r($_POST);
    }
}
