<x-admin-layout>
	<div class="flex w-full flex-row place-items-center justify-between">
		<x-add-button ruta="producto"></x-add-button>
		<form class="flex w-full flex-row items-center" action="{{ route('producto.index') }}" method="GET">
			<select onchange="this.form.submit()" class="rounded-lg border-2 border-pink-600 mr-1 h-[2.75rem] mt-1 w-28 mb-1"
				name="categoria">
				<option value="" disabled selected>Filtrar</option>
				@foreach ($categorias as $categoria)
					<option value="{{ $categoria->id }}">
						{{ $categoria->nombre }}
					</option>
				@endforeach
			</select>

			<input name="buscar" type="text" class="h-10 w-[90%] rounded-lg border-pink-600 py-4" placeholder="Buscar...">
			<button
				class="relative -ml-10 inline-block size-8 cursor-pointer justify-center rounded-lg bg-gradient-to-tr from-yellow-400 to-yellow-400 p-2 shadow transition-colors hover:scale-110">
				<img src="/images/nav-icons/buscar.svg" alt="" class="h-full place-self-center">
			</button>
		</form>

	</div>


	@if (session('error'))
		<div class="m-3 rounded-lg bg-red-100 p-3 text-red-800 w-full text-center">
			{{ session('error') }}
		</div>
	@endif
	<div class="mt-3 grid grid-cols-1 gap-4 text-wrap md:grid-cols-2 lg:grid-cols-4">
		@foreach ($productos as $producto)
			<div class="flex h-96 w-64 flex-col rounded-lg bg-white text-center shadow">
				<div class="size-full h-32 overflow-hidden">
					<img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="rounded-t-lg">
				</div>
				<div class="flex h-64 flex-col justify-between space-y-2 p-4">
					<div class="space-y-2">
						<div title="{{ $producto->nombre }}"
							class="rounded-lg truncate bg-yellow-200 bg-opacity-50 p-1.5 text-lg font-medium uppercase tracking-wider text-yellow-800">
							{{ $producto->nombre }}
						</div>
						<div class="text-base text-gray-400">
							{{ $producto->categoria->nombre }}
						</div>
						<div class="h-20 overflow-y-auto text-wrap text-xs text-gray-700">
							{{ $producto->descripcion }}
						</div>
					</div>

					<div class="flex place-content-between place-items-center">
						<div class="mb-1 text-xl font-medium text-black">
							{{ $producto->precio }}$
						</div>
						<div class="justify-center">
							<a class="inline-block" href="{{ route('producto.edit', $producto) }}"><img class="h-4"
									src="/images/nav-icons/editar.svg" alt=""></a>
							<form class="inline-block" action="{{ route('producto.destroy', $producto) }}" method="POST">
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

	<div class="mt-6 w-full">
		{{ $productos->links('vendor.pagination.simple-tailwind') }}
	</div>
</x-admin-layout>
