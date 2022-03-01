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
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Técnico</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Início</th>
                                        <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Ações</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($serviceOrders as $serviceOrder)
                                    <tr>
                                        <td class="px-1 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ \App\Models\Client::where('id', $serviceOrder->client_id)->first()->name }}</div>
                                            <div class="text-sm text-gray-500">{{ \App\Models\Client::where('id', $serviceOrder->client_id)->first()->email }}</div>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ \App\Models\User::where('id', $serviceOrder->responsible_id)->first()->name }}</div>
                                        <div class="text-sm text-gray-500">{{ \App\Models\User::where('id', $serviceOrder->responsible_id)->first()->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ ($serviceOrder->status == 'Aberta' ? 'bg-blue-400' : ($serviceOrder->status == 'Orçamento' ? 'bg-yellow-100' : ($serviceOrder->status == 'Aguardando Peça' ? 'bg-indigo-100' : ($serviceOrder->status == 'Cancelada' ? 'bg-red-100' : 'bg-green-100')))) }}"> {{ $serviceOrder->status }} </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ date('d/m/Y H:i', strtotime($serviceOrder->start)) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('order.edit', ['order' => $serviceOrder->id]) }}" title="Editar" class="text-gray-600 text-2xl icon-pencil-square-o"></a> 
                                            <button title="Excluir" class="text-red-600 text-2xl icon-trash-o" onclick="deleteConfirmation({{$serviceOrder->id}})"></button>
                                        </td>
                                    </tr>
                                    @endforeach
                        
                                    <!-- More people... -->
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!--/container-->
                </div>
            </div>
        </div>
    </div>

    <script>
        //Deletar OS
        function deleteConfirmation(id) {

            swal.fire({
                title: "Tem certeza?",
                icon: 'question',
                text: "Essa ação não poderá ser revertida!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Deletar!",
                confirmButtonColor: '#d33',
                cancelButtonText: "Cancelar!",
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
