<?php

namespace App\Http\Controllers;

use App\lokasi_parkir;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the outlet.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('manage_lokasi_rambu');

        $lokasi_parkir = lokasi_parkir::query();
        $lokasi_parkir->where('name', 'like', '%'.request('q').'%');
        $lokasi_parkir = $lokasi_parkir->paginate(25);

        return view('outlets.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new outlet.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new loasi_parkir);

        return view('lokasi_parkir.create');
    }

    /**
     * Store a newly created outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new lokasi_parkir);

        $lokasi_parkir = $request->validate([
            'name'      => 'required|max:60',
            'address'   => 'nullable|max:255',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
        ]);
        $lokasi_parkir['creator_id'] = auth()->id();

        $lokasi_parkir = lokasi_parkir::create($lokasi_parkir);

        return redirect()->route('lokasi_parkir.show', $lokasi_parkir);
    }

    /**
     * Display the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function show( $id)
    {
        $lokasi_parkir =lokasi_parkir::findOrFail($id);
        return view('lokasi_parkir.show', compact('lokasi_parkir'));
    }

    /**
     * Show the form for editing the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function edit(lokasi_parkir $lokasi_parkir)
    {
        $this->authorize('update', $lokasi_parkir);

        return view('lokasi_parkir.edit', compact('lokasi_parkir'));
    }

    /**
     * Update the specified outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, lokasi_parkir $lokasi_parkir)
    {
        $this->authorize('update', $lokasi_parkir);

        $lokasi_parkir = $request->validate([
            'name'      => 'required|max:60',
            'address'   => 'nullable|max:255',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
        ]);
        $lokasi_parkir->update($lokasi_parkir);

        return redirect()->route('lokasi_parkir.show', $lokasi_parkir);
    }

    /**
     * Remove the specified outlet from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, lokasi_parkir $lokasi_parkir)
    {
        $this->authorize('delete', $lokasi_parkir);

        $request->validate(['lokasi_parkir_id' => 'required']);

        if ($request->get('lokasi_parkir_id') == $lokasi_parkir->id && $lokasi_parkir->delete()) {
            return redirect()->route('lokasi_parkir.index');
        }

        return back();
    }
}
