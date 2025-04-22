<x-admin-layout>
    <x-search-bar ruta="producto"></x-search-bar>
    <div class="mt-3 grid grid-cols-1 place-items-center gap-4 text-wrap md:grid-cols-2 lg:grid-cols-4">
        @foreach ($productos as $producto)
            <div class="flex h-96 w-fit flex-col rounded-lg bg-white text-center shadow">
                <div class="size-full h-32 overflow-hidden">
                    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="rounded-t-lg">
                </div>
                <div class="h-64 space-y-2 p-4">
                    <div
                        class="rounded-lg bg-yellow-200 bg-opacity-50 p-1.5 text-lg font-medium uppercase tracking-wider text-yellow-800">
                        {{ $producto->nombre }}
                    </div>
                    <div class="text-base text-gray-400">
                        {{ $producto->categoria->nombre }}
                    </div>
                    <div class="h-[7.5rem] text-wrap text-sm text-gray-700">
                        {{ $producto->descripcion }}
                    </div>

                    <div class="flex place-content-between">
                        <div class="text-sm font-medium text-black">
                            {{ $producto->precio }}$
                        </div>
                        <div>
                            <a class="inline-block" href="{{ route('producto.edit', $producto) }}"><img class="h-4"
                                    src="/images/nav-icons/editar.svg" alt=""></a>
                            <form class="inline-block" action="{{ route('producto.destroy', $producto) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="confirmation(event)">
                                    <img class="h-4" src="/images/nav-icons/borrar.svg" alt="">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="mt-6">
        {{ $productos->links('vendor.pagination.simple-tailwind') }}
    </div>



</x-admin-layout>
