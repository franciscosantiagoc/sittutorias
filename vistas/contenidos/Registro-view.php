<?php
    /* if(roll==coordinadorA) */ 
        include "./vistas/inc/navCoordinadorC.php"; 
    /*elseif(roll==coordinadorC)
        include "inc/navCoordinadorC.php"; 
    */
    
?>
<div class="register-photo">
    <div class="form-container">
        <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php"  method="POST" data-form="save" autocomplete="off">
            <img id="imgreg" src="vistas/assets/img/meeting.jpg">
            <h2 class="text-center"><strong>Crear Cuenta</strong></h2>
            <div class="form-group">
                <select class="form-control" name="select_user">
                    <option value="" selected="">Seleccione el tipo de usuario a registrar</option>
                    <option value="15">Tutor</option>
                    <option value="16">Tutorado</option>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Nombre" name="name">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Apellido Paterno" name="apellidop">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Apellido Materno" name="apellidom">
            </div>
            <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input class="form-control" name="registro_fecha" type="date">
            </div> 
            <div class="form-group">
                <select class="form-control" name="registro_sexo">
                    <option value="" selected="">Sexo</option>
                    <option value="1">Hombre</option>
                    <option value="2">Mujer</option>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="tel" placeholder="Número de Telefono" name="numero_tel">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Dirección" name="direccion">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <select class="form-control" name="registro_carrera">
                    <option value="" selected="">Carrera</option>
                    <option value="13">Arquitectura</option>
                    <option value="14">Informatica</option>
                    <option value="15">Ingenieria Civil</option>
                    <option value="16">Ingenieria en Sistemas Computacionales</option>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Numero de Control" name="no_ctrl">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Registrar</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary btn-block">Importar csv</a>
            </div>
        </form>
    </div>

    <div id="contain">
        <div id="importcsvregis" class="form-container">
            <form id="regisTutcsv" method="post"><img id="imgreg" src="vistas/assets/img/meeting.jpg">
                <h2 class="text-center"><strong>Importar Docentes</strong></h2>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">Importar</button></div>
                <div class="form-group"><input class="form-control" type="text" id="nameinput" placeholder="Nombre" name="name"></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Apellidos"></div>
                <div class="form-group"><select class="form-control"><option value="" selected="">Area</option><option value="13">Arquitectura</option><option value="14">Informatica</option><option value="15">Ingenieria Civil</option><option value="16">Ingenieria en Sistemas Computacionales</option></select></div>
                <div class="form-group"><input class="form-control" type="text" placeholder="Numero de Control"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: rgb(245,124,56);">Buscar</button></div>
            </form>
        </div>
        <div class="table-container col-md-12 search-table-col">
            <div class="form-group pull-right col-lg-4">
                <input type="text" class="search form-control" placeholder="Escriba el dato de búsqueda">
            </div>
            <span class="counter pull-right"></span>
            <div class="table-responsive table-bordered table table-hover table-bordered results">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary bill-header cs">
                        <tr>
                            <th id="trs-hd" class="col-lg-1"><br><strong>Nombre</strong><br></th>
                            <th id="trs-hd" class="col-lg-2"><br><strong>Apellido Paterno</strong><br></th>
                            <th id="trs-hd" class="col-lg-3"><br><strong>Apellido Materno</strong><br></th>
                            <th id="trs-hd" class="col-lg-2"><br><strong>Edad</strong><br></th>
                            <th id="trs-hd" class="col-lg-2"><br><strong>MatrÍcula</strong><br></th>
                            <th id="trs-hd" class="col-lg-2"><br>Carrera</th>
                            <th id="trs-hd" class="col-lg-2"><br>Periodo</th>
                            <th id="trs-hd" class="col-lg-2"><br>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Francisco</td>
                            <td>Santiago</td>
                            <td>de la Cruz</td>
                            <td>23</td>
                            <td>16190437<br></td>
                            <td>Ingenieria en Sistemas<br></td>
                            <td>Junio 2016-Enero 2021<br></td>
                            <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                        </tr>
                        <tr>
                            <td>Luis Alberto</td>
                            <td>Robles</td>
                            <td>Parada</td>
                            <td>23<br></td>
                            <td>16190359</td>
                            <td>Ingenieria en Sistemas<br></td>
                            <td>Junio 2016-Enero 2021<br></td>
                            <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                        </tr>
                        <tr>
                            <td>Juan Carlos</td>
                            <td>Fernández</td>
                            <td>Piñón</td>
                            <td>23<br></td>
                            <td>16190439</td>
                            <td>Ingenieria en Sistemas<br></td>
                            <td>Junio 2016-Enero 2021<br></td>
                            <td><button class="btn btn-success bg-primary" style="margin-left: 5px;" type="submit"><i class="fa fa-edit" style="font-size: 15px;"></i></button><button class="btn btn-danger" style="margin-left: 5px;" type="submit"><i class="fa fa-trash" style="font-size: 15px;"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group" id="div-regis"><button class="btn btn-primary btn-block" id="btn-regis" type="submit" style="background-color: rgb(245,124,56);">Registrar</button></div>
        </div>
    </div>
</div>