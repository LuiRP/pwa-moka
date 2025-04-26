<div class="order-details">
    <h2>Orden #{{ $orden->id }}</h2>
    <p>Fecha: {{ $orden->timestamp }}</p>
    <p>Estado: {{ ucfirst($orden->estado) }}</p>
    <p>Total: ${{ number_format($orden->total, 2) }}</p>

    <h3>Productos:</h3>
    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="text-left">Producto</th>
                <th class="text-right">Precio Unitario</th>
                <th class="text-right">Cantidad</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orden->ordenProductos as $ordenProducto)
                <tr>
                    <td>{{ $ordenProducto->producto->nombre }}</td>
                    <td class="text-right">${{ number_format($ordenProducto->precio_producto, 2) }}</td>
                    <td class="text-right">{{ $ordenProducto->cantidad }}</td>
                    <td class="text-right">${{ number_format($ordenProducto->subtotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
