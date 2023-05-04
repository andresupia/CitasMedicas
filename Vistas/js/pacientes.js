$(".DT").on("click", ".EliminarPaciente", function(){

    var Pid = $(this).attr("Pid");
    var imgP = $(this).attr("imgP");

    window.location = "index.php?url=pacientes&Pid="+Pid+"&imgP="+imgP;

})


$(".DT").on("click", ".EditarPaciente", function(){

    var Pid = $(this).attr("Pid");
    var datos = new FormData();

    datos.append("Pid", Pid);

    $.ajax({

        url: "Ajax/pacientesA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado){
            $("#Pid").val(resultado["id"]);
            $("#ApellidoE").val(resultado["Apellido"]);
            $("#NombreE").val(resultado["Nombre"]);
            $("#documentoE").val(resultado["documento"]);
            $("#claveE").val(resultado["clave"]);

        }

    })

})


$("#documento").change(function(){

    $(".alert").remove();

    var documento = $(this).val();
    var datos = new FormData();
    datos.append("Norepetir", documento);

    $.ajax({

        url: "Ajax/pacientesA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado){

            if(resultado){

                $("#documento").parent().after('<div class="alert alert-danger">El Documento ya existe.</div>');

                $("#documento").val("");

            }

        }

    })

})


$("#documentoE").change(function(){

    $(".alert").remove();

    var documento = $(this).val();
    var datos = new FormData();
    datos.append("Norepetir", documento);

    $.ajax({

        url: "Ajax/pacientesA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado){

            if(resultado){

                $("#documentoE").parent().after('<div class="alert alert-danger">El Documento ya existe.</div>');

                $("#documentoE").val("");

            }

        }

    })

})








