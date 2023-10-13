<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Empleado;
use App\Models\Cargo;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $empleados = Empleado::where('foto', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('apellido', 'LIKE', "%$keyword%")
                ->orWhere('correo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $empleados = Empleado::latest()->paginate($perPage);
        }

        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cargos = Cargo::all();
        $estados = [
            1 => 'Activo',
            2 => 'Inactivo'
        ];

        return view('empleados.create', compact('cargos','estados'));
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
            'foto' => 'string|max:150',
            'nombre' => 'string|required|max:150',
            'apellido' => 'string|required|max:150',
            // 'correo' => 'string|required|max:100|unique:empleados', si es que hay que controlar unique en dirección de mail
            'correo' => 'string|max:100|nullable',
            'cargo' => 'required',
            'estado' => 'required',
        );

        $validator =  Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        //$requestData = $request->all();
        //        if ($request->hasFile('foto')) {
        //    $requestData['foto'] = $request->file('foto')
        //        ->store('uploads', 'public');
        //}

        $empleados = new Empleado;
        $empleados->nombre = $request->input('nombre');
        $empleados->apellido = $request->input('apellido');
        $empleados->correo = $request->input('correo');
        $empleados->foto = $request->input('foto');
        $empleados->cargo_id = $request->input('cargo');
        $empleados->estado = $request->input('estado');
        $empleados->save();
        //Empleado::create($requestData);

        return redirect('empleados')->with('flash_message', 'Empleado agregado!');
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
        $empleado = Empleado::findOrFail($id);

        return view('empleados.show', compact('empleado'));
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
        $empleado = Empleado::findOrFail($id);
        $cargos = Cargo::all();
        $estados = [
            1 => 'Activo',
            2 => 'Inactivo'
        ];

        return view('empleados.edit', compact('empleado','cargos','estados'));
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
            'foto' => 'string|max:150',
            'nombre' => 'string|required|max:150',
            'apellido' => 'string|required|max:150',
            'correo' => 'string|max:100|nullable',
            'cargo' => 'required',
            'estado' => 'required',
        );

        $validator =  Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $requestData = $request->all();
                if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')
                ->store('uploads', 'public');
        }

        $empleados = Empleado::findOrFail($id);
        $estados = [
            1 => 'Activo',
            2 => 'Inactivo'
        ];

        $empleados->nombre = $request->input('nombre');
        $empleados->apellido = $request->input('apellido');
        $empleados->correo = $request->input('correo');
        $empleados->foto = $request->input('foto');
        $empleados->cargo_id = $request->input('cargo');
        $empleados->estado = $request->input('estado');
        $empleados->save();

        // $empleado->update($requestData);

        return redirect('empleados')->with('flash_message', 'Empleado actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Empleado::destroy($id);

        return redirect('empleados')->with('flash_message', 'Empleado deleted!');
    }
}
