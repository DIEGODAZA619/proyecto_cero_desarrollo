var base_url;
function baseurl(enlace) {
    base_url = enlace;

}
function cargaFunciones()
{
    cargarTablaUsuarios();    
}

function cargarTablaUsuarios()
{
    var enlace = base_url + "admin/Permisos/cargarUsuarios";
    $('#tablaUsuarios').DataTable({
        destroy: true,
        "aLengthMenu": [[10, 15, 30, -1], [10, 15, 30, "Todos"]],
        "iDisplayLength": 10,
        "ajax": {
            type: "GET",            
            url: enlace
        },
    });
}


function editarRoles(id)
{
    $('#txtDato').val(id);    
    var enlace = base_url + "admin/Permisos/permisosUsuarios";
    $.ajax({
        type: "POST",
        url: enlace,
        data: {idUser: id},
        success: function(data)
        {            
            //alert(data);
            $('#listadoPermisos').html(data);            
            $('#editarRoles').modal({backdrop: 'static', keyboard: false})
            $('#editarRoles').modal('show');
        }
    });
}

function guardarDAtos()
{
    if(confirm('¿Estas seguro de guardar los cambios realizados?')){            
        var enlace = base_url + "admin/Permisos/guardarPermisosUsuarios";
        var datos  = $('#formularioPermisos').serialize();            
        $.ajax({
            type: "POST",
            url: enlace,
            data: datos,
            success: function(data)
            {                                    
                var result = JSON.parse(data);
                $.each(result, function(i, datos)
                {
                    if(datos.resultado == 0)
                    {                            
                        alert(datos.mensaje);
                    }
                    else
                    {                                                
                        alert(datos.mensaje);
                        $('#editarRoles').modal('hide');
                    }
                });
            }
        });
    }
}
function darBaja(id)
{
    alert(id);
}
