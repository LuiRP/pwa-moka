<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\OrdenProducto;
use App\Models\Producto;
use App\Models\Reserva;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek(); 

        $productoMasVendido = OrdenProducto::select('producto_id')
            ->selectRaw('SUM(cantidad) as vendidos')
            ->groupBy('producto_id')
            ->orderByDesc('vendidos')
            ->with('producto')
            ->first();
        
        $productosMasVendidos = OrdenProducto::select('producto_id')
            ->selectRaw('SUM(cantidad) as vendidos')
            ->join('ordenes', 'ordenes_productos.orden_id', '=', 'ordenes.id')
            ->whereBetween('ordenes.created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('producto_id')
            ->orderByDesc('vendidos')
            ->with('producto')
            ->take(5)
            ->get();

        $ordenesSemana = Orden::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek() 
        ])->count();

        $reservasSemana = Reserva::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek() 
        ])->count();

        $usuariosSemana = User::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();    

        $usuariosSemanaReservas = User::whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->whereHas('reservas')
        ->count();

        $usuariosSemanaNoReservas = $usuariosSemana - $usuariosSemanaReservas;

        $graficoDatos1 = [
            'labels' => ['Si reservó', 'No reservó'],
            'datasets' => [$usuariosSemanaReservas, $usuariosSemanaNoReservas],
            'backgroundColors' => ['rgba(250, 204, 21, 0.2)', 'rgba(219, 39, 119, 0.2)'],
        ];

        $reservasConOrden = Reserva::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->has('orden')
            ->count();
        $reservasSinOrden = Reserva::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->doesntHave('orden')
            ->count();

        $graficoDatos2 = [
            'labels' => ['Si adjuntó orden', 'No adjuntó orden'],
            'datasets' => [$reservasConOrden, $reservasSinOrden],
            'backgroundColors' => ['rgba(250, 204, 21, 0.2)', 'rgba(219, 39, 119, 0.2)'],
        ];

        return view('estadistica.index', compact('productoMasVendido', 'productosMasVendidos','usuariosSemana', 'ordenesSemana', 'reservasSemana', 'graficoDatos1', 'graficoDatos2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
