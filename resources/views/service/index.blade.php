<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Serviços') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--Container-->
                    <div class="w-full mx-auto px-2">

                        <!--Card-->
                        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


                            <table id="example" class="stripe hover text-center" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                <thead>
                                <tr>
                                    <th data-priority="1">Código</th>
                                    <th data-priority="2">Nome</th>
                                    <th data-priority="3">Descrição</th>
                                    <th data-priority="4">Valor</th>
                                    <th data-priority="5">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>252</td>
                                    <td>Suporte Remoto</td>
                                    <td>Assistencia remota</td>
                                    <td>R$ 80,00</td>
                                    <td>Editar</td>
                                </tr>
                                </tbody>

                            </table>


                        </div>
                        <!--/Card-->


                    </div>
                    <!--/container-->
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {

            var table = $('#example').DataTable( {
                responsive: true,
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
            } )
                .columns.adjust()
                .responsive.recalc();
        } );

    </script>
</x-app-layout>
