<x-admin-layout>
    <div class="my-3 w-72 gap-4 space-y-3 place-self-center rounded-lg bg-white p-4 shadow md:w-96">
        <div class="font-medium">
            <h2 class="text-lg text-pink-600">Orden #{{ $orden->id }}</h2>
            <p>Fecha: <span class="font-normal text-pink-600">{{ $orden->created_at->format('d M Y') }}</span></p>
            <div class="flex flex-row items-center space-x-2">
                <div>
                    Estado:
                </div>
                @if ($orden->estado === 'pendiente')
                    <div
                        class="rounded-lg bg-yellow-200 bg-opacity-50 p-1.5 text-lg font-medium uppercase tracking-wider text-yellow-800">
                        {{ $orden->estado }}
                    </div>
                @elseif ($orden->estado === 'completada')
                    <div
                        class="rounded-lg bg-green-200 bg-opacity-50 p-1.5 text-lg font-medium uppercase tracking-wider text-green-800">
                        {{ $orden->estado }}
                    </div>
                @endif
            </div>
        </div>



        <table class="w-full table-auto">
            <thead class="bg-pink-600 text-white">
                <tr>
                    <th class="p-1 text-left">Producto</th>
                    <th class="p-1 text-right">Precio Unitario</th>
                    <th class="p-1 text-right">Cantidad</th>
                    <th class="p-1 text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody class="bg-yellow-100">
                @foreach ($orden->ordenProductos as $ordenProducto)
                    <tr>
                        <td class="p-1">{{ $ordenProducto->producto->nombre }}</td>
                        <td class="p-1 text-right">${{ number_format($ordenProducto->precio_producto, 2) }}</td>
                        <td class="p-1 text-right">{{ $ordenProducto->cantidad }}</td>
                        <td class="p-1 text-right">${{ number_format($ordenProducto->subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="text-right text-pink-600">Total: ${{ number_format($orden->total, 2) }}</p>
        <div class="mt-6 flex flex-row place-content-between gap-4">
            <x-cancel-button ruta="orden.index"></x-cancel-button>

        </div>
    </div>

</x-admin-layout>
