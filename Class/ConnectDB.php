<?php


class ConnectDB
{
    protected $dsn;
    protected $userName;
    protected $password;

    public function __construct($dsn, $userName, $password)
    {
        $this->dsn = $dsn;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function connect()
    {
        $connect = null;
        try {
            $connect = new PDO($this->dsn, $this->userName, $this->password);
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
        return $connect;
    }
}