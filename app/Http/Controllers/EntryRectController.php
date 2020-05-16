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
          $datas = DB::table('entryand_rectification_models')
          ->leftJoin('trade_models', 'entryand_rectification_models.trade_name', '=', 'trade_models.id')
          ->leftJoin('aircraft', 'entryand_rectification_models.ac_ser_no', '=', 'aircraft.id')
          ->leftJoin('entry_type_models', 'entryand_rectification_models.type_name', '=', 'entry_type_models.id')
          ->select('entryand_rectification_models.*', 'trade_models.name as trade_name','aircraft.name as ac_ser_no'
          ,'entry_type_models.name as type_name')->get();
          $data['datas'] = $datas;
          

        return view('entry-rect-mgmt/index',['datas' => $datas]);
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
        dd( $request);
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
