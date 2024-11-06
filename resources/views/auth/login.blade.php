<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="flex justify-center py-10   ">
            <h2 class="text-xl">Acesse sua conta</h2>
        </div>
        <!-- Email Address -->
        <div>
            <!-- <x-input-label for="email" :value="__('Email')" /> -->
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" placeholder="Usuário" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <!-- <x-input-label for="password" :value="__('Password')" /> -->

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" placeholder="Senha" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900 underline"
                    href="{{ route('password.request') }}">
                    {{ __('Esqueceu a Senha?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="flex-1 justify-center">
                {{ __('ENTRAR') }}
            </x-primary-button>
        </div>
        <div class="flex justify-center py-4">
            <a href="{{ route('register') }}" class="text-sm"><span class="text-gray-600">Não tem uma conta?</span> <span style="color: #EBB148" class="underline">Cadastre-se aqui.</span></a>
        </div>
    </form>
</x-guest-layout>