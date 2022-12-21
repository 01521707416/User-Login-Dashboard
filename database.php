<?php
/* This page has been created in order to keep database information. We will be storing database information here and call this file name where we need using the "require_once" method. */

/* db_info */
$db_host_name = 'localhost';        /* hostname for mysql local server */
$db_user_name = 'root';             /* default usename is "root" for mysql local server */
$db_password = '';                  /* password initially remains null */
$db_name = 'register_database';     /* the database name which I have created in php myadmin */

/* database connection building */
$db_connection = mysqli_connect($db_host_name, $db_user_name, $db_password, $db_name);
