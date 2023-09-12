<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundsManagerRequest;
use App\Http\Requests\UpdateFundsManagerRequest;
use App\Models\FundsManager;

use App\Http\Resources\FundsManagerResource;
use App\Http\Resources\FundsManagerCollection;


class FundsManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return new FundsManagerCollection(FundsManager::all());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
     * @param  \App\Http\Requests\StoreFundsManagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFundsManagerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FundsManager  $fundsManager
     * @return \Illuminate\Http\Response
     */
    public function show(FundsManager $fundsManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundsManager  $fundsManager
     * @return \Illuminate\Http\Response
     */
    public function edit(FundsManager $fundsManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFundsManagerRequest  $request
     * @param  \App\Models\FundsManager  $fundsManager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFundsManagerRequest $request, FundsManager $fundsManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundsManager  $fundsManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundsManager $fundsManager)
    {
        //
    }
}
