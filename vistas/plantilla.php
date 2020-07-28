
<!DOCTYPE html>
    <html lang="es">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">   
            <title><?php echo COMPANY;?></title>
            <?php include "inc/styles.php" ?>
        </head>
    
        <body id="page-top">
            <?php
                $peticionAjax=false;
                require_once "./controladores/viewController.php";
                $IV = new viewController();      
                $vistas = $IV->obtener_vistas_controlador();
                if($vistas=="login"||$vistas=="404"){
                    echo "<script>console.log('PHP: if plantilla');</script>";
                    require_once "./vistas/contenidos/".$vistas."-view.php";
                }else{
                    echo "<script>console.log('PHP: else plantilla');</script>";
                    include $vistas;
                }
                

            ?>        



            <?php include "inc/Script.php" ?>
        </body>
    
    </html>