<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ASSOC</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="http://localhost/ClinicaSantaLucia/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://localhost/ClinicaSantaLucia/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="http://localhost/ClinicaSantaLucia/Vistas/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://localhost/ClinicaSantaLucia/Vistas/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="http://localhost/ClinicaSantaLucia/Vistas/dist/css/skins/_all-skins.min.css">

    <!--data tables -->
    <link rel="stylesheet" href="http://localhost/ClinicaSantaLucia/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="http://localhost/ClinicaSantaLucia/Vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- full calendar -->
    <link rel="stylesheet" href="http://localhost/ClinicaSantaLucia/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="http://localhost/ClinicaSantaLucia/Vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini login-page">
<!-- Site wrapper -->

    <?php

    if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"]== true){

        echo '<div class="wrapper">';

        // CABECERA

        include "Modulos/cabecera.php";

        if ($_SESSION["Rol"] == "Secretaria"){

            include "Modulos/menuSecretaria.php";

        }elseif ($_SESSION["Rol"] == "Paciente"){

            include "Modulos/menuPaciente.php";

        }elseif ($_SESSION["Rol"] == "Doctor") {

            include "Modulos/menuDoctor.php";
        }elseif ($_SESSION["Rol"] == "Administrador") {

            include "Modulos/menuAdmin.php";
        }

        // MENU LATERAL


        $url = array();

        if (isset($_GET["url"])) {

            $url = explode("/",$_GET["url"]);

            if ($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "perfil-Secretaria" || $url[0] == "perfil-S"
                || $url[0] == "consultorios" || $url[0] == "E-C" || $url[0] == "doctores" || $url[0] == "pacientes"
                || $url[0] == "perfil-Paciente" || $url[0] == "perfil-P" || $url[0] == "Ver-consultorios" || $url[0] == "Doctor"
                || $url[0] == "historial" || $url[0] == "perfil-Doctor" || $url[0] == "perfil-D" || $url[0] == "citas" || $url[0] == "perfil-Administrador"
                || $url[0] == "perfil-A" || $url[0] == "secretarias") {

                include "Modulos/".$url[0].".php";

            }else{
                //die();
            }

        }else{

            include "Modulos/inicio.php";

        }

        echo '</div>';

    }

    else if(isset($_GET["url"])) {

        if ($_GET["url"] == "seleccionar") {

            include "Modulos/seleccionar.php";

        } elseif ($_GET["url"] == "ingreso-Secretaria") {
            include "Modulos/ingreso-Secretaria.php";

        } elseif ($_GET["url"] == "ingreso-Paciente") {
            include "Modulos/ingreso-Paciente.php";

        } elseif ($_GET["url"] == "ingreso-Doctor") {
            include "Modulos/ingreso-Doctor.php";

        }elseif ($_GET["url"] == "ingreso-Administrador") {
            include "Modulos/ingreso-Administrador.php";

        }else {

            include "Modulos/seleccionar.php";
        }
    }

    ?>
    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->


    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://localhost/ClinicaSantaLucia/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/ClinicaSantaLucia/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://localhost/ClinicaSantaLucia/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/ClinicaSantaLucia/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/ClinicaSantaLucia/Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/ClinicaSantaLucia/Vistas/dist/js/demo.js"></script>
<!-- fullCalendar -->
<script src="http://localhost/ClinicaSantaLucia/Vistas/bower_components/moment/moment.js"></script>
<script src="http://localhost/ClinicaSantaLucia/Vistas/bower_components/fullcalendar/dist/fullcalendar.js"></script>
<script src="http://localhost/ClinicaSantaLucia/Vistas/bower_components/fullcalendar/dist/locale/es.js"></script>

<!--data tables -->
<script src="http://localhost/ClinicaSantaLucia/Vistas/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="http://localhost/ClinicaSantaLucia/Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://localhost/ClinicaSantaLucia/Vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="http://localhost/ClinicaSantaLucia/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<script src="http://localhost/ClinicaSantaLucia/Vistas/js/doctores.js"></script>
<script src="http://localhost/ClinicaSantaLucia/Vistas/js/pacientes.js"></script>
<script src="http://localhost/ClinicaSantaLucia/Vistas/js/secretarias.js"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    });

    var date = new Date();
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear();

    $('#calendar').fullCalendar({
        hiddenDays: [0,6],
        defaultView:'agendaWeek',

        events:[
                <?php

                    $resultado = citasC::VerCitasC();
                    foreach ($resultado AS $key => $value){

                        if ($value["id_doctor"] ==  substr($_GET["url"], 7)){

                            echo '{
                            
                            id:'.$value["id"].',
                            titlle: "'.$value["nyaP"].'",
                            start: "'.$value["inicio"].'",
                            end: "'.$value["fin"].'",
                            
                            },';
                        }elseif ($value["id_doctor"] ==  substr($_GET["url"], 6)){

                            echo '{
                            
                            id:'.$value["id"].',
                            titlle: "'.$value["nyaP"].'",
                            start: "'.$value["inicio"].'",
                            end: "'.$value["fin"].'",
                            
                            },';
                        }
                    }

                ?>

        ],

        <?php

        if ($_SESSION["Rol"] == "Paciente"){

            $columna ="id";
            $valor = substr($_GET["url"],7);

            $resultado = doctoresC::DoctorC($columna, $valor);

            echo 'scrollTime: "'.$resultado["horarioE"].'",
                minTime:"'.$resultado["horarioE"].'",
                maxTime: "'.$resultado["horarioS"].'",';

        }elseif ($_SESSION["Rol"] == "Doctor"){

            $columna ="id";
            $valor = substr($_GET["url"],6);

            $resultado = doctoresC::DoctorC($columna, $valor);

            echo 'scrollTime: "'.$resultado["horarioE"].'",
                minTime:"'.$resultado["horarioE"].'",
                maxTime: "'.$resultado["horarioS"].'",';
        }
        ?>

        dayClick:function(date, jsEvent, view) {

            $('#CitaModal').modal();

            var fecha = date.format();

            var hora2 = ("01:00:00").split(":");

            fecha = fecha.split("T");

            var dia  = fecha[0];

            var hora = (fecha[1].split(":"));

            var h1 = parseFloat(hora[0]);
            var h2 = parseFloat(hora2[0]);

            var horafinal = h1+h2;

            $('#horaC').val(h1+":00:00");

            $('#fechaC').val(dia);

            $('#fyhIC').val(fecha[0]+" "+h1+":00:00");

            $('#fyhFC').val(fecha[0]+" "+horafinal+":00:00");
        }
    })
</script>
</body>
</html>
