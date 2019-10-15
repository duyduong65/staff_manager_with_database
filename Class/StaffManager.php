<?php


class StaffManager
{
    protected $staffDB;

    public function __construct()
    {
        $db = new ConnectDB("mysql:host=localhost;dbname=staffManager", "root", "khongbiet1");
        $this->staffDB = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM staffs";
        $stmt = $this->staffDB->query($sql);
        $stmt = $stmt->fetchAll();
        $staffs = [];
        foreach ($stmt as $value) {
            $staff = new Staff($value['name'], $value['phone']);
            $staff->setId($value['id']);
            array_push($staffs, $staff);
        }
        return $staffs;
    }

    public function addStaff($staff)
    {
        $sql = "INSERT INTO staffs (name , phone) VALUES (:name ,:phone)";
        $stmt = $this->staffDB->prepare($sql);
        $stmt->bindParam(":name", $staff->getName());
        $stmt->bindParam(":phone", $staff->getPhone());
        $stmt->execute();
    }

    public function deleteStaffById($id)
    {
        $sql = "DELETE FROM staffs WHERE id=? ";
        $stmt = $this->staffDB->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    public function findStaffById($id)
    {
        $sql = "SELECT name,phone FROM staffs WHERE id = ? ";
        $stmt = $this->staffDB->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $staffs = $stmt->fetch();
        $name = $staffs['name'];
        $phone = $staffs['phone'];
        $staff = new Staff($name, $phone);
        return $staff;
    }

    public function updateInformation($id, $student)
    {
        $sql = "UPDATE staffs SET name=:name ,phone=:phone WHERE id=:id ";
        $stmt = $this->staffDB->prepare($sql);
        $stmt->bindParam(":name", $student->getName());
        $stmt->bindParam(":phone", $student->getPhone());
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }


}

$manager = new StaffManager();