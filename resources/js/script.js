// DATATABLES
$('#dataTable').DataTable({
    responsive: true,
    "pageLength": 10,
    "language": {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ Resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
        "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        }
    }
});

// MASK
var cellMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    cellOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(cellMaskBehavior.apply({}, arguments), options);
        }
    };

$('.mask-cell').mask(cellMaskBehavior, cellOptions);
$('.mask-phone').mask('(00) 0000-0000');
$(".mask-date").mask('00/00/0000');
$(".mask-datetime").mask('00/00/0000 00:00');
$(".mask-month").mask('00/0000', {reverse: true});
$(".mask-doc").mask('000.000.000-00', {reverse: true});
$(".mask-cnpj").mask('00.000.000/0000-00', {reverse: true});
$(".mask-zipcode").mask('00000-000', {reverse: true});
$(".mask-money").mask('R$ 000.000.000.000.000,00', {reverse: true, placeholder: "R$ 0,00"});

