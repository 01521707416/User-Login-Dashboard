<?php
require_once '../database.php';
// print_r($_GET);

$id = $_GET['message_id'];

$update_query = "UPDATE guest_messages SET read_status = 2 WHERE id = $id";
mysqli_query($db_connection, $update_query);
header('location: guest_message.php');
