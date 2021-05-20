<?php
defined('BASEPATH') or exit("No direct script access allowed");

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("UserModel");
        $this->load->library("session");
        
        $this->sessionUser = $this->session->userdata("user");
    }
    

    public function index()
    {
        if($this->sessionUser !=null){
            redirect("dashboard");
        }else{
            $this->load->view("template/header");
            $this->load->view("login");
            $this->load->view("template/footer");
        }
            
    }

    #regionLOGIN
    public function login()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $user = $this->UserModel->authenticate($username, $password);
        if ($user == null){
            $this->session->set_flashdata("response", true);
            $this->session->set_flashdata("message", "Invalid account!");
            redirect();
        } else {
            $this->session->set_userdata(array("user" => $user));
            redirect("dashboard");
        }
        // var_dump($user);
    }
    #endregion

    #region LOGOUT
    public function logout()
    {
        if ($this->sessionUser !=null){
            $this->session->sess_destroy();
            redirect();
        }
    }
    #endregion

    #endregion

    public function addRole()
    {
        $data = $_POST;
        $res = $this->UserModel->insert($data);
        if ($res) {
            echo json_encode(array(
                "status" => true,
                "message" => "success"
            ));
        }else{
            echo json_encode(array(
                "status" => false,
                "message" => "failed"
            ));
        }
    }


    #endregion LOAD RULES


    public function loadRoles(){
        echo json_encode($this->UserModel->getRoles());

    }
    #endregion


    #region  ADD USER
    public function addUser(){
        // var_dump($_FILES);
        // var_dump($_POST);
        

        $data = $_POST;
        $userTable = $this->db->list_fields('users'); //get all columns in in the table
        // var_dump($userTable);

        foreach($data as $key => $value){

            $index = array_search($key,$userTable);
            if($index === false){
                unset($data[$key]);
                }
        }
        // var_dump($data);
    #endregion

    //uploading IMAGES
        if($_FILES['upload_user_image']['name']== ""){ //user did not upload image
            //CREATE IMAGE
            $date = new DateTime();
            $filename = $_POST["first_name"] . $date->getTimestamp(). ".jpeg";
            $this->createImage($_POST['dataURI'], "users", $filename);
            $data['image'] = $filename;

        }else{
            //UPLOAD IMAGE
            $filename = $_FILES["upload_user_image"]["name"];
            move_uploaded_file($_FILES['upload_user_image']["tmp_name"],"./assets/images/users/" . $filename);
            $data['image'] = $filename;
        }

        $data['password'] = hash("sha512",$_POST['password']);
        $res = $this->UserModel->addUser($data);

        if($res){
            echo json_encode(array(
                "status" => true,
                "message" => "success"
            ));
            return;
        }
        echo json_encode(array(
            "status" => false,
            "message" => "failed"
        ));
    }

    //CREATING IMAGE
    public function createImage($image, $dir, $filename)
    {
        $data = base64_decode(preg_replace("#^data:image/\w+;base64,#i", "", $image));
        file_put_contents("./assets/images/" . $dir . "/" . $filename, $data);
    }
    

    //#region UPLOAD IMAGE
    public function imageUpload($file, $filename)
    {
        
    }


    //#endregion


    #region
    public function loadUsers(){
        echo json_encode($this->UserModel->loadUsers());
    }

    #endregion

}
