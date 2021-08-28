<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">


   <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
   <title><?php echo COMPANY;?></title>
   <?php include "inc/styles.php" ?>
</head>

<body>
   <?php
        $peticionAjax=false;
        require_once "./controladores/viewController.php";
        $IV = new viewController();
        $vistas = $IV->obtener_vistas_controlador();
        if($vistas=="login"||$vistas=="404"||$vistas=="home"){
            require_once "./vistas/contenidos/".$vistas."-view.php";

        }else{
            /* session_start(['name'=>'STI']);*/ //no funciona debidamente por lo que se coloco en index
           $pagina=explode("/",$_GET['views']); // variable get, tiene todos los parametros de la url, pagina ahhora los tendrá
            require_once "./controladores/loginControlador.php";
           $lc = new loginControlador();

            if(!isset($_SESSION['token_sti']) || !isset($_SESSION['nombre_sti']) || !isset($_SESSION['roll_sti']) || !isset($_SESSION['id_sti'])){
                echo $lc->forzar_cierre_sesion_controlador();
                exit();
            } 
            /*if((time()-$_SESSION['last_time_sti']) > TIMESESSION) {
                $lc = new loginControlador();
                echo $lc->cierre_sesiontiempo_controlador();
                exit();
            } else{
                $_SESSION['last_time_sti'] = time(); //this was the moment of last activity.
            }/**/
 
             include $vistas;

       }
       include "inc/footer.php";
       /* include "inc/LogOut.php";  */
        if(isset($_SESSION['matricula_sti']) || isset($_SESSION['NControl_sti'])) {
            include "inc/notificacion.php";
        }
       include "inc/Script.php";
       
       ?>


</body>

</html>