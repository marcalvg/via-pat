<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Adicionar Ingredientes') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <form method="POST" action="{{ route('ingredientes.criar') }}" class="grid gap-4">
            @csrf
            <div>
              <x-input-label for="nome" :value="__('Nome do Produto')" />
              <x-text-input id="nome" class="block mt-1 w-full" style="" type="text" name="nome" :value="old('nome')" required
                autofocus autocomplete="nome" placeholder="Nome do produto" />
            </div>
            <div class="flex gap-4">
              <div class="w-full">
                <x-input-label for="data-fabricacao" :value="__('Data de Fabricação')" />
                <x-text-input id="data-fabricacao" class="block mt-1 w-full" type="date" name="data-fabricacao"
                  :value="old('data-fabricacao')" required autofocus />
              </div>
              <div class="w-full">
                <x-input-label for="data-vencimento" :value="__('Data de Vencimento')" />
                <x-text-input id="data-vencimento" class="block mt-1 w-full" type="date" name="data-vencimento"
                  :value="old('data-vencimento')" required autofocus />
              </div>
            </div>
            <div>
              <x-input-label for="quantidade" :value="__('Quantidade')" />
              <x-text-input id="quantidade" class="block mt-1" type="number" name="quantidade"
                :value="old('quantidade')" required autofocus />
            </div>
            <div class="flex gap-2 items-center">
              <x-text-input id="refrigeracao" class="block mt-1" type="checkbox" name="refrigeracao"
                :value="old('refrigeracao')" autofocus />
              <x-input-label for="refrigeracao" :value="__('Precisa de refrigeração')" />
            </div>
            <div style="width: 100%; margin:auto;" class="flex justify-end">
              <x-primary-button class="justify-center w-20">
                {{ __('CRIAR') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>