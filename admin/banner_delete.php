<?php
session_start();
require_once '../database.php';

$id = $_GET['banner_id'];

$get_banner_location_query = "SELECT image_location FROM banners WHERE id=$id";
$from_db = mysqli_query($db_connection, $get_banner_location_query);
$after_assoc = mysqli_fetch_assoc($from_db);
print_r($after_assoc['image_location']);

unlink('../' . $after_assoc['image_location']);

$delete_query = "DELETE from banners WHERE id=$id";
mysqli_query($db_connection, $delete_query);

header('location: banner.php');
