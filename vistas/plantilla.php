
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
                if($vistas=="login"||$vistas=="404"||$vistas=="home"){
                    require_once "./vistas/contenidos/".$vistas."-view.php";
                }else{
                    /* session_start(['name'=>'STI']); */
                     require_once "./controladores/loginControlador.php";
                    $lc = new loginControlador();
                    
            
                    if(!isset($_SESSION['nombre_sti']) || !isset($_SESSION['apellPat_sti']) || !isset($_SESSION['id_sti'])){
                        echo $lc->forzar_cierre_sesion_controlador();
                        exit();
                    }
                    include $vistas;
                }

                include "inc/footer.php";
                
                

            ?>        

            <?php 
            include "./vistas/inc/LogOut.php";
            include "inc/Script.php"; 
            
            ?>
            <script>
                $(function () {
                function timeChecker() {
                    setInterval(function () {
                        var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
                        timeCompare(storedTimeStamp);
                    }, 3000);
                }

                function timeCompare(timeString) {
                    var maxMinutes = 1; //GREATER THEN 1 MIN.
                    var currentTime = new Date();
                    var pastTime = new Date(timeString);
                    var timeDiff = currentTime - pastTime;
                    var minPast = Math.floor(timeDiff / 60000);

                    if (minPast >= maxMinutes) {
                        sessionStorage.removeItem("lastTimeStamp");
                        console.log("sesion terminada");
                        window.location = "vistas/inc/autologout.php";
                        return false;
                    } else {
                        //JUST ADDED AS A VISUAL CONFIRMATION
                        console.log(
                        currentTime + " - " + pastTime + " - " + minPast + " min past"
                        );
                    }
                }

                if (typeof Storage !== "undefined") {
                    $(document).mousemove(function () {
                        var timeStamp = new Date();
                        sessionStorage.setItem("lastTimeStamp", timeStamp);
                    });

                    timeChecker();
                }
                });                
            </script>
            
        </body>
    
    </html>