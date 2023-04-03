$(document).ready(function() {
    if ($('#myTable').length > 0) {
        $('#myTable').DataTable( {
            order: [[ 0, 'asc' ]],
            select: true,
            lengthMenu: [ [10, 30, 50, -1], [10, 30, 50, "Todos"] ],
            pagingType: 'full_numbers',
            language: {
                lengthMenu:       "Mostrar _MENU_ entradas",
                zeroRecords:      "No se encontro registros",
                search:           "Buscar",
                paginate: {
                    first:    '«',
                    previous: '‹',
                    next:     '›',
                    last:     '»'
                },
                aria: {
                    paginate: {
                        first:    'First',
                        previous: 'Previous',
                        next:     'Next',
                        last:     'Last'
                    }
                },
                info:             "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                infoFiltered:     "(filtrado de _MAX_ registros totales)",
                infoEmpty:        "Mostrando 0 a 0 de 0 entradas"
            },
        });
    }
});