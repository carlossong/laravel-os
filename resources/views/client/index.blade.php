<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--Container-->
                    <div class="w-full mx-auto px-2">
                        <a href="{{ route('client.create') }}" class="icon-plus inline-flex items-center h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Cliente</a>
                        <!--Card-->
                        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                            <table id="clientes" class="stripe hover text-center" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                <thead>
                                <tr>
                                    <th data-priority="1">Código</th>
                                    <th data-priority="2">Nome</th>
                                    <th data-priority="3">CPF/CNPJ</th>
                                    <th data-priority="4">Telefone</th>
                                    <th data-priority="5">E-Mail</th>
                                    <th data-priority="5">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>#{{ $client->id }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->document }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>
                                        <a href="{{ route('client.edit', ['client' => $client->id]) }}" title="Editar" class="text-gray-600 text-2xl icon-pencil-square-o"></a>
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

            var table = $('#clientes').DataTable( {
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
