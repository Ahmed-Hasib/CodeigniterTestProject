<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {

        $title = "MOdel Page";
        $data['title'] = $title;
        $this->load->view('include/header', $data);
        $this->load->view('pageHome');
        $this->load->view('include/footer');
    }
}
