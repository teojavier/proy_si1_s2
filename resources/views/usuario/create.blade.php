<x-app-layout>

    <form action="{{ route('usuario.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="px-10 py-5 bg-white mx-10 my-5">
            <div class="mb-5">
                <h1 class="text-black font-bold text-2xl text-center">
                    Crear Usuario
                </h1>
            </div>

            {{-- linea 1 --}}
            <div class="grid grid-cols-2 gap-4 mb-3">
                <div class="col-span-1">
                    <x-label for="name" value="{{ __('Nombre:') }}" />
                    <x-input type="text" id="name" name="name" class="block mt-1 w-full" value="{{ old('name') }}"
                        autocomplete="current-password" autocomplete="off" autofocus />
                    @error('name')
                        <strong class="text-red-500 font-bold">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <x-label for="email" value="{{ __('Correo Electrónico:') }}" />
                    <x-input type="email" id="email" name="email" class="block mt-1 w-full" value="{{ old('email') }}"
                        autocomplete="current-password" autocomplete="off" autofocus />
                    @error('email')
                        <strong class="text-red-500 font-bold">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            {{-- linea 2 --}}
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-1">
                    <x-label for="password" value="{{ __('Contraseña:') }}" />
                    <x-input type="password" id="password" name="password" class="block mt-1 w-full"
                        autocomplete="current-password" autocomplete="off" autofocus />
                    @error('password')
                        <strong class="text-red-500 font-bold">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <x-label for="password_confirmation" value="{{ __('Repita contraseña:') }}" />
                    <x-input type="password" id="password_confirmation" name="password_confirmation"
                        class="block mt-1 w-full" autocomplete="current-password" autocomplete="off" autofocus />
                    @error('password_confirmation')
                        <strong class="text-red-500 font-bold">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <x-label for="departament_id" value="{{ __('Departamento:') }}" />
                    <select name="departament_id" id="departament_id" class="rounded-lg border-gray-300">
                        <option value="">-- Seleccione departamento --</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}" {{ old('departament_id') == $departamento->id ? 'selected' : ''}} >{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                    <br>
                    @error('departament_id')
                        <strong class="text-red-500 font-bold">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="mt-3">
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <x-label for="profile_photo_url" value="{{ __('Foto:') }}" />
                        <input type="file" id="profile_photo_url" name="profile_photo_url" accept="image/*"
                            onchange="updatePreview(this, 'image-preview')">
                            <br>
                        @error('profile_photo_url')
                            <strong class="text-red-500 font-bold">{{ $message }}</strong>
                        @enderror

                    </div>
                    <div class="col-span-1">
                        <div class="">
                            <label for=""> Perspectiva de la Imagen:</label>
                            <div class="p-4 text-center">
                                <div class="flex flex-wrap">
                                    <img id="image-preview" src="https://via.placeholder.com/400" alt=""
                                        style="width: 200px; height: 200px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mt-3">
                @livewire('user-rol-create')
            </div>
            <div class="mt-5">
                <button type="submit" class="rounded-lg bg-blue-500 text-white font-bold hover:bg-blue-600 px-5 py-3">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Guardar
                </button>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function updatePreview(input, target) {
            let file = input.files[0];
            let reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function() {
                let img = document.getElementById(target);
                img.src = reader.result;
            }
        }
    </script>

</x-app-layout>
