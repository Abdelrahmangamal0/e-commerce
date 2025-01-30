<?php
session_start();
include "../core/function.php";

session_destroy();
header( "location: login.php");
die;

?>