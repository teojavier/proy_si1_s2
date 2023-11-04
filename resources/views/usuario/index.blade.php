<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Usuarios') }}
            </h2>
            @can('Crear Usuarios')
                <a class="px-3 py-2 rounded-lg bg-green-600 text-white hover:bg-green-800"
                    href="{{ route('usuario.create') }}">
                    Registrar Usuario
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">

                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>E-MAIL</th>
                                <th>DEPARTAMENTO</th>
                                <th>FOTO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $usuario->id }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $usuario->name }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $usuario->email }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $usuario->departamento }}
                                        </p>
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-full h-full rounded-full"
                                                    src="{{ asset($usuario->profile_photo_path) }}" alt="" />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex flex-wrap justify-between">
                                            @can('Editar Usuarios')
                                                <a class="px-3 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-800"
                                                    href="{{ route('usuario.edit', $usuario->id) }}">
                                                    Editar
                                                </a>
                                            @endcan
                                            <div>

                                                @can('Eliminar Usuarios')
                                                    <form action="{{ route('usuario.delete', $usuario->id) }}"
                                                        method="POST" onsubmit="return confirm('Seguro de eliminar?')">
                                                        @csrf
                                                        <button type="submit"
                                                            class="px-3 py-2 rounded-lg bg-red-600 text-white hover:bg-red-800 mr-5">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.7/datatables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.7/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

        @if (Session::has('correcto'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success("{{ session('correcto') }}");
        @endif
    </script>

</x-app-layout>
