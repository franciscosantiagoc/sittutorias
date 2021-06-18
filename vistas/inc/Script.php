<script src="<?php echo SERVERURL;?>vistas/assets/js/jquery.min.js"></script>
<script src="<?php echo SERVERURL;?>vistas/assets/bootstrap/js/bootstrap.min.js"></script>


<script>
   $(document).ready(function() {
      $('.tablas').DataTable({
         responsive: true,
         "language": {
                     "sProcessing":     "Procesando...",
                     "sLengthMenu":     "Mostrar _MENU_ registros",
                     "sZeroRecords":    "No se encontraron resultados",
                     "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                     "sInfo":           "Mostrando _START_ al _END_ de _TOTAL_ registros",
                     "sInfoEmpty":      "Mostrando del 0 al 0 de 0 registros",
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
   });
</script>
<!-- <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script> -->
<!-- <script src="<?php echo SERVERURL;?>vistas/datatables/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo SERVERURL;?>vistas/datatables/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo SERVERURL;?>vistas/datatables/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="<?php echo SERVERURL;?>vistas/datatables/datatables.net-bs/js/responsive.bootstrap.min.js"></script>  -->


<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>









<script src="<?php echo SERVERURL;?>vistas/assets/js/Table-With-Search.js"></script>

<script> //funcion para checar el tiempo de inactividad del usuario en tiempo en tiempo real
    /* $(function() {
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
   }); */
</script>