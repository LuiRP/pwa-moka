<x-admin-layout>
    <div class="first-row flex flex-row gap-3 text-yellow-800 flex-wrap items-center justify-center">
        <div class="flex h-64 w-64 flex-col rounded-lg bg-white text-center shadow">
            <h2 class="font-bold m-3">Más vendido</h2>
            <div class="size-full h-32 overflow-hidden">
                <img src="{{ asset($productoMasVendido->producto->imagen) }}"
                    alt="{{ $productoMasVendido->producto->nombre }}" class="rounded-t-lg">
            </div>
            <div class="flex flex-col justify-between space-y-2 p-4">
                <div class="space-y-2">
                    <div title="{{ $productoMasVendido->producto->nombre }}"
                        class="rounded-lg truncate bg-yellow-200 bg-opacity-50 p-1.5 text-lg font-medium uppercase tracking-wider text-yellow-800">
                        {{ $productoMasVendido->producto->nombre }}
                    </div>
                    <div class="text-base text-gray-400">
                        {{ $productoMasVendido->producto->categoria->nombre }}
                    </div>
                </div>
            </div>
        </div>

        <div class="flex w-64 h-64 flex-col rounded-lg bg-white text-center shadow p-4 ">
            <h2 class="-mt-1 mb-3 font-bold">Más vendidos de la semana</h2>
            <div class="flex flex-col flex-wrap content-start gap-3">
                @foreach ($productosMasVendidos as $producto)
                    <div class="flex flex-row items-center gap-3 w-full">
                        <div title="{{ $producto->producto->nombre }}"
                            class="rounded-lg bg-yellow-200 bg-opacity-50 p-1 truncate text-sm font-medium uppercase w-32 tracking-wider text-yellow-800">
                            {{ $producto->producto->nombre }}
                        </div>
                        <div class=" text-gray-400 text-sm">
                            {{ $producto->vendidos }}
                            Vendidos
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="space-y-2">
            <div class="flex w-64 h-20 flex-col rounded-lg bg-white shadow p-4">
                <h2 class="font-bold -mt-2.5 mb-2 text-center text-sm">Usuarios esta semana</h2>
                <div class="flex flex-row items-center space-x-3 place-content-center">
                    <svg class="h-8" viewBox="0 0 24 24" fill="none" version="1.1" id="svg1"
                        sodipodi:docname="usuarios-selected.svg" inkscape:version="1.4 (86a8ad7, 2024-10-11)"
                        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                        xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                        <defs id="defs1" />
                        <sodipodi:namedview id="namedview1" pagecolor="#ffffff" bordercolor="#000000"
                            borderopacity="0.25" inkscape:showpageshadow="2" inkscape:pageopacity="0.0"
                            inkscape:pagecheckerboard="0" inkscape:deskcolor="#d1d1d1" inkscape:zoom="0.72875"
                            inkscape:cx="399.31389" inkscape:cy="400" inkscape:window-width="1920"
                            inkscape:window-height="974" inkscape:window-x="-11" inkscape:window-y="-11"
                            inkscape:window-maximized="1" inkscape:current-layer="svg1" />
                        <path
                            d="M13.5 15.5C13.2164 14.3589 11.981 13.5 10.5 13.5C9.019 13.5 7.78364 14.3589 7.5 15.5M21 5V7M21 11V13M21 17V19M6.2 21H14.8C15.9201 21 16.4802 21 16.908 20.782C17.2843 20.5903 17.5903 20.2843 17.782 19.908C18 19.4802 18 18.9201 18 17.8V6.2C18 5.0799 18 4.51984 17.782 4.09202C17.5903 3.71569 17.2843 3.40973 16.908 3.21799C16.4802 3 15.9201 3 14.8 3H6.2C5.0799 3 4.51984 3 4.09202 3.21799C3.71569 3.40973 3.40973 3.71569 3.21799 4.09202C3 4.51984 3 5.07989 3 6.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21ZM11.5 9.5C11.5 10.0523 11.0523 10.5 10.5 10.5C9.94772 10.5 9.5 10.0523 9.5 9.5C9.5 8.94772 9.94772 8.5 10.5 8.5C11.0523 8.5 11.5 8.94772 11.5 9.5Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            id="path1" style="stroke:#854d0e;stroke-opacity:1" />
                    </svg>
                    <div
                        class="h-fit w-12 text-center rounded-lg truncate bg-yellow-200 bg-opacity-50 p-1.5 text-lg font-medium uppercase tracking-wider text-yellow-800">
                        {{ $usuariosSemana }}
                    </div>
                </div>
            </div>
            <div class="flex w-64 h-20 flex-col rounded-lg bg-white shadow p-4">
                <h2 class="font-bold -mt-2.5 mb-2 text-center text-sm">Ordenes esta semana</h2>
                <div class="flex flex-row items-center space-x-3 place-content-center">
                    <svg class="h-8" viewBox="0 0 24 24" fill="none" version="1.1" id="svg1"
                        sodipodi:docname="ordenes-selected.svg" inkscape:version="1.4 (86a8ad7, 2024-10-11)"
                        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                        xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                        <defs id="defs1" />
                        <sodipodi:namedview id="namedview1" pagecolor="#ffffff" bordercolor="#000000"
                            borderopacity="0.25" inkscape:showpageshadow="2" inkscape:pageopacity="0.0"
                            inkscape:pagecheckerboard="0" inkscape:deskcolor="#d1d1d1" inkscape:zoom="0.72875"
                            inkscape:cx="399.31389" inkscape:cy="400" inkscape:window-width="1920"
                            inkscape:window-height="974" inkscape:window-x="-11" inkscape:window-y="-11"
                            inkscape:window-maximized="1" inkscape:current-layer="svg1" />
                        <path
                            d="M12 9C14.5 9 16 10 17 12M12 6C7.58172 6 4 9.58172 4 14C4 15.4571 4.38958 16.8233 5.07026 18M12 6C16.4183 6 20 9.58172 20 14C20 15.4571 19.6104 16.8233 18.9297 18M12 6C12.8284 6 13.5 5.32843 13.5 4.5C13.5 3.67157 12.8284 3 12 3C11.1716 3 10.5 3.67157 10.5 4.5C10.5 5.32843 11.1716 6 12 6ZM4.5 21H19.5C20.3284 21 21 20.3284 21 19.5C21 18.6716 20.3284 18 19.5 18H4.5C3.67157 18 3 18.6716 3 19.5C3 20.3284 3.67157 21 4.5 21Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            id="path1" style="stroke:#854d0e;stroke-opacity:1" />
                    </svg>
                    <div
                        class="h-fit w-12 text-center rounded-lg truncate bg-yellow-200 bg-opacity-50 p-1.5 text-lg font-medium uppercase tracking-wider text-yellow-800">
                        {{ $ordenesSemana }}
                    </div>
                </div>
            </div>
            <div class="flex w-64 h-20 flex-col rounded-lg bg-white shadow p-4">
                <h2 class="font-bold -mt-2.5 mb-2 text-center text-sm">Reservas esta semana</h2>
                <div class="flex flex-row items-center space-x-3 place-content-center">
                    <svg class="h-8" viewBox="0 0 24 24" fill="none" version="1.1" id="svg1"
                        sodipodi:docname="reservas-selected.svg" inkscape:version="1.4 (86a8ad7, 2024-10-11)"
                        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                        xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                        <defs id="defs1" />
                        <sodipodi:namedview id="namedview1" pagecolor="#ffffff" bordercolor="#000000"
                            borderopacity="0.25" inkscape:showpageshadow="2" inkscape:pageopacity="0.0"
                            inkscape:pagecheckerboard="0" inkscape:deskcolor="#d1d1d1" inkscape:zoom="0.72875"
                            inkscape:cx="399.31389" inkscape:cy="400" inkscape:window-width="1920"
                            inkscape:window-height="974" inkscape:window-x="-11" inkscape:window-y="-11"
                            inkscape:window-maximized="1" inkscape:current-layer="svg1" />
                        <path
                            d="M7 3V5M17 3V5M16 18V16.2C16 15.0799 16 14.5198 16.218 14.092C16.4097 13.7157 16.7157 13.4097 17.092 13.218C17.5198 13 18.0799 13 19.2 13H21L16 18ZM16 18H3M7 9H17M7 13L8 14L10 12M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            id="path1" style="stroke:#854d0e;stroke-opacity:1" />
                    </svg>
                    <div
                        class="h-fit w-12 text-center rounded-lg truncate bg-yellow-200 bg-opacity-50 p-1.5 text-lg font-medium uppercase tracking-wider text-yellow-800">
                        {{ $reservasSemana }}
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class=" max-h-100 mt-3 second-row flex flex-row gap-3 text-yellow-800 flex-wrap">
        <div class="flex size-100 flex-col rounded-lg bg-white text-center shadow p-4 items-center">
            <h2 class="w-64 text-center">Usuarios registrados esta semana que realizaron reservas</h2>
            <canvas id="reservasChart"></canvas>
        </div>
        <div class="flex h-fit md:h-full flex-col rounded-lg bg-white text-center shadow p-4 items-center">
            <h2 class="w-64 text-center">Cuantas reservas han tenido una orden adjunta</h2>
            <div class="flex h-full w-fit items-center">
                <div class="min-h-0 flex-1">
                    <canvas id="ordenesChart"></canvas>
                </div>
            </div>
        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Chart !== 'undefined') {
                const ctx = document.getElementById('reservasChart').getContext('2d');
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: @json($graficoDatos1['labels']),
                        datasets: [{
                            data: @json($graficoDatos1['datasets']),
                            backgroundColor: @json($graficoDatos1['backgroundColors']),
                            borderColor: 'rgba(133, 77, 14, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                    }
                });

            } else {
                console.error('Chart.js not loaded! Check your Vite configuration.');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Chart !== 'undefined') {
                const ctx = document.getElementById('ordenesChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($graficoDatos2['labels']),
                        datasets: [{
                            label: ['Se adjuntaron ordenes'],
                            data: @json($graficoDatos2['datasets']),
                            backgroundColor: @json($graficoDatos2['backgroundColors']),
                            borderColor: 'rgba(133, 77, 14, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } else {
                console.error('Chart.js not loaded! Check your Vite configuration.');
            }
        });
    </script>
    </script>

</x-admin-layout>
