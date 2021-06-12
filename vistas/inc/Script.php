<script src="<?php echo SERVERURL;?>vistas/assets/js/jquery.min.js"></script>
<script src="<?php echo SERVERURL;?>vistas/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script> -->


<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script>
    $(document).ready(function() {
        $('.tablas').DataTable({
            "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                           "sFirst":    "Primero",
                           "sLast":     "Último",
                           "sNext":     "Siguiente",
                           "sPrevious": "Anterior"
                        },
                        "oAria": {
                           "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                           "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                           "copy": "Copiar",
                           "colvis": "Visibilidad"
                        }
                  }
         });
    } );
</script>
<!----> <script src="<?php echo SERVERURL;?>vistas/datatables/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo SERVERURL;?>vistas/datatables/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo SERVERURL;?>vistas/datatables/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo SERVERURL;?>vistas/datatables/datatables.net-bs/js/responsive.bootstrap.min.js"></script> 


<!-- <script src="<?php echo SERVERURL;?>vistas/assets/js/creative.js"></script> -->
<!-- <script src="<?php echo SERVERURL;?>vistas/assets/js/bs-animation.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script> -->
<script src="<?php echo SERVERURL;?>vistas/assets/js/Table-With-Search.js"></script>

    
 </script>
 <!--
 <script>
   function cerrar() {
      document.getElementById("ventmodal").style.display = "none";
   }
</script>-->

<!-- <script> //funcion para checar el tiempo de inactividad del usuario en tiempo en tiempo real
   $(function() {
      function timeChecker() {
         setInterval(function() {
            var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
            timeCompare(storedTimeStamp);
         }, 3000);
      }

      function timeCompare(timeString) {
         var maxMinutes = 15; //GREATER THEN 1 MIN.
         var currentTime = new Date();
         var pastTime = new Date(timeString);
         var timeDiff = currentTime - pastTime;
         var minPast = Math.floor(timeDiff / 60000);
         if (minPast == maxMinutes) {
            sessionStorage.removeItem("lastTimeStamp");
            console.log("sesion terminada");
            window.location = "vistas/inc/autologout.php";
            return false;
         } else {
            //JUST ADDED AS A VISUAL CONFIRMATION
            console.log(minPast);
         }
      }

      if (typeof Storage !== "undefined") {
         $(document).mousemove(function() {
            var timeStamp = new Date();
            sessionStorage.setItem("lastTimeStamp", timeStamp);
         });

         timeChecker();
      }
   });
</script> -->