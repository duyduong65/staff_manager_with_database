<?php
include_once "../Class/ConnectDB.php";
include_once "../Class/StaffManager.php";
include_once "../Class/Staff.php";

$phone = $_GET['phone'];
$name = $_GET['name'];
$staff = new Staff($name, $phone);
$manager->addStaff($staff);

header("Location:../index.php");