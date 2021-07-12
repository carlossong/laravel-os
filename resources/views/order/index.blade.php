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
                        <a href="{{ route('order.create') }}" class="icon-plus inline-flex items-center h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">O.S</a>
                        <!--Card-->
                        <div id='recipients' class="w-full p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                            <table id="example" class="stripe hover p-2 w-full text-center">
                                <thead>
                                <tr>
                                    <th data-priority="2">O.S</th>
                                    <th data-priority="1">Cliente</th>
                                    <th data-priority="4">Início</th>
                                    <th data-priority="5">Técnico</th>
                                    <th data-priority="5">Status</th>
                                    <th data-priority="3">Problema Informado</th>
                                    <th data-priority="6">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($serviceOrders as $serviceOrder)
                                <tr>
                                    <td>{{ $serviceOrder->id }}</td>
                                    <td>{{ \App\Models\Client::where('id', $serviceOrder->client_id)->first()->name }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($serviceOrder->start)) }}</td>
                                    <td>{{ \App\Models\User::where('id', $serviceOrder->responsible_id)->first()->name }}</td>
                                    <td><span class="{{ ($serviceOrder->status == 'Aberta' ? 'bg-blue-400' : ($serviceOrder->status == 'Orçamento' ? 'bg-yellow-400' : ($serviceOrder->status == 'Aguardando Peça' ? 'bg-indigo-400' : ($serviceOrder->status == 'Cancelada' ? 'bg-red-600' : 'bg-green-600')))) }} px-3 rounded-full">{{ $serviceOrder->status }}</span></td>
                                    <td>{{ $serviceOrder->reported_defect }}</td>
                                    <td>
                                        <a href="{{ route('order.edit', ['order' => $serviceOrder->id]) }}" title="Editar" class="text-gray-600 text-2xl icon-pencil-square-o"></a>
                                        <button title="Excluir" class="text-red-600 text-2xl icon-trash-o" onclick="deleteConfirmation({{$serviceOrder->id}})"></button>
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

        //Deletar OS

        function deleteConfirmation(id) {

            swal.fire({
                title: "Tem certeza?",
                icon: 'question',
                text: "Essa ação não poderá ser revertida!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Sim. Deletar!",
                confirmButtonColor: '#d33',
                cancelButtonText: "Não. Cancelar!",
                cancelButtonColor: '#3085d6',
                reverseButtons: !0
            }).then(function (e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{url('/delete')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                swal.fire("Concluído!", results.message, "success");
                                // refresh page after 2 seconds
                                setTimeout(function(){
                                    location.reload();
                                },2000);
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }

    </script>

    @if (\Session::has('success'))

        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{!! \Session::get('success') !!}'
            })
        </script>

    @endif

</x-app-layout>
