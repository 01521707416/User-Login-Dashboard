<?php
session_start();

require_once '../database.php';

$id = $_GET['id'];

$update_query = "UPDATE service_heads SET active_status = 2 WHERE id != $id";
$update_query2 = "UPDATE service_heads SET active_status = 1 WHERE id = $id";
mysqli_query($db_connection, $update_query);
mysqli_query($db_connection, $update_query2);
header('location: service_head.php');
