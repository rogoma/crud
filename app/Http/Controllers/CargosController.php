<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $cargos = Cargo::where('descripcion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cargos = Cargo::latest()->paginate($perPage);
        }

        return view('cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cargos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $rules = array(
            'descripcion' => 'string|required|max:200|unique:cargos',
            'estado' => 'numeric|required|min:1|max:2',
        );

        $validator =  Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $requestData = $request->all();
        Cargo::create($requestData);
        return redirect('cargos')->with('flash_message', 'Cargo agregado!');

        // $estado = intval($request->input(('estado')));

        // // print_r($estado);exit;

        // if($estado <0){
        //     $validator->errors()->add('estado', 'estado debe ser mayor a 0');
        //     return back()->withErrors($validator)->withInput();
        // }else{
        //     $requestData = $request->all();
        //     Cargo::create($requestData);
        //     return redirect('cargos')->with('flash_message', 'Cargo added!');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cargo = Cargo::findOrFail($id);

        return view('cargos.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cargo = Cargo::findOrFail($id);

        return view('cargos.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $rules = array(
            'descripcion' => 'string|required|max:200',
            'estado' => 'numeric|required|min:1|max:2',
        );

        $validator =  Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $requestData = $request->all();

        $cargo = Cargo::findOrFail($id);
        $cargo->update($requestData);

        return redirect('cargos')->with('flash_message', 'Cargo updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        $cargo = Cargo::find($id);

        // Chequeamos si existen usuarios referenciando a departamentos
        if($cargo->empleados->count() > 0){
            //return response()->json(['status' => 'error', 'message' => 'No se ha podido eliminar el cargo debido a que se encuentra vinculado a Empleados ', 'code' => 200], 200);
            $request->session()->flash('message', 'No se ha podido eliminar el cargo debido a que se encuentra vinculado a Empleados');
            return redirect('cargos')->with('flash_message', 'Cargo NO borrado!');
        }

        Cargo::destroy($id);

        return redirect('cargos')->with('flash_message', 'Cargo borrado!');
    }
}
