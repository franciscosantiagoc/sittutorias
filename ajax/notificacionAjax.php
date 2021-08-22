<?php
$peticionAjax=true;
if(isset($_POST['idnotifi'])){
    require_once "../controladores/notificacionesController.php";
    $ins_notif = new notificacionesController();
    echo $ins_notif->consultanotif_controlador();
}else{
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}