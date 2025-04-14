<x-admin-layout>
    <div class="my-3 w-fit gap-4 space-y-3 place-self-center self-center rounded-lg bg-white p-4 shadow md:w-96">
        <form action="{{ route('producto.store') }}" method="POST">
            @csrf
            <div class="flex flex-col gap-2">
                <div class="flex flex-col gap-1">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" required
                        class="rounded-lg border-pink-600">
                </div>

                <div class="mt-3 flex flex-col gap-1">
                    <label for="descripcion">Descripción</label>
                    <textarea class="resize-none rounded-lg border-pink-600" name="descripcion" id="" required rows="5">{{ old('descripcion') }}</textarea>
                </div>

                <div class="mt-3 flex flex-col gap-1">
                    <label for="categoria">Categoria</label>
                    <select class="rounded-lg border-pink-600" name="categoria_id" required>
                        <option value="" disabled selected>Selecciona una categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-3 flex flex-col gap-1">
                    <label for="precio">Precio</label>
                    <input class="rounded-lg border-pink-600" type="number" step="0.01" min="0"
                        name="precio" value="{{ old('precio') }}" required>
                </div>
            </div>

            <div class="mt-6 flex flex-row place-content-between gap-4">
                <x-cancel-button ruta="producto.index"></x-cancel-button>
                <x-save-button></x-save-button>
            </div>

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </form>
    </div>

</x-admin-layout>
