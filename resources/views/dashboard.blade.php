<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="widget-box">
                        <div class="container mb-3">
                            <a href="{{ route('order.create') }}" class="icon-plus inline-flex items-center h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Nova O.S</a>
                            <a href="{{ route('client.create') }}" class="icon-plus inline-flex items-center h-8 px-4 m-2 text-sm text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Cliente</a>
                            <a href="{{ route('service.create') }}" class="icon-plus inline-flex items-center h-8 px-4 m-2 text-sm text-gray-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800">Serviço</a>
                            <a href="{{ route('product.create') }}" class="icon-plus inline-flex items-center h-8 px-4 m-2 text-sm text-yellow-100 transition-colors duration-150 bg-yellow-700 rounded-lg focus:shadow-outline hover:bg-yellow-800">Produto</a>
                        </div>
                        <div class="flex space-x-4 text-center">
                            <div class="flex-1 bg-blue-400 py-4 rounded-lg">ABERTAS<p>{{ $open }}</p></div>
                            <div class="flex-1 bg-yellow-400 py-4 rounded-lg">ORÇAMENTO<p>{{ $budget }}</p></div>
                            <div class="flex-1 bg-indigo-400 py-4 rounded-lg">AGUARDADO PEÇA<P>{{ $parts }}</P></div>
                            <div class="flex-1 bg-green-400 py-4 rounded-lg">FATURAR<P>{{ $bill }}</P></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
