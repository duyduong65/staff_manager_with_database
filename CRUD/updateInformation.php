<?php
include_once "../Class/ConnectDB.php";
include_once "../Class/StaffManager.php";
include_once "../Class/Staff.php";

$id = $_GET['id'];
$phone = $_GET['phone'];
$name = $_GET['name'];
$staff = new Staff($name, $phone);

$manager->updateInformation($id,$staff);

header("Location:../index.php");
