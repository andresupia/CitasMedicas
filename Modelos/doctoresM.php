<?php

require_once "ConexionBD.php";

class DoctoresM extends ConexionBD
{

    //Crear Doctor
    static public function CrearDoctorM($tablaBD, $datosC)
    {

        $statement = "INSERT INTO $tablaBD(apellido, nombre, sexo, id_consultorio, documento, clave, Rol) VALUES(:apellido, :nombre, :sexo, :id_consultorio, :documento, :clave, :Rol)";
        var_dump($statement);
        $pdo = ConexionBD::cBD()->prepare( $statement );



        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
        $pdo->bindParam(":id_consultorio", $datosC["id_consultorio"], PDO::PARAM_INT);
        $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":Rol", $datosC["Rol"], PDO::PARAM_STR);

        var_dump($pdo);

        if ($result = $pdo->execute()) {
            return true;
        }
    var_dump($datosC);
        $pdo->close();
        $pdo = null;

    }


    //Mostrar Doctor
    static public function VerDoctoresM($tablaBD, $columna, $valor)
    {

        if ($columna != null) {

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetchAll();

        } else {

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

            $pdo->execute();

            return $pdo->fetchAll();

        }

        $pdo->close();
        $pdo = null;

    }


    //Editar Doctor
    static public function DoctorM($tablaBD, $columna, $valor){

        if ($columna != null) {

            $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetch();


            $pdo->close();
            $pdo = null;
        }


    }


    //Actualizar Doctor
    static public function ActualizarDoctorM($tablaBD, $datosC)
    {

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, sexo = :sexo, documento = :documento, clave = :clave WHERE id = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
        $pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();
        $pdo = null;

    }


    //Eliminar Doctor
    static public function BorrarDoctorM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, pdo::PARAM_INT);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }


    //Iniciar sesión doctor
    static public function IngresarDoctorM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT  clave, apellido, nombre, sexo, foto, documento, Rol, id FROM $tablaBD 
          WHERE documento = :documento AND clave = :clave");

        $pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }


    //Ver Perfil Doctor
    static public function VerPerfilDoctorM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("SELECT  clave, apellido, nombre, sexo, foto, documento, Rol, id, horarioE, horarioS, id_consultorio FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $id, PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }



    //Actualizar Perfil Doctor
    static public function ActualizarPerfilDoctorM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET id_consultorio = :id_consultorio, apellido = :apellido, nombre = :nombre, foto = :foto,
          documento = :documento, clave = :clave, horarioE = :horarioE, horarioS = :horarioS WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_consultorio", $datosC["consultorio"], PDO::PARAM_INT);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
        $pdo -> bindParam(":horarioE", $datosC["horarioE"], PDO::PARAM_STR);
        $pdo -> bindParam(":horarioS", $datosC["horarioS"], PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }



}