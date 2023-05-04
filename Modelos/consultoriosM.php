<?php

require_once "ConexionBD.php";

class consultorioSM extends ConexionBD{

    //CREAR CONSULTORIOS

    static public function crearConsultorioM($tablaBD, $consultorio){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO  $tablaBD(Nombre) VALUES (:nombre)");

        $pdo -> bindParam(":nombre", $consultorio["nombre"], PDO::PARAM_STR);

        if ($pdo -> execute()){

            return true;
        }else{
            return false;
        }

        $pdo -> close();
        $pdo = null;
    }

    //VER CONSULTORIOS

    static public function VerConsultoriosM($tablaBD, $columna, $valor){

        if ($columna ==  null){

            $pdo = conexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

            $pdo -> execute();

            return $pdo -> fetchAll();
        }else{

            $pdo = conexionBD::cBD()->prepare("SELECT *FROM $tablaBD WHERE $columna = :$columna");

            $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
            $pdo ->execute();

            return $pdo ->fetch();
        }
    }

    //ELIMINAR CONSULTORIOS

    static public function BorrarConsultioM($tablaBD,$id){

        $pdo = conexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        if ($pdo ->execute()){
            return true;
        }else{
            return false;
        }

        $pdo ->colse();
        $pdo = null;
    }

    //EDITAR CONSULTORIOS

    static public function EditarConsultoriosM($tablaBD, $id){

        $pdo = conexionBD::cBD()->prepare("SELECT id, Nombre FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_INT);

        $pdo ->execute();

        return $pdo ->fetch();

        $pdo -> close();
        $pdo = null;
    }

    //ACTUALIZAR CONSULTORIOS

    static public function ActualizarConsultoriosM($tablaBD, $datosC){

        $pdo = conexionBD::cBD()->prepare("UPDATE $tablaBD SET Nombre = :Nombre WHERE id =:id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":Nombre", $datosC["Nombre"], PDO::PARAM_STR);

        if ($pdo ->execute()){
            return true;
        }else{
            return false;
        }

        $pdo ->colse();
        $pdo = null;

    }
}