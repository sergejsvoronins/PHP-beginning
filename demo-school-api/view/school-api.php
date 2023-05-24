<?php

// View för student-modellen, denna outputar JSON

class SchoolAPI
{
    public function outputStudents (array $students) {
        $json = [
            "student-count" => count($students),
            "result" => $students
        ];
        header("Content-Type: application/json");
        echo json_encode($json);
    }
    public function outputStudent (array $student) {
        header("Content-Type: application/json");
        echo json_encode($student);
    }
}