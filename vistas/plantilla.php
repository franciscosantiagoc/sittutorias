
<!DOCTYPE html>
    <html lang="es">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">   
            <title><?php echo COMPANY;?></title>
            <?php include "inc/styles.php" ?>
        </head>
    
        <body>
            <?php
                $peticionAjax=false;
                require_once "./controladores/viewController.php";
                $IV = new viewController();      
                $vistas = $IV->obtener_vistas_controlador();
                if($vistas=="login"||$vistas=="404"){
                    require_once "./vistas/contenidos/".$vistas."-view.php";
                }else{
                    /* session_start(['name'=>'STI']); */
                     require_once "./controladores/loginControlador.php";
                    $lc = new loginControlador();
                    
            
                    if(!isset($_SESSION['nombre_sti']) || !isset($_SESSION['apellPat_sti']) || !isset($_SESSION['id_sti'])){
                        echo $lc->forzar_cierre_sesion_controlador();
                        exit();
                    }/* */
                    include $vistas;
                }

                include "inc/footer.php";
                

            ?>        

            <?php include "inc/Script.php" ?>
        </body>
    
    </html>