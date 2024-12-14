<?php

require_once '../config/connect.php';


class baivietModel {

    // get all product
    public function getAllbaiviet() {
        $sql = "SELECT * FROM baiviet";
        $result = Database::query($sql);
        return $result;
    }
    public function getbaivietById($id) {
        $sql = "SELECT * FROM baiviet WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    public function addbaiviet($title, $pagraph, $images, $status, $id_blog)
    {
        try {
            $sql = "INSERT INTO baiviet (image, title, pagraph, id_blog, status) 
                    VALUES ('$images', '$title', '$pagraph', '$id_blog', '$status')";
            return Database::query($sql);
        } catch (mysqli_sql_exception $e) {
            error_log($e->getMessage()); // Log the error
            throw new Exception("Failed to add article. Please check the data and try again.");
        }
    }
    public function editbaiviet($id, $title,$pagraph, $images, $status,$id_blog) {
        $sql = "UPDATE baiviet SET image = '$images', title = '$title', pagraph = '$pagraph',id_blog = '$id_blog',status  = '$status' WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
    public function deletebaiviet($id) {
        $sql = "DELETE FROM baiviet WHERE id = $id";
        $result = Database::query($sql);
        return $result;
    }
}