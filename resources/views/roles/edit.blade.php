<x-app-layout>
    @livewire('rol-edit', [$id])

    <script>
        @if (Session::has('correcto'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success("{{ session('correcto') }}");
        @endif
    </script>
</x-app-layout>
