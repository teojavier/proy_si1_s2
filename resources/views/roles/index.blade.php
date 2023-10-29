<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles') }}
            </h2>

            <a class="px-3 py-2 rounded-lg bg-green-600 text-white hover:bg-green-800" href="{{ route('rol.create') }}">
                Registrar Rol
            </a>
        </div>
    </x-slot>

    @livewire('rol-table')

    <script>
        @if (Session::has('correcto'))

            Swal.fire({
                icon: 'success',
                title: '{{ session('correcto') }}',
                showConfirmButton: false,
                timer: 5000
            })
        @endif
    </script>
</x-app-layout>
