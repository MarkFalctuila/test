<?php
defined('BASEPATH') or exit("No direct script access allowed");

class UserModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    #region AUTHENTICATE user
    public function authenticate($username, $password)
    {
        // $this->db->where(array("username" => $username, "password" => hash('sha512', $password)));
        // $res = $this->db->get("users")->row();// null or array object (result)
        // return $res;
        $res = $this->db->query("SELECT * FROM users WHERE username = ? AND password = ?", array($username, hash("sha512", $password)))->row();
        return $res;
    }
    #endregion

    public function getRoles()
    {
        return $this->db->query("Select id,name FROM roles;")->result();
    }


    #region
    public function insert($data)
    {
        $this->db->insert("roles", $data);
        return $this->db->affected_rows();
    }
    #endregion

    #region
    public function addUser($data){
        $this->db->insert("users", $data);
        return $this->db->affected_rows();
    }
    #endregion   

    //#region
        public function loadUsers(){
            $query = $this->db->query("Call loadUsers_sp();");
            $res = $query->result();

            // $query ->next_result();
            // $query ->free_result();

            return $res;
        }

    //#endregion
}
