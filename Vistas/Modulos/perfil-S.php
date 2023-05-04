<?php

if($_SESSION["Rol"] != "Secretaria"){

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
                $editarPerfil = new secretariasC();
                $editarPerfil -> EditarPerfilSecretariaC();
                $editarPerfil -> ActualizarPerfilSecretariaC();

                ?>






            </div>

        </div>

    </section>

</div>