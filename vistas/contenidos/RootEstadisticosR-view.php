     <?php include "../inc/navRoot.php"; ?>
    <div class="register-photo">
        <div id="importcsvregis" class="form-container">
            <form id="regisTutcsv" method="post">
                <h2 class="text-center"><strong>Estadísticos</strong></h2>
                <div class="form-group"><label>Seleccione Tipo de Gráfica</label><select class="form-control"><option value="undefined" selected="">Tipo de Grafica</option><option value="12">Barras</option><option value="13">Dispersión</option><option value="14">Pastel</option></select><label>Seleccione Periodo escolar</label>
                    <select
                        class="form-control">
                        <option value="undefined" selected="">Periodo</option>
                        <option value="12">Enero-Junio2020</option>
                        <option value="13">Agosto-Diciembre2020</option>
                        <option value="14">Enero-Junio2019</option>
                        </select><label>Seleccione Carrera</label><select class="form-control"><option value="undefined" selected="">Carrera</option><option value="12">Ingeniería en Sistemas</option><option value="13">Ingenieria Civil</option><option value="14">Ingeniería en Informatica</option><option value="">Ingeniería en Mecatronica</option><option value="">Ingeniería Electrica</option><option value="">Arquitectura</option><option value="">Contaduria</option><option value="">Ingenieria en Gestion Empresarial</option><option value="">Todos</option></select><label>Seleccione el tipo de Sexo</label>
                        <select
                            class="form-control">
                            <option value="12" selected="">Genero</option>
                            <option value="13">Hombres</option>
                            <option value="14">Mujeres</option>
                            <option value="">Ambos</option>
                            </select><label>Seleccione la Situación</label><select class="form-control"><option value="12" selected="">Situación</option><option value="13">Bajas</option><option value="14">Altas</option></select></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">Generar grafica</button></div>
                <div class="form-group"><a href="../Registro.html"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">IMPRIMIR</button></a></div>
            </form>
        </div>
        <div id="cont-visdat" class="form-container">
            <form method="post"><img class="border rounded-0 border-primary" id="imgreg" src="../assets/img/grafica.jpg">
                <div class="form-group"><label>GRAFICA TIPO : PERIODO : SEXO : SITUACION</label></div>
            </form>
        </div>
    </div>
    