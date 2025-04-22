<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::query()->orderBy('id', 'desc');

        if (request()->has('buscar')) {
            $productos = $productos->where('nombre', 'like', request()->get('buscar', '') . '%');
        }

        $productos = $productos->simplePaginate(8);

        return view('producto.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::query()->orderBy('id', 'desc')->simplePaginate(100);
        return view('producto.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'categoria_id' => ['required', 'int'],
            'precio' => ['required', 'decimal:0,5'],
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = time() . '.' . $request->imagen->extension();
        $request->imagen->move(public_path('images/uploads/'), $imageName);
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->categoria_id = $request->categoria_id;
        $producto->precio = $request->precio;
        $producto->imagen = 'images/uploads/' . $imageName;
        $producto->save();


        return to_route('producto.index', $producto);
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
    public function edit(Producto $producto)
    {
        $categorias = Categoria::query()->orderBy('id', 'desc')->simplePaginate(100);
        return view('producto.edit', ['producto' => $producto, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'categoria_id' => ['required', 'int'],
            'precio' => ['required', 'decimal:0,5'],
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageName = time() . '.' . $request->imagen->extension();
        $request->imagen->move(public_path('images/uploads/'), $imageName);
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->categoria_id = $request->categoria_id;
        $producto->precio = $request->precio;
        $producto->imagen = 'images/uploads/' . $imageName;
        $producto->save();


        return to_route('producto.index', $producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return to_route('producto.index');
    }
}
