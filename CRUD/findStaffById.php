<?php

include_once "../Class/ConnectDB.php";
include_once "../Class/StaffManager.php";
include_once "../Class/Staff.php";

$id = $_GET['id'];
$staff = $manager->findStaffById($id);
$name = $staff->getName();
$phone = $staff->getPhone();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="../CRUD/updateInformation.php" method="get">
    <table>
        <tr style="display: none">
            <td>
                <input type="text" name="id" value="<?php echo $id ?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="name" placeholder="Input Name Staff" value="<?php echo $name?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="phone" placeholder="Input Phone Number" value="<?php echo $phone?>">
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Update"></td>
        </tr>
    </table>
    <table border="1px">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td colspan="3">Phone Number</td>
        </tr>
        <?php
        include_once "../Class/ConnectDB.php";
        include_once "../Class/StaffManager.php";
        include_once "../Class/Staff.php";

        $staffs = $manager->getAll();
        foreach ($staffs as $key => $staff): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $staff->getName() ?></td>
                <td><?php echo $staff->getPhone() ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>
</body>
</html>

