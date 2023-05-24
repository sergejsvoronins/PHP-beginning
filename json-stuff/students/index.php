<?php

$student = array (
    array(
        'name' => "Sergejs", 
        'class' => "WIE22S", 
        'programm' => "Webbutvecklare inom e-handel", 
        'school' => "Medieinstitutet", 
        'personnummer' => "840725-****",
        'mobile' => "07208010**",
        'epost' => "s@v.se"
    ),
    array(
        'name' => "Frej", 
        'class' => "FEU21", 
        'programm' => "Frontend utvecklare", 
        'school' => "Medieinstitutet", 
        'personnummer' => "150725-****",
        'mobile' => "0720834510**",
        'epost' => "f@v.se"
    ),
);

header("Content-Type: application/json");
echo json_encode($student);
