<?php
class db {

    public $host  = 'localhost';
    public $user  = 'root';
    public $pass  = '';
    public $dbase = 'crudnative';
    public $db;

    public function __construct() {
         $this->connection();
    }

    public function connection() {
        $this->db = new mysqli($this->host,$this->user,$this->pass,$this->dbase);
    }
    //Insert Data
    public function insertupdate($id,$lastname,$firstname,$middlename) {
        $fields = implode(',',array('lastname','firstname','middlename'));
        $query = $this->db->query("SELECT firstname FROM crud_account_tbl WHERE firstname = '$firstname'");
        $check = $query->num_rows;
        if($check > 0 && empty($id)) {
          $this->duplicated();
        } else {
          if(empty($id)) {
            $this->db->query("INSERT INTO crud_account_tbl ($fields) VALUES ('$lastname','$firstname','$middlename')");
            $this->success();
          } else {
            $this->db->query("UPDATE crud_account_tbl SET firstname = '$firstname', lastname = '$lastname', middlename = '$middlename' WHERE id = ".$id);
            $this->updated();
          }
        }
    }

    //Delete Data by id
    public function delete($id) {
        $query = $this->db->query("DELETE FROM crud_account_tbl WHERE id =".$id);
        $query ? $this->success() : null;
    }

    //Select data by id
    public function select($id) {
        $query = $this->db->query("SELECT * FROM crud_account_tbl WHERE id =".$id);
        foreach ($query as $key => $value) {
            $result['data'] = array($value['id'], $value['lastname'], $value['firstname'], $value['middlename']);
        }
        echo json_encode($result);
    }

    //Select all data from database
    public function show() {
        $query = $this->db->query("SELECT * FROM crud_account_tbl");
        return $query;
    }

    // costum method for $_POST[] with validation
    public function post($data) {
        return $this->validate($data);
    }

    // costum method for $_GET[] with validation
    public function get($data) {
        return $this->validate($data);
    }

    //  convert all characters / symbols to string
    public function validate($data) {
        return $this->db->real_escape_string(htmlentities($data));
    }

    public function duplicated() {
      echo json_encode(array('notification' => 'duplicated'));
    }

    public function updated() {
      echo json_encode(array('notification' => 'updated'));
    }

    public function success() {
      echo json_encode(array('notification' => 'success'));
    }

}
