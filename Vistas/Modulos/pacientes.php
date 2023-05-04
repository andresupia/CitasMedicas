<?php

if($_SESSION["Rol"] != "Secretaria" && $_SESSION["Rol"] != "Doctor" && $_SESSION["Rol"] != "Administrador"){

    echo '<script>

	window.location = "inicio";
	</script>';

    return;

}


?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1>Gestor de Pacientes</h1>

        </section>

        <section class="content">

            <div class="box">

                <div class="box-header">

                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearPaciente">Crear Paciente</button>

                </div>


                <div class="box-body">

                    <table class="table table-bordered table-hover table-striped DT">

                        <thead>

                        <tr>

                            <th>N°</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Foto</th>
                            <th>Contraseña</th>
                            <th>Editar / Borrar</th>

                        </tr>

                        </thead>

                        <tbody>

<?php

$columna = null;
$valor = null;

$resultado = PacientesC::VerPacientesC($columna, $valor);

foreach ($resultado as $key => $value) {

    echo '<tr>
					
            <td>'.($key+1).'</td>
            <td>'.$value["Apellido"].'</td>
            <td>'.$value["Nombre"].'</td>
            <td>'.$value["documento"].'</td>';

    if($value["Foto"] == ""){

        echo '<td><img src="Vistas/img/defecto.png" width="40px"></td>';

    }else{

        echo '<td><img src="'.$value["Foto"].'" width="40px"></td>';

    }


       echo ' <td> No Visible </td>

            <td>

                <div class="btn-group">


                    <button class="btn btn-success EditarPaciente" Pid="'.$value["id"].'" data-toggle="modal" data-target="#EditarPaciente"><i class="fa fa-pencil"></i> Editar</button>

                    <button class="btn btn-danger EliminarPaciente" Pid="'.$value["id"].'" imgP="'.$value["Foto"].'"><i class="fa fa-times"></i> Borrar</button>


                </div>

            </td>

    </tr>';

						}
?>


					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>



<div class="modal fade" rol="dialog" id="CrearPaciente">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Apellido:</h2>

							<input type="text" class="form-control input-lg" name="Apellido" required>

							<input type="hidden" name="rolP" value="Paciente">

						</div>

						<div class="form-group">
							
							<h2>Nombre:</h2>

							<input type="text" class="form-control input-lg" name="Nombre" required>

						</div>

						<div class="form-group">
							
							<h2>Documento:</h2>

							<input type="text" class="form-control input-lg" name="documento" required>

						</div>


						<div class="form-group">
							
							<h2>Contraseña:</h2>

							<input type="password" class="form-control input-lg" name="clave" required>

						</div>

					</div>

				</div>


				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Crear</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php

				$crear = new PacientesC();
				$crear -> CrearPacienteC();

				?>

			</form>

		</div>

	</div>

</div>


<div class="modal fade" rol="dialog" id="EditarPaciente">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Apellido:</h2>

							<input type="text" class="form-control input-lg" id="ApellidoE" name="ApellidoE" required>

							<input type="hidden" id="Pid" name="Pid">

						</div>

						<div class="form-group">
							
							<h2>Nombre:</h2>

							<input type="text" class="form-control input-lg" id="NombreE" name="NombreE" required>

						</div>

						<div class="form-group">
							
							<h2>Documento:</h2>

							<input type="text" class="form-control input-lg" id="documentoE" name="documentoE" required>

						</div>

						<div class="form-group">
							
							<h2>Contraseña:</h2>

							<input type="password" class="form-control input-lg" id="claveE" name="claveE" required>

						</div>

					</div>

				</div>


				<div class="modal-footer">
					
					<button type="submit" class="btn btn-success">Guardar Cambios</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php

				$actualizar = new PacientesC();
				$actualizar -> ActualizarPacienteC();

				?>

			</form>

		</div>

	</div>

</div>


<?php

$borrarP = new PacientesC();
$borrarP -> BorrarPacienteC();