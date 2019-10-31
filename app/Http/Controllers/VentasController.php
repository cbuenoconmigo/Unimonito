<?php

namespace App\Http\Controllers;

use App\Modelos\productos;
use App\Modelos\usuarios;
use App\Modelos\ventas;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    protected $productos;
    protected $usuarios;
    protected $ventas;

    public function __construct()
    {
        $this->productos = new productos();
        $this->usuarios = new usuarios();
        $this->ventas = new ventas();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sistema.ventas.lista')
            ->with('ventas', $this->ventas->listarVentas());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.ventas.crear')
            ->with('productos', $this->productos->obtenerListaProductos())
            ->with('usuarios', $this->usuarios->listarUsuarios());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->ventas->crearVenta($request->all())) {
            return redirect()->route('ventas.create')->withErrors("Venta existosa");
        } else {
            return redirect()->back()->withErrors("No se pudo generar la venta");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('sistema.ventas.ver')->with('venta', $this->ventas->buscarVenta($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
