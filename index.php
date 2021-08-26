<?php
    require_once "./config/APP.php";
    require_once "./controladores/viewController.php";
    //session_start(['name'=>'STI']);
    $plantilla = new viewController();
    $plantilla->get_plantilla_controller();
?>