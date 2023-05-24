<?php

// Model för tabellen Students

class StudentModel
{
    private $pdo;
    
    function __construct() {
        $host = "localhost";
        $db = "school-api";
        $user = "school-api";
        $password = "qwerty";
        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
        $pdo = new PDO($dsn, $user, $password, $options);
        $this->pdo = $pdo;
    }  

    function getStudents () {
        $stm = $this->pdo->prepare("SELECT students.*, class.name AS class_name FROM students JOIN class ON class.id=students.class_id;");
        $stm->execute();
        return $stm->fetchAll();
    }
    function getStudent (int $id) {
        $stm = $this->pdo->prepare("SELECT students.*, class.name AS class_name FROM students JOIN class ON class.id=students.class_id WHERE students.id = ?;");
        $stm->execute([$id]);
        return $stm->fetchAll();
    }
}