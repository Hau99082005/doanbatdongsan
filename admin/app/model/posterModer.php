<?php

require_once '../config/connect.php';


class posterModel {

    // get all product
    public function getAllposter() {
        $sql = "SELECT * FROM haianh";
        $result = Database::query($sql);
        return $result;
    }

    // get product by id
    public function getposterById($id) {
        $sql = "SELECT * FROM haianh WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    public function addposter($images_banner) {
        $sql = "INSERT INTO haianh (image) VALUES ('$images_banner')";
        $result = Database::query($sql);
        return $result;
    }
    

    // edit product
    public function editposter($id, $images_banner) {
        $sql = "UPDATE haianh SET image = '$images_banner' WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    

    // delete product
    public function deleteposter($id) {
        $sql = "DELETE FROM haianh WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
}