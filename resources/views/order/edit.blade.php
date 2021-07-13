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
                    <form method="post" action="{{ route('order.update', ['order' => $serviceOrder->id]) }}">
                    <div
                        x-data="{openTab: 1, activeClasses: 'border-l border-t border-r rounded-t text-blue-700', inactiveClasses: 'text-blue-500 hover:text-blue-800'}" class="p-6">
                        <ul class="flex border-b">
                            <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="-mb-px mr-1">
                                <a :class="openTab === 1 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
                                    Dados da O.S
                                </a>
                            </li>
                            <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="mr-1">
                                <a :class="openTab === 2 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
                                    Serviços
                                </a>
                            </li>
                            <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="mr-1">
                                <a :class="openTab === 3 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
                                    Detalhes
                                </a>
                            </li>
                        </ul>
                        <div class="w-full pt-4">
                            <div x-show="openTab === 1">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Cliente*
                                        </label>
                                        <input value="{{ $client->name }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="client_search" type="text" placeholder="Digite o nome do cliente" readonly>
                                    </div>

                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                            Técnico / Responsável*
                                        </label>
                                        <div class="relative">
                                            <select name="responsible_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                                @foreach($technical as $technician)
                                                    <option value="{{ $technician->id }}" {{ ($technician->id === $serviceOrder->responsible_id ? 'selected' : '') }}>{{ $technician->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                            Data/Hora Inicial*
                                        </label>
                                        <input id="start" name="start" type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime($serviceOrder->start)) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="relative">
                                            status*
                                        </label>
                                        <div class="relative">
                                            <select name="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                                <option value="Orçamento" {{ ($serviceOrder->status === "Orçamento" ? 'selected' : '') }}>Orçamento</option>
                                                <option value="Aberta" {{ ($serviceOrder->status === "Aberta" ? 'selected' : '') }}>Aberta</option>
                                                <option value="Aguardando Peça" {{ ($serviceOrder->status === "Aguardando Peça" ? 'selected' : '') }}>Aguardand o Peça</option>
                                                <option value="Cancelada" {{ ($serviceOrder->status === "Cancelada" ? 'selected' : '') }}>Cancelada</option>
                                                <option value="Finalizada" {{ ($serviceOrder->status === "Finalizada" ? 'selected' : '') }}>Finalizada</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                                            Data/Hora Final
                                        </label>
                                        <input id="end" name="end" type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime($serviceOrder->end)) }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    </div>
                                    <div class="w-full px-3 mb-6 md:mb-2">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Problema Informado*
                                        </label>
                                        <textarea class="resize border rounded-md appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="reported_defect" rows="5" title="Defeiro informado" required>{{ $serviceOrder->reported_defect }}</textarea>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:mb-2">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="found_defect">
                                            Problema Constatado
                                        </label>
                                        <textarea class="resize border rounded-md appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="found_defect" rows="5" title="Defeiro Constatado">{{ $serviceOrder->found_defect }}</textarea>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:mb-2">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="solution_adopted">
                                            Solução Adotada
                                        </label>
                                        <textarea class="resize border rounded-md appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="solution_adopted" rows="5" title="Solução Adotada">{{ $serviceOrder->solution_adopted }}</textarea>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:mb-2">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="comments">
                                            Observações
                                        </label>
                                        <textarea class="resize border rounded-md appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="comments" rows="5" title="Observações">{{ $serviceOrder->comments }}</textarea>
                                    </div>
                                </div>

                            </div>
                            <div x-show="openTab === 2">
                               Serviços
                            </div>
                            <div x-show="openTab === 3">
                                <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-full" type="submit">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
