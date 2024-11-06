<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed" style="bottom: 0; width: 100%;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('ingredientes.avencer')" :active="request()->routeIs('ingredientes.avencer')">
                        {{ __('Ingredientes próximo ao vencimento') }}
                    </x-nav-link>
                    <x-nav-link :href="route('ingredientes.faltantes')" :active="request()->routeIs('ingredientes.faltantes')">
                        {{ __('Ingredientes Faltantes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('ingredientes.encomendados')" :active="request()->routeIs('ingredientes.encomendados')">
                        {{ __('Ingredientes Encomendados') }}
                    </x-nav-link>
                    <x-nav-link :href="route('ingredientes.adicionar')" :active="request()->routeIs('ingredientes.adicionar')">
                        {{ __('Adicionar Ingredientes') }}
                    </x-nav-link>
                    <x-nav-link :href="route('ingredientes.remover')" :active="request()->routeIs('ingredientes.remover')">
                        {{ __('Remover Ingredientes') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
