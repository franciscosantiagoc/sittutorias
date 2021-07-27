<?php
    $peticionAjax = true;
    require_once "../config/APP.php";
    require_once "../controladores/estadisticosController.php";
    if (isset($_POST['g_type']) && isset($_POST['g_data']) && isset($_POST['g_period']) && isset($_POST['g_sex'])) {
        $ins_grafica = new estadisticosController();
        $respuesta = $ins_grafica->obtener_grafica_controlador();
        echo  json_encode($respuesta);
    }else {
        session_start(['name' => 'STI']);
        session_unset();
        session_destroy();
        header("Location: " . SERVERURL . "login");
        exit();
     }
