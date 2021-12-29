<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Http\Requests\VatStoreUpdateRequest;
use App\Models\Vat;
use App\Models\Vat2;

class VatController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $vats = Vat::simplePaginate();
        return view('modules.vat.index', compact('vats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $vat2s = Vat2::select('f_id', 'f_name')->orderBy('f_order')->get();

        return view('modules.vat.create', compact('vat2s'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VatStoreUpdateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(VatStoreUpdateRequest $request)
    {
        Vat::create($request->validated());

        return redirect()->route('vats.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vat $vat
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Vat $vat)
    {
        $vat2s = Vat2::select('f_id', 'f_name')->orderBy('f_order')->get();
        return view('modules.vat.edit', compact('vat2s', 'vat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VatStoreUpdateRequest $request
     * @param Vat $vat
     *
     * @return \Illuminate\Http\Response
     */
    public function update(VatStoreUpdateRequest $request, Vat $vat)
    {
        $vat->update($request->validated());
        return redirect()->route('vats.index')->withSuccess(trans('global.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vat $vat
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vat $vat)
    {
        try {
            $vat->delete();
            return redirect()->route('vats.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('vats.index')->withError(trans('global.delete_failed'));
        }
    }
}
