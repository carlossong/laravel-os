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
                        <a href="#" class="icon-plus inline-flex items-center h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Cliente</a>
                        <!--Card-->
                        <div id='recipients' class="w-full p-8 mt-6 lg:mt-0 rounded shadow bg-white">

                            <form action="" method="post" class="w-full">
                                @csrf
                                @method('PUT')
                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="document" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">CPF/CNPJ<span class="required">*</span></label>
                                    <div>
                                        <input data-mask="00.000.000/00000-00" type="text" name="document" value="" id="document" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nome<span class="required">*</span></label>
                                    <div >
                                        <input id="name" type="text" name="name" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="contact" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Contato:</label>
                                    <div > <input type="text" id="contact" name="contact" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="phone" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Telefone<span class="required">*</span></label>
                                    <div > <input id="phone" type="text" name="phone" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/></div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="cell" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Celular</label>
                                    <div > <input id="cell" type="text" name="cell" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Email<span class="required">*</span></label>
                                    <div > <input id="email" type="text" name="email" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    <label for="zipcode" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">CEP<span class="required">*</span></label>
                                    <div > <input id="zipcode" type="text" name="zipcode" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    <label for="street" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Rua<span class="required">*</span></label>
                                    <div >
                                        <input id="street" type="text" name="street" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="number" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Número<span class="required">*</span></label>
                                    <div > <input id="number" type="text" name="number" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="complement" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Complemento</label>
                                    <div > <input id="complement" type="text" name="complement" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/></div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    <label for="neighborhood" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Bairro<span class="required">*</span></label>
                                    <div > <input id="neighborhood" type="text" name="neighborhood" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    <label for="city" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Cidade<span class="required">*</span></label>
                                    <div > <input id="city" type="text" name="city" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div>

                                <div class="w-full px-3 mb-6 md:mb-2" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    <label for="state" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Estado<span class="required">*</span></label>
                                    <div > <select id="state" name="state" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                            <option value="">Selecione...</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full px-3 mt-4 mb-6 md:mb-2">
                                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-full" type="submit">
                                        Salvar
                                    </button>
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

</x-app-layout>
