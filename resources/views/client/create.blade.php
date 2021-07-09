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

                            <form action="#" id="" method="post" class="w-full">
                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="documento" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">CPF/CNPJ<span class="required">*</span></label>
                                    <div>
                                        <input id="document" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="documento" value="" />
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <button id="buscar_info_cnpj" class="icon-search inline-flex items-center h-8 px-4 m-2 text-sm text-gray-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800" type="button">Buscar Informações</button>
                                </div>
                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="nomeCliente" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nome<span class="required">*</span></label>
                                    <div >
                                        <input id="nomeCliente" type="text" name="nomeCliente" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="contato" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Contato:</label>
                                    <div > <input type="text" name="contato" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-6 md:mb-2">
                                    <label for="telefone" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Telefone<span class="required">*</span></label>
                                    <div > <input id="telefone" type="text" name="telefone" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/></div>
                                </div> <div class="w-full px-3 mb-6 md:mb-2"> <label for="celular" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Celular</label>
                                    <div > <input id="celular" type="text" name="celular" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div>
                                <div class="w-full px-3 mb-6 md:mb-2"> <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Email<span class="required">*</span></label>
                                    <div > <input id="email" type="text" name="email" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div>
                                <div class="w-full px-3 mb-6 md:mb-2" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> <label for="cep" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">CEP<span class="required">*</span></label>
                                    <div > <input id="cep" type="text" name="cep" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div>
                                <div class="w-full px-3 mb-6 md:mb-2" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> <label for="rua" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Rua<span class="required">*</span></label>
                                    <div >
                                        <input id="rua" type="text" name="rua" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                </div>
                                <div class="w-full px-3 mb-6 md:mb-2"> <label for="numero" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Número<span class="required">*</span></label>
                                    <div > <input id="numero" type="text" name="numero" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div> <div class="w-full px-3 mb-6 md:mb-2"> <label for="complemento" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Complemento</label>
                                    <div > <input id="complemento" type="text" name="complemento" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/></div>
                                </div>
                                <div class="w-full px-3 mb-6 md:mb-2" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> <label for="bairro" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Bairro<span class="required">*</span></label>
                                    <div > <input id="bairro" type="text" name="bairro" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div>
                                <div class="w-full px-3 mb-6 md:mb-2" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> <label for="cidade" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Cidade<span class="required">*</span></label>
                                    <div > <input id="cidade" type="text" name="cidade" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/> </div>
                                </div>
                                <div class="w-full px-3 mb-6 md:mb-2" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    <label for="estado" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Estado<span class="required">*</span></label>
                                    <div > <select id="estado" name="estado" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
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
</x-app-layout>
