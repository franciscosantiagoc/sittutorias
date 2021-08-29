<script>
    //notif=0;
    nidentificacion='<?php if(isset($_SESSION['matricula_sti'])) echo $_SESSION['matricula_sti']; else echo $_SESSION['NControl_sti']; ?>';

    function notificaciones() {
        //console.log('llamada de notificaciones')
        var datos = new FormData();
        datos.append("idnotifi",nidentificacion);
        $.ajax({
            url: "ajax/notificacionAjax.php",
            method: "post",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(resp){
                //console.log('Respuesta notif'+resp);
                if(resp){
                    for(i=0;i<resp.length;i++) {
                        Swal.fire({
                            position: 'bottom-end',
                            type: 'info',
                            title: resp[i]['Mensaje'],
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                }

            }
        });
    }
    //notificaciones();
   setInterval(notificaciones,2000);
</script>


