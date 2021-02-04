
    <script src="<?php echo SERVERURL;?>vistas/assets/js/jquery.min.js"></script>
    <script src="<?php echo SERVERURL;?>vistas/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo SERVERURL;?>vistas/assets/js/creative.js"></script>
    <script src="<?php echo SERVERURL;?>vistas/assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="<?php echo SERVERURL;?>vistas/assets/js/Table-With-Search.js"></script>
    <script src="<?php echo SERVERURL;?>vistas/assets/js/sweetalert2.min.js"></script>
    <script src="<?php echo SERVERURL;?>vistas/assets/js/alertas.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="../js/console_ubigeo.js"></script>
   
    <script> 
        function cerrar() {
            document.getElementById("ventmodal").style.display = "none";
        }   
    </script>

    <script>
                $(function () {
                function timeChecker() {
                    setInterval(function () {
                        var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
                        timeCompare(storedTimeStamp);
                    }, 3000);
                }

                function timeCompare(timeString) {
                    var maxMinutes = 10; //GREATER THEN 1 MIN.
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
