<?php

require_once '../config/connect.php';


class infoModel {

    // get all product
    public function getAllinfo() {
        $sql = "SELECT * FROM info";
        $result = Database::query($sql);
        return $result;
    }

    // get product by id
    public function getinfoById($id) {
        $sql = "SELECT * FROM info WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    public function addinfo($product_name, $images_products,$price,$pagraph, $status,$id_info) {
        $sql = "INSERT INTO info(name, image,price,pagraph,id_info,status) VALUES ('$product_name','$images_products','$price','$pagraph','$id_info' ,'$status')";
        $result = Database::query($sql);
        return $result;
    }
    

    // edit product
    public function editinfo($id,$product_name,$images_products, $price, $pagraph, $status,$id_info) {
        $sql = "UPDATE info SET name = '$product_name', image = '$images_products', price = '$price', pagraph = '$pagraph', id_info = '$id_info', status = '$status' WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    

    // delete product
    public function deleteinfo($id) {
        $sql = "DELETE FROM info WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
}