<div class="m-5">

    <div class="p-5 bg-white">
        <div class="grid grid-cols-3">
            <div class="col-span-1">
                <x-input wire:model="filtro" class="block mt-1 w-full" required autofocus placeholder="Buscar" />
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    NOMBRE
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    PERMISOS
                                </th>

                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ACCIONES
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $rol->id }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $rol->name }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php
                                        $permisos = $rol->permissions;
                                        ?>
                                        @foreach ($permisos as $permiso)
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $permiso->name }}
                                            </p>
                                        @endforeach
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex flex-wrap justify-between">
                                            @can('Editar Roles')
                                                <a class="px-3 py-2 rounded-lg bg-blue-600 text-white hover-bg-blue-800"
                                                    href="{{ route('rol.edit', $rol->id) }}">
                                                    Editar
                                                </a>
                                            @endcan
                                            @can('Eliminar Roles')
                                                <form action="{{ route('rol.delete', $rol->id) }}" method="POST"
                                                    onsubmit="return false;">
                                                    @csrf
                                                    <button type="button" id="btnEliminarRol"
                                                        class="px-3 py-2 rounded-lg bg-red-600 text-white hover-bg-red-800 mr-5">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script>
                        const btnEliminarRol = document.getElementById('btnEliminarRol');

                        btnEliminarRol.addEventListener('click', function() {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                    // document.querySelector('form').submit();
                                }
                            })
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
