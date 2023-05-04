<?php

if($_SESSION["Rol"] != "Doctor"){

    echo '<script>

	window.location = "inicio";
	</script>';

    return;

}

?>

<div class="content-wrapper">

    <section class="content">

        <div class="box">

            <div class="box-body">

                <?php

                $editarPerfil = new doctoresC();
                $editarPerfil -> EditarPerfilDoctorC();
                $editarPerfil -> ActualizarPerfilDoctorC();

                ?>



            </div>

        </div>

    </section>

</div>