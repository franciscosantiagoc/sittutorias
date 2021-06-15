
   let btn_salir=document.querySelector(".logout-sesion");

   btn_salir.addEventListener('click', function(e){
      e.preventDefault();
      Swal.fire({
         title: '¿Quiere salir del sistema?',
         text: "La sesión actual se cerrara y saldra del sistema",
         type: 'question',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si, Salir',
         cancelButtonText: 'Cancelar'
      }).then((result) => {
         if(result.value){
            window.location="index";
            let url='<?php echo SERVERURL; ?>ajax/loginAjax.php';
            let token='<?php echo $lc->encryption($_SESSION['token_sti']); ?>';
            let datos = new FormData();
            datos.append("token",token);
             fetch(url,{
               method: 'POST',
               body: datos
            })
            .then(respuesta => respuesta.json())
            .then(respuesta => {
               return alertas_ajax(respuesta);
            }); 
         }
      })
   });
</script>