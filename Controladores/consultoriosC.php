<?php
 class consultoriosC{

     //crear consultorios

     public function crearConsultorioC(){

         if (isset($_POST["consultorioN"])){

             $tablaBD = "consultorios";

             $consultorio = array("nombre"=>$_POST["consultorioN"]);

             $resultado = consultorioSM::crearConsultorioM($tablaBD, $consultorio);

             if ($resultado== true){

                 echo '<script>


                    window.location ="http://localhost/clinica/consultorios";
                 </script>';
             }
         }
     }

     //ver consutorios

     static public function VerConsultoriosC($columna,$valor){

         $tablaBD = "consultorios";

         $resultado = consultorioSM::VerConsultoriosM($tablaBD, $columna, $valor);

         return $resultado;
     }

     //borrar consultorios

     public function BorrarConsultorioC(){


         if (substr($_GET["url"], 13)){

            $tablaBD = "consultorios";

            $id = substr($_GET["url"], 13);

            $resultado = consultorioSM::BorrarConsultioM($tablaBD,$id);

             if ($resultado== true){

                 echo '<script>


                    window.location ="http://localhost/clinica/consultorios";
                 </script>';
             }
         }
     }

     //Editar consultorios

     public function EditarConsultoriosC(){

         $tablaBD = "consultorios";
         $id = substr($_GET["url"], 4);

         $resultado = consultorioSM::EditarConsultoriosM($tablaBD, $id);

         echo ' <div class="form-group">

                <h2>Nombre:</h2>
                <input type="text" class="form-control input-lg" name="consultorioE" value="'.$resultado["Nombre"].'">
                <input type="hidden" class="form-control input-lg" name="Cid" value="'.$resultado["id"].'">

                <br>

                <button class="btn btn-success" type="submit">Guardar Cambios</button>
            </div>';
     }

     //actualizar consultorios

     public function ActualizarConsultoriosC(){

         if (isset($_POST["consultorioE"])){

             $tablaBD = "consultorios";

             $datosC = array("id"=>$_POST["Cid"], "Nombre"=>$_POST["consultorioE"]);

             $resultado = consultorioSM::ActualizarConsultoriosM($tablaBD, $datosC);

             if ($resultado== true){

                 echo '<script>


                    window.location ="http://localhost/clinica/consultorios";
                 </script>';
             }

         }
     }
 }