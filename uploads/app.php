<?php
    require_once "../vendor/autoload.php";
    \App\areas::getInstance(json_decode(file_get_contents("php://input"), true))->getAreas();
    
?>