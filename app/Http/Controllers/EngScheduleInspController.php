<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AircraftModel;
use App\InspTypeModel;
use App\ScheduleInspENgModel;
use App\TboTsoModel;

class EngScheduleInspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('schedule_insp_engine')
        ->leftJoin('aircraft', 'schedule_insp_engine.ac_ser_no', '=', 'aircraft.id')
        ->leftJoin('insp_type', 'schedule_insp_engine.insp_type', '=', 'insp_type.id')
        ->select('schedule_insp_engine.*', 'aircraft.name as ac_ser_no','insp_type.insp_type as insp_type'
        ,'insp_type.insp_freq as insp_freq')->get();
        $data['datas'] = $datas;
        return view('engschedule-insp-mgmt/index',['datas' => $datas]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acDatas = AircraftModel::all();
        $inspDatas = InspTypeModel::Where('insp_type.insp_group', 'like', '%' . '2' . '%')
        ->select('insp_type.*')->get();
        return view('engschedule-insp-mgmt/create',['acData' => $acDatas,'inspData' => $inspDatas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    
        $keys = ['ac_ser_no', 'insp_type','due_hrs_lt_eng','due_hrs_rt_eng','remarks'];

        $input = $this->createQueryInput($keys, $request);
        $input['insp_freq'] = $request['insp_type'];
        $this->validateInput($request); 
        ScheduleInspENgModel::create($input);

        return redirect()->intended('/engschedule-insp-mgmt');
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
            'ac_ser_no' => 'required|unique:schedule_insp_engine,ac_ser_no,NULL,NULL,insp_type,'.$request['insp_type'],
            'insp_type' => 'required|unique:schedule_insp_engine,insp_type,NULL,NULL,ac_ser_no, ' . $request['ac_ser_no']
        ]);
    }
}
