<?php
require_once '../database.php';

//print_r($_POST);

$black_head = $_POST['black_head'];
$blue_head = $_POST['blue_head'];
$service_sub_head = $_POST['service_sub_head'];

$insert_query = "INSERT INTO service_heads(black_head, blue_head, service_sub_head) VALUES('$black_head', '$blue_head', '$service_sub_head')";
mysqli_query($db_connection, $insert_query);
header('location: service_head.php');
