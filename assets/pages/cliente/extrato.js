$(document).ready(function(){

    $('.responsive-data-table').DataTable({
        "PaginationType": "bootstrap",
        "ordering": false,
        "aLengthMenu": [[10, 15, 30, -1], [10, 30, 100, "Todos"]], //DIEGO
        responsive: true,
        dom: '<"tbl-top clearfix"lfr>,t,<"tbl-footer clearfix"<"tbl-info pull-left"i><"tbl-pagin pull-right"p>>',
        "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Lo siento, no se encontró nada.",
                "info": "Mostrando _PAGE_ de _PAGES_",
                "infoEmpty": "No se encontraron registros",
                "infoFiltered": "(filtrado de _MAX_ registros)",
                "search": "Buscar:",
                "loadingRecords": "Carregando...",
                "processing": "Procesando...",
                "emptyTable": "No hay registros para mostrar en esta página",
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última",
                    "next":       "Próxima",
                    "previous":   "Anterior"
                },
                "aria": {
                    "sortAscending":  ": Habilitado para ordenar columnas ascendentes",
                    "sortDescending": ": Habilitado para ordenar columnas decrescente"
                }
            }
    });

}); /* ready */