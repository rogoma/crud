<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
use Illuminate\Support\Facades\Validator;
=======
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f

use App\Http\Controllers\Controller;
use App\Http\Requests;

<<<<<<< HEAD
use App\Models\Empleado;
use App\Models\Cargo;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
=======
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
<<<<<<< HEAD
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
=======
        $perPage = 25;

        if (!empty($keyword)) {
            $usuarios = Usuario::where('nombre', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $usuarios = Usuario::latest()->paginate($perPage);
        }

        return view('usuarios.index', compact('usuarios'));
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
<<<<<<< HEAD
        $cargos = Cargo::all();
        $estados = [
            1 => 'Activo',
            2 => 'Inactivo'
        ];

        return view('empleados.create', compact('cargos','estados'));
=======
        return view('usuarios.create');
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f
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
<<<<<<< HEAD

        $rules = array(
            'foto' => 'string|max:150',
            'nombre' => 'string|required|max:150',
            'apellido' => 'string|required|max:150',
            // 'correo' => 'string|required|max:100|unique:empleados', si es que hay que controlar unique en dirección de mail
            'correo' => 'string|max:100|nullable',
            'cargo_id' => 'required',
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

        // $requestData = $request->all(); REEEMPLAZA A TODO LO DE ABAJO PERO CADA OBJETO DEBE SER IGUAL AL NOMBRE DEL CAMPO DECLARADO EN EL MODELO Y EN LA VISTA
        //(EJEMPLO cargo_id)

        // $empleados = new Empleado;
        // $empleados->nombre = $request->input('nombre');
        // $empleados->apellido = $request->input('apellido');
        // $empleados->correo = $request->input('correo');
        // $empleados->foto = $request->input('foto');
        // $empleados->cargo_id = $request->input('cargo');
        // $empleados->estado = $request->input('estado');
        // $empleados->save();
        $requestData = $request->all();
        Empleado::create($requestData);

        return redirect('empleados')->with('flash_message', 'Empleado agregado!');
=======
        
        $requestData = $request->all();
        
        Usuario::create($requestData);

        return redirect('usuarios')->with('flash_message', 'Usuario added!');
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f
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
<<<<<<< HEAD
        $empleado = Empleado::findOrFail($id);

        return view('empleados.show', compact('empleado'));
=======
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.show', compact('usuario'));
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f
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
<<<<<<< HEAD
        $empleado = Empleado::findOrFail($id);
        $cargos = Cargo::all();
        $estados = [
            1 => 'Activo',
            2 => 'Inactivo'
        ];

        return view('empleados.edit', compact('empleado','cargos','estados'));
=======
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f
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
<<<<<<< HEAD
        $rules = array(
            'foto' => 'string|max:150',
            'nombre' => 'string|required|max:150',
            'apellido' => 'string|required|max:150',
            'correo' => 'string|max:100|nullable',
            'cargo_id' => 'required',
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

        // $empleados->nombre = $request->input('nombre');
        // $empleados->apellido = $request->input('apellido');
        // $empleados->correo = $request->input('correo');
        // $empleados->foto = $request->input('foto');
        // $empleados->cargo_id = $request->input('cargo');
        // $empleados->estado = $request->input('estado');
        // $empleados->save();

        // print_r($request->input('cargo'));
        // print_r($empleados->cargo_id);exit;

        $requestData = $request->all();
        $empleados->update($requestData);

        return redirect('empleados')->with('flash_message', 'Empleado actualizado!');
=======
        
        $requestData = $request->all();
        
        $usuario = Usuario::findOrFail($id);
        $usuario->update($requestData);

        return redirect('usuarios')->with('flash_message', 'Usuario updated!');
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f
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
<<<<<<< HEAD
        Empleado::destroy($id);

        return redirect('empleados')->with('flash_message', 'Empleado deleted!');
=======
        Usuario::destroy($id);

        return redirect('usuarios')->with('flash_message', 'Usuario deleted!');
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f
    }
}
