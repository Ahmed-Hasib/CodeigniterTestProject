<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {

        $title = "Home Page";
        $data['title'] = $title;
        $this->load->view('include/header', $data);
        $this->load->view('pageHome');
        $this->load->view('include/footer');
    }
}
