<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundRequest;
use App\Http\Requests\UpdateFundRequest;
use App\Models\Fund;
use App\Models\FundsCompany;
use App\Models\Alias;
use Illuminate\Http\Request;
use App\Http\Resources\FundResource;
use App\Http\Resources\FundCollection;

use Illuminate\Support\Facades\DB;
use App\Providers\DuplicateFundWarningEvent;


class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = [];
        if ($request->fundName != "") {
            $filter[] = ['name', 'like', '%'.$request->fundName.'%'];
        }
        if ($request->fundsManagerId != "") {
            $filter[] = ['funds_manager_id', $request->fundsManagerId];
        }
        if ($request->startYear != "") {
            $filter[] =  ['start_year', $request->startYear];
        }

        try {
            return new FundCollection(
                Fund::where($filter)
                    ->with('fundsManager')
                    ->with('aliases')
                    ->with('companies')
                    ->get()
            );
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
     * @param  \App\Http\Requests\StoreFundRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFundRequest $request)
    {
        try {
            //first verify duplicate, then add fund
            $duplicate = $this->verifyDuplicate($request);
            $newFund = Fund::create($request->all());
            //if duplicate was verified, trigger event including the added fund
            if ($duplicate) {
                event (new DuplicateFundWarningEvent($newFund));
            }
            return response(new FundResource ($newFund), 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function show(Fund $fund)
    {
        try {
            return new FundResource ($fund
                ->loadMissing('fundsManager')
                ->loadMissing('aliases')
                ->loadMissing('companies')
            );
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function edit(Fund $fund)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFundRequest  $request
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFundRequest $request, Fund $fund)
    {
        try {
            $fund->update($request->all());
            if ($request->aliases) {
                $newAliases = [];
                foreach ($request->aliases as $alias) {
                    $newAliases[] = ['fund_id' => $fund->id, 'alias' => $alias];
                }
                Alias::where('fund_id', $fund->id)->delete();
                Alias::insert($newAliases);
            }

            if ($request->companies) {
                $newCompanies = [];
                foreach ($request->companies as $company_id) {
                    $newCompanies[] = ['fund_id' => $fund->id, 'company_id' => $company_id];
                }
                FundsCompany::where('fund_id', $fund->id)->delete();
                FundsCompany::insert($newCompanies);
            }
            return response('', 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fund $fund)
    {
        //
    }

    /**
     * Verify if there is any fund with the same manager and (name or alias).
     * If found, returns true
     *
     * @param  \App\Http\Requests\StoreFundRequest  $request
     * @return Boolean
     */
    private function verifyDuplicate ($request) {
        /*
        SELECT count(f.id) AS repeted FROM funds f
        LEFT JOIN aliases a ON f.id = a.fund_id
        WHERE f.funds_manager_id = $_MANAGER_ID
        AND (f.name = $_FUND_NAME OR a.alias = $_FUND_NAME)

        (if repeated is 0, then there is no repetition)
        */
        $result = DB::table('funds')
            ->leftJoin ('aliases', 'funds.id', '=', 'aliases.fund_id')
            ->select ('funds.id')
            ->where('funds.funds_manager_id', $request->funds_manager_id)
            ->where (function ($query) use ($request) {
                $query->where ('funds.name','=', $request->name)
                    ->orWhere ('aliases.alias','=', $request->name);
            })
            ->count();
        return ($result > 0);
    }
}
