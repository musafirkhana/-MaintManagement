<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AircraftModel;
use App\AddFlghrsModel;
use App\MsnTypeModel;
use App\TboTsoModel;
use App\ScheduleInspacModel;
use App\ScheduleInspENgModel;



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
        ->select('flg_hours.*', 'aircraft.name as ac_ser_no','msn_table.name as msn_type')
        ->orderBy('flg_date', 'ASC')
        ->get();
        
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
        
   
        $prev_flghrs = DB::table('flg_hours')
                     ->select(DB::raw('sum(flg_hours) as flg_hours'))
                     ->where('ac_ser_no', 'like', '%' . $request['ac_ser_no'] . '%')
                     ->first();
        $total_flg_hours=$prev_flghrs->flg_hours+$request['flg_hours'];
        
        $this->updateScheduleInspEng($request);
        $this->updateTboTso($request);
        $this->updateScheduleInsp($request);
        
        $this->validateInput($request); 
        AddFlghrsModel::create($input);
        return redirect()->intended('/ac-flghrs-mgmt');
        
       
    }


    private function updateTboTso($request) {
        $data = TboTsoModel::where('ac_ser_no', '=', $request['ac_ser_no'])->first();
        $res = array(
            'success' => false,
            'message' => 'Please fix the error below.',
            'rs_class' => 'danger',
            'data' => []
        );
            
         TboTsoModel::where('ac_ser_no', $request['ac_ser_no'])
        ->update( [
        'ac_ser_no' => $data['ac_ser_no'],
        'ac_tso_hrs' => $data['ac_tso_hrs']+$request['flg_hours'],
        'ac_tbo_hrs' => $data['ac_tbo_hrs'],
        'eng_lt_tso_hrs' => $data['eng_lt_tso_hrs']+$request['flg_hours'],
        'eng_rt_tso_hrs' => $data['eng_rt_tso_hrs']+$request['flg_hours'],
        'eng_lt_tbo_hrs' => $data['eng_lt_tbo_hrs'],
        'eng_rt_tbo_hrs' => $data['eng_rt_tbo_hrs'],
        'prop_lt_tso_hrs' => $data['prop_lt_tso_hrs']+$request['flg_hours'],
        'prop_rt_tso_hrs' => $data['prop_rt_tso_hrs']+$request['flg_hours'],
        'prop_lt_tbo_hrs' => $data['prop_lt_tbo_hrs'],
        'prop_rt_tbo_hrs' => $data['prop_rt_tbo_hrs'],
        'remarks' => $data['remarks']]);
        return redirect()->intended('/ac-flghrs-mgmt');
        
   
    }


    private function updateScheduleInsp($request) {
        $data = ScheduleInspacModel::where('ac_ser_no', '=', $request['ac_ser_no'])->get(); 
        $tsoData = DB::table('ac_comp_tbotso')
                     ->select(DB::raw('ac_tso_hrs'))
                     ->where('ac_ser_no', 'like', '%' . $request['ac_ser_no'] . '%')
                     ->first();
        foreach ($data as $row) {
         
        ScheduleInspacModel::where('ac_ser_no', $request['ac_ser_no'])
        ->where('insp_type', $row['insp_type'])
        ->update( [
        'left_hrs' => $row['due_hrs']-$tsoData->ac_tso_hrs,
        'insp_carr_status' => $row['insp_carr_status'],
        'insp_carr_date' => $row['insp_carr_date'],
        'remarks' => $row['remarks']]);
        }
        return redirect()->intended('/ac-flghrs-mgmt');
    }

    private function updateScheduleInspEng($request) {
        $data = ScheduleInspENgModel::where('ac_ser_no', '=', $request['ac_ser_no'])->get(); 
      
        $lt_tsoData = DB::table('ac_comp_tbotso')
                     ->select(DB::raw('eng_lt_tso_hrs'))
                     ->where('ac_ser_no', 'like', '%' . $request['ac_ser_no'] . '%')
                     ->first();
        $rt_tsoData = DB::table('ac_comp_tbotso')
                     ->select(DB::raw('eng_rt_tso_hrs'))
                     ->where('ac_ser_no', 'like', '%' . $request['ac_ser_no'] . '%')
                     ->first();
        foreach ($data as $row) {
         
            ScheduleInspENgModel::where('ac_ser_no', $request['ac_ser_no'])
        ->where('insp_type', $row['insp_type'])
        ->update( [
        'left_hrs_lt_eng' => $row['due_hrs_lt_eng']-$lt_tsoData->eng_lt_tso_hrs,
        'left_hrs_rt_eng' => $row['due_hrs_rt_eng']-$rt_tsoData->eng_rt_tso_hrs,
        'insp_carr_status' => $row['insp_carr_status'],
        'insp_carr_date' => $row['insp_carr_date'],
        'remarks' => $row['remarks']]);
        }
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
