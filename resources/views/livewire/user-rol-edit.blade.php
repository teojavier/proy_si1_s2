<div>
    <div>
        <h1 class="font-bold">Selecciona los Roles:</h1>
        <div class="grid grid-cols-3">
            <div class="col-span-1">
                <x-input wire:model="filtro" class="block mt-1 w-full" autofocus
                    placeholder="Buscar" />
            </div>
        </div>
        <br>
        @foreach ($roles as $rol)
            <label for="{{ $rol->id }}">
                {!!Form::checkbox('roles[]', $rol->id, null,['class'=> 'mr-1'])!!}
                {{ $rol->name }}
            </label>
            <br>
        @endforeach
    </div>
    @error('permissions')
        <strong class="text-red-500 font-bold">{{ $message }}</strong>
    @enderror
</div>
