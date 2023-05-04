<?php

require_once "conexionBD.php";

class SecretariasM extends ConexionBD{

    //ingreso secretarias

    static public function IngresarSecretariaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT Documento, Nombre, Apellido, Contraseña, foto, Foto, Rol, IdSecretaria FROM $tablaBD WHERE Documento = :Documento");

        $pdo -> bindParam(":Documento", $datosC["Documento"], PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }

    //Ver perfil secretaria
    static public function VerPerfilSecretariaM($tablaBD, $IdSecretaria){

        $pdo = ConexionBD::cBD()->prepare("SELECT  Documento, Nombre, Apellido, Contraseña, foto, Foto, Rol, IdSecretaria FROM $tablaBD WHERE IdSecretaria = :IdSecretaria");

        $pdo -> bindParam(":IdSecretaria", $IdSecretaria, PDO::PARAM_INT);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }

    // Actualizar perfil secretaria

    static public function ActualizarPerfilSecretariaM($tablaBD, $datosC){

        $Rol = "Secretaria";

        $Query = "UPDATE $tablaBD SET Documento = :Documento, Contraseña =:Contrasena, Nombre = :Nombre, Apellido = :Apellido, Foto = :Foto, Rol = :Rol  WHERE IdSecretaria = :IdSecretaria";
        $pdo = ConexionBD::cBD() ->prepare($Query);
        $pdo -> bindParam(":IdSecretaria", $datosC["IdSecretarias"], PDO::PARAM_INT);
        $pdo -> bindParam(":Documento", $datosC["Documento"], PDO::PARAM_STR);
        $pdo -> bindParam(":Nombre", $datosC["Nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":Apellido", $datosC["Apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":Contrasena", $datosC["Contraseña"], PDO::PARAM_STR);
        $pdo -> bindParam(":Foto", $datosC["Foto"], PDO::PARAM_STR);
        $pdo -> bindParam(":Rol", $Rol, PDO::PARAM_STR);

        if ($pdo -> execute()){

            return true;
        }else{

            return false;
        }

        $pdo -> close();
        $pdo = null;
    }

    //Mostrar Secretarias
    static public function VerSecretariasM($tablaBD){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY Apellido ASC");

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo -> close();
        $pdo = null;

    }

//Crear Secretarias
    static public function CrearSecretariaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (Nombre, Apellido, Documento, Contraseña, Rol) 
          VALUES (:Nombre, :Apellido, :Documento, :Contrasena, :Rol)");

        $pdo -> bindParam(":Nombre", $datosC["Nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":Apellido", $datosC["Apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":Documento", $datosC["Documento"], PDO::PARAM_STR);
        $pdo -> bindParam(":Contrasena", $datosC["Contrasena"], PDO::PARAM_STR);
        $pdo -> bindParam(":Rol", $datosC["Rol"], PDO::PARAM_STR);

        if($pdo -> execute()){

            return true;

        }else{

            return false;

        }

        $pdo -> close();
        $pdo = null;

    }

    //Borrar Secretarias
    static public function BorrarSecretariaM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE IdSecretaria = :IdSecretaria");

        $pdo -> bindParam(":IdSecretaria", $id, PDO::PARAM_INT);

        if($pdo -> execute()){

            return true;

        }else{

            return false;

        }

        $pdo -> close();
        $pdo = null;

    }

}