<?php 
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','bitacora');
$con = mysqli_connect(HOST,USER,PASS,DB) 
or die('unable to connect to db');