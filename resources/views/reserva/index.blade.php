<x-admin-layout>
	<div class="flex w-full flex-row">
		@if (Auth::user()->permiso === 2)
			<div class="ml-1 mr-3 w-fit">
				<a href="{{ route('home') }}" onclick="cancel(event)"
					class="relative my-1.5 flex cursor-pointer items-center rounded-lg bg-gray-400 px-3 py-2 font-medium text-white shadow transition-colors hover:scale-110">
					<img src="/images/nav-icons/cancelar.svg" alt="" class="h-6">
					<span class="ml-3 mr-4">Volver</span>
				</a>
			</div>
		@endif
		<x-search-bar ruta="reserva"></x-search-bar>
	</div>

	<div class="mt-3 grid w-full grid-cols-1 gap-4 text-wrap md:grid-cols-2">
		@foreach ($reservas as $reserva)
			<div class="space-y-3 rounded-lg bg-white p-4 shadow">
				<div class="flex items-baseline space-x-2 text-xl">
					<div class="flex flex-col space-y-2">
						<div class="flex flex-row items-center space-x-2">
							@if ($reserva->estado === 'pendiente')
								<div
									class="rounded-lg bg-yellow-200 bg-opacity-50 p-1.5 text-lg font-medium uppercase tracking-wider text-yellow-800">
									{{ $reserva->estado }}
								</div>
							@elseif ($reserva->estado === 'completada')
								<div
									class="rounded-lg bg-green-200 bg-opacity-50 p-1.5 text-lg font-medium uppercase tracking-wider text-green-800">
									{{ $reserva->estado }}
								</div>
							@endif
							<div>
								<h2>#{{ $reserva->id }}</h2>
							</div>

						</div>
						<div class="flex h-fit flex-row text-xs text-gray-400">
							Reservado por:
							{{ $reserva->nombre }}
						</div>
						<div class="overflow-y-auto text-wrap text-xs text-gray-500">
							<p>
								Para el día:
								{{ $reserva->fecha }}.
							</p>
							<p>
								A las:
								{{ $reserva->hora }}
							</p>
						</div>

						<div class="overflow-y-auto text-wrap text-xs text-gray-500">
							<p>
								Numero de personas:
								{{ $reserva->numero_personas }}.
							</p>
							<p>
								En la zona:
								{{ $reserva->zona->nombre }}
							</p>
						</div>

						<div class="overflow-y-auto text-wrap text-xs text-gray-500">
							@if ($reserva->orden)
								<p>Orden tentativa: Si</p>
							@else
								<p>Orden tentativa: No</p>
							@endif
						</div>

					</div>
				</div>
				<div class="flex place-content-between place-items-center">
					<div class="mb-1 text-xl font-medium text-black">
						{{-- {{ $reserva->total }}$ --}}
					</div>
					<div class="justify-center flex flex-row space-x-1 items-center">

						<form action="{{ route('reserva.update', $reserva) }}" method="POST">
							@csrf
							@method('PUT')
							@if ($reserva->estado != 'completada')
								<input type="text" name="estado" value="completada" hidden>
								<button><svg class="h-4 stroke-black" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M4 12.6111L8.92308 17.5L20 6.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg></button>
							@else
								<input type="text" name="estado" value="pendiente" hidden>
								<button><svg class="h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M6 6L18 18M18 6L6 18" stroke="#000000" stroke-width="2" stroke-linecap="round"
											stroke-linejoin="round" />
									</svg></button>
							@endif
						</form>

						<div>
							<a class="inline-block" href="{{ route('reserva.show', $reserva) }}"><img class="h-4"
									src="/images/nav-icons/detalles.svg" alt=""></a>
						</div>
						@if (Auth::user()->permiso === 0 || Auth::user()->permiso === 2)
							<form class="inline-block" action="{{ route('reserva.destroy', $reserva) }}" method="POST">
								@csrf
								@method('DELETE')
								<button onclick="confirmation(event)">
									<img class="h-4" src="/images/nav-icons/borrar.svg" alt="">
								</button>
							</form>
						@endif
					</div>
				</div>
			</div>
		@endforeach
		<div class="mt-6">
			{{ $reservas->links('vendor.pagination.simple-tailwind') }}
		</div>
	</div>

</x-admin-layout>
