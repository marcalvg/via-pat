<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Ingredientes Próximo a Vencer') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6 text-gray-900">
          <table class="min-w-full border-collapse bg-white w-full text-center">
            <thead>
              <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left border-b" style="width: 20%;">Nome</th>
                <th class="py-3 px-6 text-left border-b" style="width: 20%;">Data Fabricação</th>
                <th class="py-3 px-6 text-left border-b" style="width: 20%;">Data Vencimento</th>
                <th class="py-3 px-6 text-left border-b" style="width: 20%;">Quantidade</th>
                <th class="py-3 px-6 text-left border-b" style="width: 20%;">Refrigerado</th>
              </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
              @foreach ($ingredientes as $ingrediente)
                <tr class="hover:bg-gray-100 border-b border-gray-200">
                  <td class="py-3 px-6 text-left p-2">{{ $ingrediente->nome }}</td>
                  <td class="py-3 px-6 text-left p-2">{{ $ingrediente->data_fabricacao }}</td>
                  <td class="py-3 px-6 text-left p-2">{{ $ingrediente->data_vencimento }}</td>
                  <td class="py-3 px-6 text-left p-2">{{ $ingrediente->quantidade }}</td>
                  <td class="py-3 px-6 text-left p-2">{{ $ingrediente->refrigeracao ? 'SIM' : 'NÃO'}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>