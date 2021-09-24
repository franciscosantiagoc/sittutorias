<?php
$peticionAjax = true;
require_once "../config/APP.php";
require_once "../controladores/usuarioController.php";
//require_once "../controladores/tutoradosController.php";

require_once "../controladores/solicitudesController.php";
if(isset($_POST['solic_tutorado']) && isset($_POST['id_solicitud'])){
$ins_usuario = new solicitudesController();
echo $ins_usuario->solicitudes_tutorado_controlador();

}elseif(isset($_POST['idtutorado_solic'])){

    $ins_usuario = new solicitudesController();
    echo $ins_usuario->ver_tutorado_solic_controlador();
    /*echo 'respuesta';*/
    /*-------------------------------  editar tutorados carrera, generacion  -------------------------------  */
}else {
    session_start(['name' => 'STI']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login");
    exit();
}
?>