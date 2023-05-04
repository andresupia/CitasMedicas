<?php

if($_SESSION["Rol"] != "Paciente"){

    echo '<script>

	window.location = "inicio";
	</script>';

    return;

}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>Gestor de Perfil</h1>

    </section>


    <section class="content">

        <div class="box">

            <div class="box-body">

                <table class="table table-bordered table-hover table-striped">

                    <thead>

                    <tr>


                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Foto</th>
                        <th>Documento</th>
                        <th>Contraseña</th>

                        <th>Editar</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php

                    $perfil = new PacientesC();
                    $perfil -> VerPerfilPacienteC();

                    ?>




                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>