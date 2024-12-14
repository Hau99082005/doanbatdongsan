<?php

require_once '../config/connect.php';


class contactModel {

    // get all product
    public function getAllcontact() {
        $sql = "SELECT * FROM contacts";
        $result = Database::query($sql);
        return $result;
    }

    // get product by id
    public function getcontactById($id) {
        $sql = "SELECT * FROM contacts WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    public function addcontact($email,$message, $created_at, $name) {
        $sql = "INSERT INTO contacts (email,message,created_at,name) VALUES ('$email', '$message','$created_at','$name')";
        $result = Database::query($sql);
        return $result;
    }
    

    // edit product
    public function editcontact($id, $email,$message, $created_at, $name) {
        $sql = "UPDATE contacts SET email = '$email', message = '$message', created_at = '$created_at',name = '$name' WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    

    // delete product
    public function deletecontacts($id) {
        $sql = "DELETE FROM contacts WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
}