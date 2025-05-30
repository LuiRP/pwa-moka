<x-admin-layout>
    <div class="m-8">
        <a href="{{ route('producto.create') }}">Crear</a>
        <table class="min-w-full border-8 border-neutral-50 rounded-xl">
            <thead class="p-8 bg-pink-600 text-neutral-50">
                <tr>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($productos as $producto)
                    <tr>
                        <td>
                            {{ $producto->nombre }}
                        </td>
                        <td>
                            {{ $producto->categoria->nombre }}
                        </td>
                        <td>
                            ${{ $producto->precio }}
                        </td>
                        <td class="text-right">
                            <a class="inline-block" href="{{ route('producto.edit', $producto) }}">
                                <svg class="h-4" viewBox="0 0 16 16" fill="none"">
                                    <path d="M8.29289 3.70711L1 11V15H5L12.2929 7.70711L8.29289 3.70711Z"
                                        fill="#000000" />
                                    <path
                                        d="M9.70711 2.29289L13.7071 6.29289L15.1716 4.82843C15.702 4.29799 16 3.57857 16 2.82843C16 1.26633 14.7337 0 13.1716 0C12.4214 0 11.702 0.297995 11.1716 0.828428L9.70711 2.29289Z"
                                        fill="#000000" />
                                </svg>
                            </a>
                            <form class="inline-block" action="{{ route('producto.destroy', $producto) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <svg class="h-4" viewBox="-3 0 32 32">
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd" sketch:type="MSPage">
                                            <g id="Icon-Set-Filled" sketch:type="MSLayerGroup"
                                                transform="translate(-261.000000, -205.000000)" fill="#000000">
                                                <path
                                                    d="M268,220 C268,219.448 268.448,219 269,219 C269.552,219 270,219.448 270,220 L270,232 C270,232.553 269.552,233 269,233 C268.448,233 268,232.553 268,232 L268,220 L268,220 Z M273,220 C273,219.448 273.448,219 274,219 C274.552,219 275,219.448 275,220 L275,232 C275,232.553 274.552,233 274,233 C273.448,233 273,232.553 273,232 L273,220 L273,220 Z M278,220 C278,219.448 278.448,219 279,219 C279.552,219 280,219.448 280,220 L280,232 C280,232.553 279.552,233 279,233 C278.448,233 278,232.553 278,232 L278,220 L278,220 Z M263,233 C263,235.209 264.791,237 267,237 L281,237 C283.209,237 285,235.209 285,233 L285,217 L263,217 L263,233 L263,233 Z M277,209 L271,209 L271,208 C271,207.447 271.448,207 272,207 L276,207 C276.552,207 277,207.447 277,208 L277,209 L277,209 Z M285,209 L279,209 L279,207 C279,205.896 278.104,205 277,205 L271,205 C269.896,205 269,205.896 269,207 L269,209 L263,209 C261.896,209 261,209.896 261,211 L261,213 C261,214.104 261.895,214.999 262.999,215 L285.002,215 C286.105,214.999 287,214.104 287,213 L287,211 C287,209.896 286.104,209 285,209 L285,209 Z"
                                                    id="trash" sketch:type="MSShapeGroup">

                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
