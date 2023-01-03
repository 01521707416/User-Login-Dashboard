<?php
require_once '../database.php';

echo $id = $_GET['banner_id'];

$update_query = "UPDATE banners SET active_status = 1 WHERE id = $id";
mysqli_query($db_connection, $update_query);
header('location: banner.php');
