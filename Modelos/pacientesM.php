<?php

require_once "ConexionBD.php";

class PacientesM extends ConexionBD{

    //Crear Paciente
    static public function CrearPacienteM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(apellido, nombre, documento, clave, Rol) VALUES (:apellido, :nombre,  :documento, :clave, :Rol)");

        $pdo -> bindParam(":apellido", $datosC["Apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["Nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":Rol", $datosC["Rol"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }



    //Ver Paciente
    static public function VerPacientesM($tablaBD, $columna, $valor){

        if($columna == null){

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellido ASC");

            $pdo -> execute();

            return $pdo -> fetchAll();

        }else{

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY apellido ASC");

            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

            $pdo -> execute();

            return $pdo -> fetch();

        }

        $pdo -> close();
        $pdo = null;

    }



    //Borrar Paciente
    static public function BorrarPacienteM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }



    //Actualizar Paciente
    static public function ActualizarPacienteM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre,  documento = :documento, clave = :clave WHERE id = :id");

        $pdo -> bindParam("id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam("apellido", $datosC["Apellido"], PDO::PARAM_STR);
        $pdo -> bindParam("nombre", $datosC["Nombre"], PDO::PARAM_STR);
        $pdo -> bindParam("documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo -> bindParam("clave", $datosC["clave"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }


    //ingreso de los pacientes

    static public function IngresarPacienteM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT  Nombre, Apellido, Foto, documento,clave , Rol, id FROM $tablaBD WHERE documento = :documento");

        $pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }


    //Ver Perfil del Paciente
    static public function VerPerfilPacienteM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("SELECT  Nombre, Apellido, Foto, documento,clave , Rol, id FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }

    //actualizar perfil paciente

    static public function ActualizarPerfilPacienteM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET documento = :documento, clave = :clave, Nombre = :nombre,
              Apellido = :apellido, Foto = :foto  WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["Nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["Apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":foto", $datosC["Foto"], PDO::PARAM_STR);


        if ($pdo -> execute()){

            return true;
        }

        $pdo -> close();
        $pdo = null;
    }


}