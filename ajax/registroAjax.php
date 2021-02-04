
<?php

if (isset($_POST['rol'])) {
    require_once "../controladores/usuarioController.php";

    $cadena= "<label>Selecciona Area </label>
    <select id='selectlista' class='form-control' name='selectlista>";
            
    
    $ins_usuario = new usuarioController();
    echo $ins_usuario->selectRegistro_selectArEs();
            
   /*  while($ver=mysqli_fetch_row($result)){
        $cadena=$cadena."<option value='".$ver[0]."'>".$ver[2].'</option>';
    }
    echo $cadena."</select>"; */  // carga los datos html (campos)

}/* 
        $sql="SELECT idCarrera,Nombre FROM carrera "; 

        $cadena= "<label>Selecciona Carrera </label>

        <select id='selectlista'name='selectlista>";

        while($ver=mysqli_fetch_row($result)){
            $cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';

        }

    } */
    
else {
            session_start(['name' => 'STI']);
            session_unset();
            session_destroy();
            header("Location: " . SERVERURL . "login");
            exit();
}

/* echo '<option value="13">Coordinador de Area</option>
                                  <option value="14">Coordinador de Carrera</option>
                                  <option value="15">Tutor</option>
                                  <option value="16">Tutorado</option> 
                                   '; */

?>