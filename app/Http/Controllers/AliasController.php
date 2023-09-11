<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAliasRequest;
use App\Http\Requests\UpdateAliasRequest;
use App\Models\Alias;

class AliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAliasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAliasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alias  $alias
     * @return \Illuminate\Http\Response
     */
    public function show(Alias $alias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alias  $alias
     * @return \Illuminate\Http\Response
     */
    public function edit(Alias $alias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAliasRequest  $request
     * @param  \App\Models\Alias  $alias
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAliasRequest $request, Alias $alias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alias  $alias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alias $alias)
    {
        //
    }
}
