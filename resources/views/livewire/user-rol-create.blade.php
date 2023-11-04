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
                <input type="checkbox" name="roles[]"
                    value="{{ $rol->id }}" id="{{ $rol->id }}">
                {{ $rol->name }}
            </label>
            <br>
        @endforeach
    </div>
    @error('roles')
        <strong class="text-red-500 font-bold">{{ $message }}</strong>
    @enderror
</div>