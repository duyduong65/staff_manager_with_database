<?php
include_once "../Class/ConnectDB.php";
include_once "../Class/StaffManager.php";
include_once "../Class/Staff.php";

$id = $_GET['id'];

$manager->deleteStaffById($id);

header("Location:../index.php");
