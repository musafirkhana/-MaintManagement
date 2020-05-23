<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AircraftModel;
use App\AddFlghrsModel;
use App\MsnTypeModel;



class FlgHrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('flg_hours')
        ->leftJoin('aircraft', 'flg_hours.ac_ser_no', '=', 'aircraft.id')
        ->leftJoin('msn_table', 'flg_hours.msn_type', '=', 'msn_table.id')
        ->select('flg_hours.*', 'aircraft.name as ac_ser_no','msn_table.name as msn_type')->get();
        
        $data['datas'] = $datas;
     
        return view('ac-flghrs-mgmt/index',['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $acDatas = AircraftModel::all();
        $msnDatas = MsnTypeModel::all();
        return view('ac-flghrs-mgmt/create',['acData' => $acDatas,'msnData' => $msnDatas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $time=$request['flg_date'];
        $month=date("F",strtotime($time));
        $year=date("Y",strtotime($time));
        $keys = ['ac_ser_no', 'flg_date','pilot'
        , 'co_pilot', 'msn_type', 'flg_hours'
        , 'total_ldg', 'cycle_completed', 'remarks'];
        $input = $this->createQueryInput($keys, $request);
        $input['month'] = $month;
        $input['year'] = $year;
        $this->validateInput($request); 
        AddFlghrsModel::create($input);
        return redirect()->intended('/ac-flghrs-mgmt');
        
       
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
            'pilot' => 'required|max:500'
        ]);
    }
}
