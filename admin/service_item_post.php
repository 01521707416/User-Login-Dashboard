<?php
session_start();
require_once '../database.php';
// print_r($_POST);
$service_item_head = $_POST['service_item_head'];
$service_item_detail = $_POST['service_item_detail'];

$uploaded_image_original_name = $_FILES['service_item_image']['name'];
$uploaded_image_original_size = $_FILES['service_item_image']['size'];

if ($uploaded_image_original_size <= 2000000) {
    $after_explode = explode('.', $uploaded_image_original_name);
    $image_extension = end($after_explode);
    $allowed_extension = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'heif', 'HEIF');
    if (in_array($image_extension, $allowed_extension)) {

        $insert_query = "INSERT INTO service_items (service_item_head, service_item_detail, image_location) 
        VALUES ('$service_item_head', '$service_item_detail', 'primary location')";
        mysqli_query($db_connection, $insert_query);

        $id_from_db = mysqli_insert_id($db_connection);
        $image_new_name = $id_from_db . '.' . $image_extension;
        $save_location = "../uploads/service/" . $image_new_name;
        move_uploaded_file($_FILES['service_item_image']['tmp_name'], $save_location);
        $image_location = "uploads/service/" . $image_new_name;

        $update_query = "UPDATE service_items SET image_location='$image_location' WHERE id=$id_from_db";
        mysqli_query($db_connection, $update_query);
        header('location: service_item.php');
    } else {

        echo "Image field is empty!";
    }
} else {
    echo "File size is too large! Maximum limit is 2 MB.";
}
