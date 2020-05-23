<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AircraftModel;
use App\TboTsoModel;
use Brian2694\Toastr\Facades\Toastr;


class TboTsoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('ac_comp_tbotso')
        ->leftJoin('aircraft', 'ac_comp_tbotso.ac_ser_no', '=', 'aircraft.id')
        ->select('ac_comp_tbotso.*', 'aircraft.name as ac_ser_no')->get();
        
        $data['datas'] = $datas;
     
        return view('tbo-tso-mgmt/index',['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acDatas = AircraftModel::all();
        return view('tbo-tso-mgmt/create',['acData' => $acDatas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keys = ['ac_ser_no', 'ac_tso_hrs','ac_tbo_hrs'
        , 'eng_lt_tso_hrs', 'eng_rt_tso_hrs', 'eng_lt_tbo_hrs'
        , 'eng_rt_tbo_hrs', 'prop_lt_tso_hrs', 'prop_rt_tso_hrs'
        , 'prop_lt_tbo_hrs', 'prop_rt_tbo_hrs', 'remarks'];


        $input = $this->createQueryInput($keys, $request);
        $this->validateInput($request); 

        TboTsoModel::create($input);

        return redirect()->intended('/tbo-tso-mgmt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
    private function validateInput($request) {
        $this->validate($request, [
            'ac_ser_no' => 'required|unique:ac_comp_tbotso|max:500'
            
        ]);
    }
}
