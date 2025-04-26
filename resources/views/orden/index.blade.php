<x-admin-layout>
    <x-search-bar ruta="orden"></x-search-bar>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($ordenes as $orden)
            <div class="rounded-lg border p-4 shadow-sm transition-shadow hover:shadow-md">
                <div class="flex items-start justify-between">
                    <h3 class="font-bold">Orden #{{ $orden->id }}</h3>
                    <span class="{{ $orden->estado == 'completado' ? 'text-green-600' : 'text-yellow-600' }} text-sm">
                        {{ ucfirst($orden->estado) }}
                    </span>
                </div>
                <p class="mt-2 font-bold">${{ number_format($orden->total, 2) }}</p>
                <div class="mt-3 flex space-x-2">
                    <a href="{{ route('orden.show', $orden->id) }}" class="text-sm text-blue-600 hover:underline">
                        Detalles
                    </a>
                    <a href="{{ route('orden.edit', $orden->id) }}" class="text-sm text-green-600 hover:underline">
                        Editar
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $ordenes->links() }}
    </div>
</x-admin-layout>
