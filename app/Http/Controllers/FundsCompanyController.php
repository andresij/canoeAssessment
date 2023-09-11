<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundsCompanyRequest;
use App\Http\Requests\UpdateFundsCompanyRequest;
use App\Models\FundsCompany;

class FundsCompanyController extends Controller
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
     * @param  \App\Http\Requests\StoreFundsCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFundsCompanyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FundsCompany  $fundsCompany
     * @return \Illuminate\Http\Response
     */
    public function show(FundsCompany $fundsCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundsCompany  $fundsCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(FundsCompany $fundsCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFundsCompanyRequest  $request
     * @param  \App\Models\FundsCompany  $fundsCompany
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFundsCompanyRequest $request, FundsCompany $fundsCompany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundsCompany  $fundsCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundsCompany $fundsCompany)
    {
        //
    }
}
