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
        $perPage = 25;

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
            'descripcion' => 'string|required|max:20'
        );

        $validator =  Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $requestData = $request->all();

        Cargo::create($requestData);

        return redirect('cargos')->with('flash_message', 'Cargo added!');
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
    public function destroy($id)
    {
        Cargo::destroy($id);

        return redirect('cargos')->with('flash_message', 'Cargo deleted!');
    }
}