<?php

if(isset($_SESSION['MySession'])){
    $router = $_SESSION['permission_name'];
    switch($router){
        case 'Administrateur':
            break;
        case 'Modérateur':
            break;
        case 'Auteur':
            break;  
        default:
            break;      
    }
}else {
    require_once PROJECT_DIRECTORY."/controller/publicController.php";
}