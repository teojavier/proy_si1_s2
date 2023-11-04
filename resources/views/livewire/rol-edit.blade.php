<div>
    {!! Form::model($rol,['route' => ['rol.update', $rol->id], 'method' => 'post', 'autocomplete' => 'off']) !!}
        @csrf
        <div class="px-10 py-5 bg-white mx-10 my-5">
            <div class="mb-5">
                <h1 class="text-black font-bold text-2xl text-center">
                    Editar Rol
                </h1>
            </div>

            {{-- linea 1 --}}
            <div class="grid grid-cols-2 gap-4 mb-3">
                <div class="col-span-1">
                    <x-label for="name" value="{{ __('Nombre:') }}" />
                    <x-input type="text" name="name" class="block mt-1 w-full" autocomplete="off" autofocus value="{{ $rol->name}}"/>
                    @error('name')
                        <strong class="text-red-500 font-bold">{{ $message }}</strong>
                    @enderror
                </div>

            </div>

            <div>
                <div>
                    <h1 class="font-bold">Selecciona los permisos:</h1>
                    <div class="grid grid-cols-3">
                        <div class="col-span-1">
                            <x-input wire:model="filtro" class="block mt-1 w-full" autofocus
                                placeholder="Buscar" />
                        </div>
                    </div>
                    <br>
                    @foreach ($permissions as $permission)
                        <label for="{{ $permission->id }}">
                            {!!Form::checkbox('permissions[]', $permission->id, null,['class'=> 'mr-1'])!!}
                            {{ $permission->name }}
                        </label>
                        <br>
                    @endforeach
                </div>
                @error('permissions')
                    <strong class="text-red-500 font-bold">{{ $message }}</strong>
                @enderror
            </div>

            @can('Actualizar Roles')
            <div class="mt-3">
                <button type="submit" class="rounded-lg bg-blue-500 text-white font-bold hover:bg-blue-600 px-5 py-3">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Actualizar
                </button>
            </div>
            @endcan
        </div>
        {!! Form::close() !!}
</div>
