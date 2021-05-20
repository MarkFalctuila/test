<?php defined("BASEPATH") or exit ("No direct script access allowed");

class Registration extends CI_Controller
{
    private $sessionUser;

    public function __construct(){

        parent:: __construct();
        $this->load->helper("url");
        $this->load->library("session");
        $this->load->model("UserModel");

        $this->sessionUser = $this->session->userdata("user");
    }
    public function index(){

        $data['user'] = $this->sessionUser;
        $data['roles'] = $this->UserModel ->getRoles();
        $this->load->view("template/header");
        $this->load->view("template/sidebar");
        $this->load->view("registration",$data);
        $this->load->view("template/footer");
    }
}