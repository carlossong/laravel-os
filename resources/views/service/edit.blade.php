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
                        <!--Card-->
                        <div id='recipients' class="w-full p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                            <form action="{{ route('service.update', ['service' => $service->id]) }}" method="post" class="w-full">
                                @csrf
                                @method('PUT')
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nome<span class="required">*</span></label>
                                        <div >
                                            <input id="name" type="text" name="name" value="{{ old('name') ?? $service->name }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                        </div>
                                    </div>

                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-2">
                                        <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nome<span class="required">*</span></label>
                                        <div >
                                            <input id="price" type="text" name="price" value="{{ old('price') ?? $service->price }}" class="mask-money appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                        </div>
                                    </div>

                                    <div class="w-full px-3 mb-6 md:mb-2">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                                            Descrição*
                                        </label>
                                        <textarea title="description" name="description" class="resize border rounded-md appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" rows="5">{{ old('description') ?? $service->description }}</textarea>
                                    </div>
                                    <div class="w-full px-3 mt-4 mb-6 md:mb-2">
                                        <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-full" type="submit">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--/Card-->
                    </div>
                    <!--/container-->
                </div>
            </div>
        </div>
    </div>

    <script>

        function checkCnpj(cnpj) {
            $.ajax({
                'url': 'https://www.receitaws.com.br/v1/cnpj/' + cnpj.replace(/[^0-9]/g, ''),
                'type': "GET",
                'dataType': 'jsonp',
                'success': function (data) {
                    if (data.nome == undefined){
                        Swal.fire({
                            icon: data.status,
                            title: 'Oops...',
                            text: data.message,
                        })
                    }else {
                        document.getElementById('name').value = data.nome;
                        document.getElementById('phone').value = data.telefone;
                        document.getElementById('email').value = data.email;
                        document.getElementById('zipcode').value = data.cep;
                        document.getElementById('street').value = data.logradouro;
                        document.getElementById('number').value = data.numero;
                        document.getElementById('complement').value = data.complemento;
                        document.getElementById('neighborhood').value = data.bairro;
                        document.getElementById('city').value = data.municipio;
                        document.getElementById('state').value = data.uf;
                    }
                }
            })
        }

    </script>

    @if ($errors->any())

        <script>
            @foreach ($errors->all() as $error)
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $error }}',
            })
            @endforeach
        </script>

    @endif

</x-app-layout>
