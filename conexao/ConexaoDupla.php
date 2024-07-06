<?php

class ConexaoDupla {
    private $conn1;
    private $conn2;

    public function __construct() {
        $this->conn1 = $this->createConnection("127.0.0.1", "agenda", "postgres", "895674");
        $this->conn2 = $this->createConnection("192.168.1.254", "cidade", "postgres", "cidadebd");
    }

    private function createConnection($host, $dbname, $user, $pass) {
        try {
            $conn = new PDO("pgsql:host=$host;dbname=$dbname;user=$user;password=$pass");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return null;
        }
    }

    public function getConnection1() {
        return $this->conn1;
    }

    public function getConnection2() {
        return $this->conn2;
    }
}