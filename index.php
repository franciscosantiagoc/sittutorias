<?php
    require_once "./config/APP.php";
    require_once "./controladores/viewController.php";
    

    $plantilla = new viewController();
    $plantilla->get_plantilla_controller();
?>
