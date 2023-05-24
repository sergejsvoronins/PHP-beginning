<?php
require "model/student-model.php";
require "view/school-api.php";
$studentModel = new StudentModel();
$schoolApi = new SchoolAPI();

if(isset($_GET["action"])){
    if($_GET["action"] == "students"){
        $schoolApi->outputStudents($studentModel->getStudents());
    }
}
if(isset($_GET["student-id"])){
    $studentId = $_GET["student-id"];
    $schoolApi->outputStudent($studentModel->getStudent($studentId));
}

