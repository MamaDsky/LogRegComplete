<?php
session_start();
require 'connect.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: index.php");