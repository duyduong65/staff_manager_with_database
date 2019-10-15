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
<form action="CRUD/addStaff.php" method="get">
    <table>
        <tr>
            <td>
                <input type="text" name="name" placeholder="Input Name Staff">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="phone" placeholder="Input Phone Number">
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Add"></td>
        </tr>
    </table>
    <table border="1px">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td colspan="3">Phone Number</td>
        </tr>
        <?php
        include_once "Class/ConnectDB.php";
        include_once "Class/StaffManager.php";
        include_once "Class/Staff.php";

        $staffs = $manager->getAll();
        foreach ($staffs as $key => $staff): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $staff->getName() ?></td>
                <td><?php echo $staff->getPhone() ?></td>
                <td><a href="CRUD/deleteStaff.php?id=<?php echo $staff->getId()?>">Delete</a></td>
                <td><a href="CRUD/findStaffById.php?id=<?php echo $staff->getId()?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>
</body>
</html>
