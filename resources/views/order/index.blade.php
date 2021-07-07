<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ordem de Serviço') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--Container-->
                    <div class="w-full mx-auto px-2">
                        <a href="{{ route('os.create') }}" class="icon-plus inline-flex items-center h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">O.S</a>
                        <!--Card-->
                        <div id='recipients' class="w-full p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                            <table id="example" class="stripe hover p-2 w-full text-center">
                                <thead>
                                <tr>
                                    <th data-priority="1">Cliente</th>
                                    <th data-priority="2">O.S</th>
                                    <th data-priority="3">Responsável</th>
                                    <th data-priority="4">Início</th>
                                    <th data-priority="5">Término</th>
                                    <th data-priority="5">Status</th>
                                    <th data-priority="6">Valor Total</th>
                                    <th data-priority="6">Valor Faturado</th>
                                    <th data-priority="6">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->client_id }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ \App\Models\User::where('id', $order->responsible_id)->first()->name }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($order->start)) }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($order->end)) }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>R$ {{ $order->amount }}</td>
                                    <td>R$ {{ $order->billed }}</td>
                                    <td>
                                        <a title="Editar" class="text-gray-600 text-2xl icon-pencil-square-o" href="" target="_blank"></a>
                                        <a title="Excluir" href="{{ route('os.destroy', $order->id) }}" class="text-red-600 text-2xl icon-trash-o" onclick="deleteConfirm('delele')"></a>
                                    </td>
                                </tr>
                                @endforeach
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
