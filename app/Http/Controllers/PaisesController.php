<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisesController extends Controller
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
            $paises = Pais::where('nombre', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $paises = Pais::latest()->paginate($perPage);
        }

        return view('paises.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('paises.create');
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

        $requestData = $request->all();

        Pais::create($requestData);

        return redirect('paises')->with('flash_message', 'Pais added!');
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
        $paise = Pais::findOrFail($id);

        return view('paises.show', compact('paise'));
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
        $paise = Pais::findOrFail($id);

        return view('paises.edit', compact('paise'));
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

        $paise = Pais::findOrFail($id);
        $paise->update($requestData);

        return redirect('paises')->with('flash_message', 'Pais updated!');
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
        Pais::destroy($id);

        return redirect('paises')->with('flash_message', 'Pais deleted!');
    }
}
