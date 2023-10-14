<x-guest-layout>
    <section class="flex flex-col md:flex-row h-screen items-center">

        <div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
            <img src="{{ asset('image/login.jpg') }}" alt="" class="w-full h-full object-cover">
        </div>

        <div
            class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
              flex items-center justify-center">

            <div class="w-full h-100">


                <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Proyecto SI2</h1>

                <form class="mt-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label class="block text-gray-700">{{ __('Email') }}</label>
                        <input type="email" name="email" id="email" placeholder="Introduce tu Email"
                            class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                            autofocus autocomplete required>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700">{{ __('Password') }}</label>
                        <input type="password" name="password" id="password" placeholder="Introduce tu Contraseña"
                            minlength="6"
                            class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                      focus:bg-white focus:outline-none"
                            required>
                    </div>
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                        </label>
                    </div>

                    <div class="text-right mt-2">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Olvidaste
                                tu contraseña?</a>
                        @endif

                    </div>

                    <button type="submit"
                        class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg
                    px-4 py-3 mt-6">
                        Iniciar Sesión
                    </button>
                </form>

                <hr class="my-6 border-gray-300 w-full">

                <p class="mt-8">Necesitas una Cuenta? <a href="{{ route('register') }}"
                        class="text-blue-500 hover:text-blue-700 font-semibold">Crear Cuenta</a></p>

            </div>
        </div>

    </section>
</x-guest-layout>
