<?php
require_once "../config/APP.php";

$peticionAjax = true;
if(isset($_POST['idInfoTES'])){
    require_once "../controladores/tutoresController.php";
    $ins_informacionCArea = new tutoresController();
    $respuesta= $ins_informacionCArea->consulta_t_unico($_POST['idInfoTES']);
    echo json_encode($respuesta);
}else {
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}
?>