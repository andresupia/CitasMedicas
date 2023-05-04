<?php

if($_SESSION["Rol"] != "Secretaria"){

	echo '<script>

	window.location = "inicio";
	</script>';

	return;
}
?>

<div class="content-wrapper">

    <section class="content-header">

        <h1> Gestor de Perfil</h1>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">

                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Contraseña</th>
                            <th>Foto</th>
                            <th>Editar</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                    $perfil = new secretariasC();
                    $perfil -> VerPerfilSecretariaC();
                    ?>

                    </tbody>
                </table>
            </div>

        </div>

    </section>
</div>
