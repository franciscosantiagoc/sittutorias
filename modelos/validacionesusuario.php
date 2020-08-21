<?php
require_once "mainModel.php";

public static function ValidaCorreo($dato){
    $sql=mainModel::conectar()->prepare("select COUNT Correo from persona where Correo={$dato}");
    $sql->execute();
    if ($sql->rowCount()==0){
        return echo "Datos validos";
    }   
    else{
        $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"El correo ya existente",
            "Tipo"=>"Error"
        ];
        }
}
$Correo="correo@gmail.com";
ValidaCorreo($Correo);

public static function ValidaTelefono($dato){
    $sql=mainModel::conectar()->prepare("select COUNT NTelefono from persona where NTelefono={$dato}");
    $sql->execute();
    if ($sql->rowCount()==0){
       
    }   
    else{
        $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"Numero de telefono ya existente",
            "Tipo"=>"Error"
        ];

        }
}
}
$NTelefono="9711262381";
ValidaTelefono($NTelefono);

public static function ValidaMatricula($dato){
    $sql=mainModel::conectar()->prepare("select COUNT Matricula from trabajador where Matricula={$dato}");
    $sql->execute();
    if ($sql->rowCount()==0){
        return echo "Datos validos";
    }   
    else{
        $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"La matricula ya existente",
            "Tipo"=>"Error"
        ];
        }
}
$Matricula="262381";
ValidaMatricula($Matricula);

public static function ValidaTrabajador_idPersona($dato){
    $sql=mainModel::conectar()->prepare("select COUNT Trabajador_idPersona from trabajador where Trabajador_idPersona={$dato}");
    $sql->execute();
    if ($sql->rowCount()==0){
        return echo "Datos validos";
    }   
    else{
        $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"Id persona ya existente",
            "Tipo"=>"Error"
        ];
        }
}
$Tutorado_idPersona="262381";
ValidaTutorado_idPersona($Tutorado_idPersona);

public static function ValidaTutorado_NControl($dato){
    $sql=mainModel::conectar()->prepare("select COUNT NControl from tutorado where NControl={$dato}");
    $sql->execute();
    if ($sql->rowCount()==0){
        return echo "Datos validos";
    }   
    else{
        $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"Id Tutorado ya existente",
            "Tipo"=>"Error"
        ];
        }
}
$NControl="16190439";
ValidaTutorado_NControl($NControl);

public static function ValidaTutorado_idPersona($dato){
    $sql=mainModel::conectar()->prepare("select COUNT Tutorado_idPersona from tutorado where Tutorado_idPersona={$dato}");
    $sql->execute();
    if ($sql->rowCount()==0){
        return echo "Datos validos";
    }   
    else{
        $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"Numero de congtrol ya existente",
            "Tipo"=>"Error"
        ];
        }
}
$Tutorado_idPersona="262381";
ValidaTutorado_idPersona($Tutorado_idPersona);

