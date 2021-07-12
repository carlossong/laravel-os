<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ordem de Serviço') }}
        </h2>
    </x-slot>

    @php($date = now())

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--Container-->
                    <div class="w-full mx-auto px-2">
                        <!--Card-->
                        <div id='recipients' class="w-full p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                            <form class="w-full" method="post" action="{{ route('order.store') }}">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Cliente*
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="client_search" type="text" placeholder="Digite o nome do cliente" required>
                                        <input type="text" name="client_id" id='client_id' hidden>
                                    </div>

                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                            Técnico / Responsável*
                                        </label>
                                        <div class="relative">
                                            <select name="responsible_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                                @foreach($technical as $technician)
                                                    <option value="{{ $technician->id }}" {{ (\Illuminate\Support\Facades\Auth::user()->id == $technician->id ? 'selected' : '') }}>{{ $technician->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                            Data/Hora Inicial*
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="start" name="start" type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime(now())) }}" required>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="relative">
                                            status*
                                        </label>
                                        <div class="relative">
                                            <select name="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                                <option>Orçamento</option>
                                                <option>Aberta</option>
                                                <option>Cancelada</option>
                                                <option>Aguardando Peça</option>
                                                <option>Finalizada</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                                            Data/Hora Final
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="end" name="end" type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime($date. ' + 3 days')) }}">
                                    </div>
                                    <div class="w-full px-3 mb-6 md:mb-2">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Problema Informado*
                                        </label>
                                        <textarea class="resize border rounded-md appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="reported_defect" rows="5" title="Defeito informado" required></textarea>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:mb-2">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="found_defect">
                                            Problema Constatado
                                        </label>
                                        <textarea class="resize border rounded-md appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="found_defect" rows="5" title="Defeito Constatado"></textarea>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:mb-2">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="solution_adopted">
                                            Solução Adotada
                                        </label>
                                        <textarea class="resize border rounded-md appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="solution_adopted" rows="5" title="Solução Adotada"></textarea>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:mb-2">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="comments">
                                            Observações
                                        </label>
                                        <textarea class="resize border rounded-md appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="comments" rows="5" title="Observações"></textarea>
                                    </div>

                                </div>
                                <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-full" type="submit">
                                    Salvar
                                </button>
                            </form>
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
    <script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>

    <!-- Script -->
    <script type="text/javascript">

        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

            $( "#client_search" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('search.client')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#client_search').val(ui.item.label); // display the selected text
                    $('#client_id').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

        });
    </script>
</x-app-layout>
