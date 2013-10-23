$(document).ready(function(){
    $("#conectar").button().click(function(){conectar();});
    $("#accordion" ).accordion({
      heightStyle: "content",
      collapsible:true
    });
    $("#admin").tabs();
    $("#vendedor").tabs();
    $("#btnGuardar").button().click(function(){btnGuardar();});
    $("#actualizar").button().click(function(){actualizar();});
    $("#cerrar_sesion").button().click(function(){cerrarSesion();});
    cargaCategorias();
    actualizar();
    verificaLogin();
});
function cerrarSesion(){
    $.post(
        base_url+"welcome/cerrarSesion",
        {},
        function(){
            verificaLogin();
        }
    );
}
function verificaLogin(){
    $.post(
            base_url+"welcome/verificaLogin",
            {},
            function(datos){
                if(datos.valor == 1){
                    $("#login").hide();
                    
                    if(datos.permiso == "0"){
                        $("#admin").show();
                        $("#vendedor").hide();
                    }
                    else
                    {
                        $("#admin").hide();
                        $("#vendedor").show();
                    }
                    $("#nombreLogin").html('<label>'+datos.nombre+'</label>');
                    $("#contenido").show('fast');
                }
                else{
                    $("#contenido").hide();
                    $("#login").show('fast');
                    
                }
            },
            'json'
    );
}
function conectar(){
    var nombre = $("#usuario").val();
    var clave = $("#clave").val();
    if(nombre != '' && clave != ''){
        $.post(
                base_url+"welcome/conectar",
                {nombre:nombre, clave:clave},
                function(datos){
                    if(datos.valor ==0){
                        alert("Usuario no existe en la base de datos!");
                    }
                    else{
                        verificaLogin();
                        /*$("#login").hide('fast');
                        $("#contenido").show('fast');
                        $("#nombreLogin").html('<label>'+datos.nombre+'</label>');
                        */
                    }
                },
                'json'
        );
    }
    else{
        alert("Debe completar los campos!");
    }
}
function btnGuardar(){
    var codigo = $("#codigo").val();
    var nombre = $("#nombre").val();
    var marca = $("#marca").val();
    var categoria  = $("#categorias").val();
    $.post(
        base_url+"welcome/btnGuardar",
        {codigo:codigo,nombre:nombre,marca:marca,categoria:categoria},
        function(datos){
            if(datos.valor == 1){
                alert("Código ya registrado!");
            }
            else{
                alert("Datos almacenados correctamente!");
            }
        },'json'
    );
}

function cargaCategorias(){
    $.post(
        base_url+"welcome/cargaCategorias",
        {},
        function(ruta,datos){
            $("#categorias").html(ruta,datos);
        });
}

function actualizar(){
    $.post(
        base_url+"welcome/actualizar",{},
        function(ruta,datos){
            $("#reporte").hide();
            $("#reporte").html(ruta,datos);
            $("#reporte").show('slow');
        }
    );
}
