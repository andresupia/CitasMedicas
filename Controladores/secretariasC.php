<?php

class secretariasC
{

    //Ingreso Secretaria

    public function IngresarSecretariaC()
    {

        if (isset($_POST["usuario-Ing"])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["contraseña-Ing"])) {

                $tablaBD = "secretarias";

                $datosC = array("Documento" => $_POST["usuario-Ing"], "Contraseña" => $_POST["contraseña-Ing"]);

                $resultado = secretariasM::IngresarSecretariaM($tablaBD, $datosC);

                if ($resultado["Documento"] == $_POST["usuario-Ing"] && $resultado["Contraseña"] == $_POST["contraseña-Ing"]){

                    $_SESSION["Ingresar"] = true;

                    $_SESSION["IdSecretaria"]= $resultado["IdSecretaria"];
                    $_SESSION["Documento"]= $resultado["Documento"];
                    $_SESSION["Nombre"]= $resultado["Nombre"];
                    $_SESSION["Apellido"]= $resultado["Apellido"];
                    $_SESSION["Contraseña"]= $resultado["Contraseña"];
                    $_SESSION["Foto"]= $resultado["Foto"];
                    $_SESSION["Rol"]= $resultado["Rol"];

                    echo '<script>

                window.location = "inicio"
                
                </script>';

                } else{

                    echo '<div class="alert alert-danger">Error al Ingresar </div> ';
                }
            }
        }
    }

    //Ver perfil secretaria
    public function VerPerfilSecretariaC(){

        $tablaBD = "secretarias";

        $id = $_SESSION["IdSecretaria"];

        $resultado = SecretariasM::VerPerfilSecretariaM($tablaBD, $id);

        echo '<tr>
							
				<td>'.$resultado["Documento"].'</td>

				<td>'.$resultado["Contraseña"].'</td>

				<td>'.$resultado["Nombre"].'</td>

				<td>'.$resultado["Apellido"].'</td>';

        if($resultado["Foto"] != ""){

            echo '<td><img src="http://localhost/clinica/Vistas/img/'.$resultado["Foto"].'" class="img-responsive" width="40px"></td>';

        }else{

            echo '<td><img src="http://localhost/clinica/Vistas/img/defecto.png" class="img-responsive" width="40px"></td>';

        }


        echo '<td>
						
					<a href="http://localhost/clinica/perfil-S/'.@$resultado["IdSecretaria"].'">
						
						<button class="btn btn-success"><i class="fa fa-pencil"></i></button>

					</a>

				</td>

			</tr>';

    }

    //editar perfil

    public function EditarPerfilSecretariaC(){

        $tablaBD = "secretarias";

        $id = $_SESSION["IdSecretaria"];

        $resultado = SecretariasM::VerPerfilSecretariaM($tablaBD, $id);

        echo '<form method="post" enctype="multipart/form-data">

                    <div class="row">

                        <div class="col-md-6 col-xs-12">

                            <h2>Nombre:</h2>
                            <input type="text" class="input-lg" name="nombreP" value="'.$resultado["Nombre"].'">
                            <input type="hidden" class="input-lg" name="idP" value="'.$resultado["IdSecretaria"].'">

                            <h2>Apellido:</h2>
                            <input type="text" class="input-lg" name="apellidoP" value="'.$resultado["Apellido"].'">

                            <h2>Documento:</h2>
                            <input type="text" class="input-lg" name="documentoP" value="'.$resultado["Documento"].'">

                            <h2>Contraseña:</h2>
                            <input type="text" class="input-lg" name="contraseñaP" value="'.$resultado["Contraseña"].'">

                        </div>

                        <div class="col-md-6 col-xs-12">

                            <br><br>
                            <input type="file" name="imgP">
                            <br>';

                            if ($resultado["Foto"] == ""){

                                echo '<img src="http://localhost/clinica/Vistas/img/defecto.png" width="200px;">';
                            }else{

                                echo '<img src="http://localhost/clinica/'.$resultado["Foto"].'" width="200px;">';

                            }

                            echo ' <input type="hidden" name="imgActual" value="'.$resultado["Foto"].'">

                            <br><br>

                            <button type="submit" class="btn btn-success">Guardar Cambios</button>

                        </div>

                    </div>

                </form>';

    }

    // actualizar perfil secretaria

    public function ActualizarPerfilSecretariaC(){

        if (isset($_POST["idP"])){

            $rutaImg = $_POST ["imgActual"];

            if (isset($_FILES["imgP"]["tmp_name"]) && !empty($_FILES["imgP"]["tmp_name"])){

                if (!empty($_POST ["imgActual"])){

                    unlink($_POST ["imgActual"]);
                }

                if ($_FILES["imgP"]["tmp_name"] == "image/jpeg"){

                    $Nombre = mt_rand(10,99);
                    $rutaImg = "Vistas/img/Secretaria/S-".$Nombre.".jpg";
                    $Foto =imagecreatefromjpeg($_FILES["imgP"]["tmp_name"]);

                    imagejpeg($Foto, $rutaImg);
                }
                if ($_FILES["imgP"]["tmp_name"] == "image/png"){

                    $Nombre = mt_rand(10,99);
                    $rutaImg = "Vistas/img/Secretaria/S-".$Nombre.".png";
                    $Foto =imagecreatefrompng($_FILES["imgP"]["tmp_name"]);

                    imagepng($Foto, $rutaImg);
                }

            }

            $tablaBD = "secretarias";

            $datosC = array("IdSecretarias"=> $_POST["idP"], "Documento"=> $_POST["documentoP"],"Nombre"=> $_POST["nombreP"],"Apellido"=> $_POST["apellidoP"],
                "Contraseña"=> $_POST["contraseñaP"], "Foto"=> $rutaImg);

            $resultado = secretariasM::ActualizarPerfilSecretariaM($tablaBD, $datosC);


            if ($resultado == true){

                echo '<script>
                
                window.location = "http://localhost/clinica/perfil-S/'.$_SESSION["IdSecretaria"].'";
                
                </script>';
            }
        }
    }

    //Mostrar Secretarias
    static public function VerSecretariasC(){

        $tablaBD = "secretarias";

        $resultado = SecretariasM::VerSecretariasM($tablaBD);

        return $resultado;

    }

//Crear Secretarias
    public function CrearSecretariaC(){

        if(isset($_POST["rolS"])){

            $tablaBD = "secretarias";

            $datosC = array("Nombre"=>$_POST["Nombre"], "Apellido"=>$_POST["Apellido"], "Documento"=>$_POST["Documento"], "Contrasena"=>$_POST["Contraseña"],
                "Rol"=>$_POST["rolS"]);

            $resultado = SecretariasM::CrearSecretariaM($tablaBD, $datosC);

            if($resultado == true){

                echo '<script>

				window.location = "secretarias";
				</script>';

            }

        }

    }

    //Borrar Secretarias
    public function BorrarSecretariaC(){

        if(isset($_GET["Sid"])){

            $tablaBD = "secretarias";

            $id = $_GET["Sid"];

            if($_GET["imgS"] != ""){

                unlink($_GET["imgS"]);

            }

            $resultado = SecretariasM::BorrarSecretariaM($tablaBD, $id);

            if($resultado == true){

                echo '<script>

				window.location = "secretarias";
				</script>';

            }

        }

    }

}
