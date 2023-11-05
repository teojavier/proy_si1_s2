<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reportes') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">

                    <div style="width: 80%; margin: auto;">
                        <canvas id="myChart"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var usuariosPeticionesPOST = <?php echo json_encode($usuarios); ?>;
        var catidadPeticionesPOSTporUsuario = <?php echo json_encode($cantidad_peticiones); ?>;

        var data = {
            labels: usuariosPeticionesPOST,
            datasets: [{
                label: 'Cantidad de Peticiones POST por Usuario',
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                data: catidadPeticionesPOSTporUsuario
            }]
        };

        // Configuración del gráfico
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Crea un gráfico de barras
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</x-app-layout>
