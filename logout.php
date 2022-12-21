<?php
session_start();                  /* Started the session function to accept SESSION data */
unset($_SESSION['user_status']);  /* Unsetting SESSION causing loggging out */
header('location: login.php');    /* Getting back to the login page */
