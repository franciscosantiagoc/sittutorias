<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <title>SELECT ANIDADO</title>
  </head>
  <body>
        <div class="col-lg-12" style="padding-top:8px;">
           <div class="card">
                <div class="card-header">
                    SELECT ANIDADO
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="">Departamento:</label>
                            <select class="js-example-basic-single" name="state" id="sel_departamento" style="width:100%">
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Provincia:</label>
                            <select class="js-example-basic-single" name="state" id="sel_provincia"  style="width:100%">
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Distrito:</label>
                            <select class="js-example-basic-single" name="state" id="sel_distrito"  style="width:100%">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  </body>
</html>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="../js/console_ubigeo.js"></script>
    <script>
    // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            listar_departamento();
        });

        $("#sel_departamento").change(function(){
            var iddepartamento = $("#sel_departamento").val();
            listar_pronvincia(iddepartamento);
        })

        $("#sel_provincia").change(function(){
            var idprovincia = $("#sel_provincia").val();
            listar_distrito(idprovincia);
        })
    </script>