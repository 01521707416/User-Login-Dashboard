<?php
session_start();
require_once('database.php');
//print_r($_POST);

$guest_name = $_POST['guest_name'];
$guest_email = $_POST['guest_email'];
$guest_message = $_POST['guest_message'];

$insert_query = "INSERT INTO guest_messages(guest_name, guest_email, guest_message) VALUES('$guest_name', 
            '$guest_email', '$guest_message')";

mysqli_query($db_connection, $insert_query);
$_SESSION['sent_success'] = "Message sent seccuessfully!";
header('loaction: index.php');
