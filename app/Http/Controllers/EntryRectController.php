<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TradeModel;
use App\AircraftModel;
use App\EntryTypeModel;
use App\EntryandRectificationModel;

class EntryRectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
          $AcDatas = AircraftModel::all();
          $TradeDatas = TradeModel::orderBy('id', 'DESC')->get();
          $datas = DB::table('entryand_rectification_models')
          ->leftJoin('trade_models', 'entryand_rectification_models.trade_name', '=', 'trade_models.id')
          ->leftJoin('aircraft', 'entryand_rectification_models.ac_ser_no', '=', 'aircraft.id')
          ->leftJoin('entry_type_models', 'entryand_rectification_models.type_name', '=', 'entry_type_models.id')
          ->select('entryand_rectification_models.*', 'trade_models.name as trade_name','aircraft.name as ac_ser_no'
          ,'entry_type_models.name as type_name')->get();
          $data['datas'] = $datas;
          

        return view('entry-rect-mgmt/index',['datas' => $datas,'AcData' => $AcDatas,'TradeData' => $TradeDatas,
        'ac_ser_no' => '1000'
        ,'trade' => '1007']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $TradeDatas = TradeModel::all();
        $AcDatas = AircraftModel::all();
        $TypeDatas = EntryTypeModel::all();
        return view('entry-rect-mgmt/create', ['TradeData' => $TradeDatas, 'AcData' => $AcDatas,'TypeData' => $TypeDatas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keys = ['trade_name', 'type_name', 'ac_ser_no', 'date_of_entry', 'description'
        , 'replacement_any', 'rect_description', 'date_of_rect'
        , 'remarks', 'workers', 'supervisor'];
        $input = $this->createQueryInput($keys, $request);
        $this->validateInput($request); 
        EntryandRectificationModel::create($input);
        return redirect()->intended('/entry-rect-mgmt');
    }

    public function storeaircraft(Request $request)
    {
        $keys = ['name'];
        $input = $this->createQueryInput($keys, $request);
        AircraftModel::create($input);
        
        return redirect()->intended('/entry-rect-mgmt/create');
    }
    public function storeEnType(Request $request)
    {
        $keys = ['name'];
        $input = $this->createQueryInput($keys, $request);
        EntryTypeModel::create($input);
        
        return redirect()->intended('/entry-rect-mgmt/create');
    }
    

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = EntryandRectificationModel::where('entryand_rectification_models.id',$id)
          ->leftJoin('trade_models', 'entryand_rectification_models.trade_name', '=', 'trade_models.id')
          ->leftJoin('aircraft', 'entryand_rectification_models.ac_ser_no', '=', 'aircraft.id')
          ->leftJoin('entry_type_models', 'entryand_rectification_models.type_name', '=', 'entry_type_models.id')
          ->select('entryand_rectification_models.*', 'trade_models.name as trade_name','aircraft.name as ac_ser_no'
          ,'entry_type_models.name as type_name')->first();
          $data['datas'] = $datas;
       
        return view('entry-rect-mgmt/view',['data' => $datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $TradeDatas = TradeModel::all();
        $AcDatas = AircraftModel::all();
        $TypeDatas = EntryTypeModel::all();
        $datas=EntryandRectificationModel::where('id', $id)->first();
        return view('entry-rect-mgmt/edit', ['TradeData' => $TradeDatas,
         'AcData' => $AcDatas,'TypeData' => $TypeDatas,'datas' => $datas]);
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
        $datas = EntryandRectificationModel::findOrFail($id);
        $this->validateInput($request);
        $keys = ['trade_name', 'type_name', 'ac_ser_no', 'date_of_entry', 'description'
        , 'replacement_any', 'rect_description', 'date_of_rect'
        , 'remarks', 'workers', 'supervisor'];
        $input = $this->createQueryInput($keys, $request);

        EntryandRectificationModel::where('id', $id)
            ->update($input);

        return redirect()->intended('/entry-rect-mgmt');
    }
    public function search(Request $request) {

        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        
        if(is_null($start_date) || is_null($end_date) ){
            $start_date = '1000-01-01';
            $end_date = '9999-12-31';
        }
        $trade=$request['trade_id'];
        if(strcmp($trade,'1007')==0){
            $trade='';
        }
        $ac_ser_no=$request['ac_id'];
        if(strcmp($ac_ser_no,'1000')==0){
            $ac_ser_no='';
        }
        $TradeDatas = TradeModel::orderBy('id', 'DESC')->get();
        $AcDatas = AircraftModel::orderBy('id', 'DESC')->get();
       

        $datas = EntryandRectificationModel::Where('entryand_rectification_models.trade_name', 'like', '%' . $trade . '%')
        ->Where('entryand_rectification_models.ac_ser_no', 'like', '%' . $ac_ser_no . '%')
        ->where('entryand_rectification_models.date_of_entry', '>=', $start_date)
        ->where('entryand_rectification_models.date_of_entry', '<=', $end_date)
        ->leftJoin('trade_models', 'entryand_rectification_models.trade_name', '=', 'trade_models.id')
        ->leftJoin('aircraft', 'entryand_rectification_models.ac_ser_no', '=', 'aircraft.id')
        ->leftJoin('entry_type_models', 'entryand_rectification_models.type_name', '=', 'entry_type_models.id')
        ->select('entryand_rectification_models.*', 'trade_models.name as trade_name','aircraft.name as ac_ser_no'
        ,'entry_type_models.name as type_name')->get();
      
             
        $data['datas'] = $datas;
        return view('entry-rect-mgmt/index',['datas' => $datas, 'TradeData' => $TradeDatas,'AcData' => $AcDatas,'ac_ser_no' => $request['ac_id']
        ,'trade' => $request['trade_id']]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
    public function remove($id)
    {
        EntryandRectificationModel::where('id', $id)->delete();
        return redirect()->intended('/entry-rect-mgmt');
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
            'workers' => 'required|max:500'
        ]);
    }
}
