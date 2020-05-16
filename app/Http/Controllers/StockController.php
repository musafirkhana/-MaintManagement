<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;
use App\StockModel;
use App\ItemReceivedModel;
use App\TradeModel;
use App\ClassModel;
use App\AircraftModel;
use App\ItemConsumeModel;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
          $tradeDatas = TradeModel::orderBy('id', 'DESC')->get();
          $datas = DB::table('stock_list')
          ->leftJoin('trade_models', 'stock_list.trade_name', '=', 'trade_models.id')
          ->leftJoin('class_list', 'stock_list.class_id', '=', 'class_list.id')
          ->select('stock_list.*', 'trade_models.name as trade_name','class_list.name as class_id')->get();

          $data['datas'] = $datas;
          
          return view('stock-mgmt/index',['datas' => $datas, 'tradeDatas' => $tradeDatas,
          'trade' => '1007']);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Datas = TradeModel::all();
        $ClassDatas = ClassModel::all();
        return view('stock-mgmt/create', ['Data' => $Datas, 'ClassData' => $ClassDatas]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $PartNo = StockModel::where('part_no', '=', $request['part_no'])
        ->where('item_location', '=', $request['item_location'])->first();
        if ($PartNo == null ) {
            StockModel::create([
                'trade_name' => $request['trade_name'],
                'eqpt_description' => $request['eqpt_description'],
                'qty_received' => $request['qty_received'],
                'qty_balance' => $request['qty_received'],
                'item_tbo' => $request['item_tbo'],
                'item_service_life' => $request['item_service_life'],
                'item_location' => $request['item_location'],
                'class_id' => $request['class_id'],
                'part_no' => $request['part_no'],
                'remarks' => $request['remarks']
            ]);
         }else {
            $qty_received=$PartNo['qty_received']+$request['qty_received'];  
            $balance=$qty_received-$PartNo['qty_consumed'];
            StockModel::where('id', $PartNo['id'])
            ->update( [
                'trade_name' => $request['trade_name'],
                'eqpt_description' => $request['eqpt_description'],
                'qty_received' => $qty_received,
                'qty_balance' => $balance,
                'item_tbo' => $request['item_tbo'],
                'item_service_life' => $request['item_service_life'],
                'item_location' => $PartNo['item_location'],
                'class_id' => $request['class_id'],
                'part_no' => $request['part_no'],
                'remarks' => $request['remarks']]);
         }
         $this->storeReceivedData($request);
         
         return redirect()->intended('/stock-mgmt');
    }

    private function storeReceivedData($request) {
        ItemReceivedModel::create([
            'trade_name' => $request['trade_name'],
            'part_no' => $request['part_no'],
            'eqpt_description' => $request['eqpt_description'],
            'qty_received' => $request['qty_received'],
            'qty_received_date' => $request['qty_received_date'],
            'item_tbo' => $request['item_tbo'],
            'item_service_life' => $request['item_service_life'],
            'item_location' => $request['item_location'],
            'class_id' => $request['class_id'],
            'remarks' => $request['remarks']
        ]);
    }
    public function show($id)
    {
        $Acdatas = AircraftModel::all();
        $datas = StockModel::where('stock_list.id',$id)
        ->leftJoin('trade_models', 'stock_list.trade_name', '=', 'trade_models.id')
        ->leftJoin('class_list', 'stock_list.class_id', '=', 'class_list.id')
        ->select('stock_list.*', 'trade_models.name as trade_name','class_list.name as class_id')->first();

        if ($datas == null) {
            return redirect()->intended('/stock-mgmt');
        }
    

        return view('stock-mgmt/create_consumption', ['data' => $datas, 'Acdata' => $Acdatas]);
    }
  
   
    public function edit($id)
    {
        //
       
    }


    public function search(Request $request) {

      
        $trade=$request['trade_id'];
        if(strcmp($trade,'1007')==0){
            $trade='';
        }
        $tradeDatas = TradeModel::orderBy('id', 'DESC')->get();
        $datas = StockModel::Where('stock_list.trade_name', 'like', '%' . $trade . '%')
        ->Where('stock_list.part_no', 'like', '%' . $request['part_no'] . '%')
        ->select('stock_list.*')->get();

        $data['datas'] = $datas;
        
        return view('stock-mgmt/index',['datas' => $datas, 'tradeDatas' => $tradeDatas,'status' => $request['item_status']
        ,'trade' => $request['trade_id']]);
    }
    private function doNullCheck($constraints) {
        
       
          
  
        return $datas;
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
        $data = $request->input();
        $res = array(
            'success' => false,
            'message' => 'Please fix the error below.',
            'rs_class' => 'danger',
            'data' => []
        );
        if ( $this->validateInput($request)->passes()) {
            
        
         $class_name = DB::table('class_list')
         ->where('name', $request['class_id'])
         ->select('class_list.id')->get();
        $receive_item = StockModel::where('id', $id)->first();
        $trade_name = $this->doSearchingQuery($request['trade_name'],TradeModel::class,'trade_models.name');
        $consumption_ac_ser = $this->doSearchingQuery($request['consumption_ac_ser'],AircraftModel::class,'aircraft.id');
        $class_id = $this->doSearchingQuery($class_name[0]->id,ClassModel::class,'class_list.id');
        $balance=$receive_item['qty_received']-$request['qty_consumed'];  
        $this->storeConsumedData($request,$class_id,$trade_name);
        StockModel::where('id', $id)
        ->update( [
        'trade_name' => $trade_name['id'],
        'part_no' => $data['part_no'],
        'eqpt_description' => $data['eqpt_description'],
        'qty_consumed' => $data['qty_consumed'],
        'qty_balance' => $balance,
        'item_tbo' => $data['item_tbo'],
        'item_service_life' => $data['item_service_life'],
        'item_location' => $data['item_location'],
        'class_id' => $class_id['id'],
        'remarks' => $data['remarks']]);
        return redirect()->intended('/stock-mgmt');
        
    } else {
            $this->validateInput($request)->errors();
            return response()->json($res, isset($res['code']) ? $res['code'] : 200);
        }
           
    }
    private function storeConsumedData($request,$class_id,$trade_name) {
            ItemConsumeModel::create([
            'trade_name' => $trade_name['id'],
            'part_no' => $request['part_no'],
            'eqpt_description' => $request['eqpt_description'],
            'consumption_date' => $request['consumption_date'],
            'consumption_ac_ser' => $request['consumption_ac_ser'],
            'qty_consumed' => $request['qty_consumed'],
            'item_tbo' => $request['item_tbo'],
            'item_service_life' => $request['item_service_life'],
            'item_location' => $request['item_location'],
            'class_id' => $class_id['id'],
            'remarks' => $request['remarks']
        ]);
    }
    private function validateInput($request) {
        
        $rules = [
            'part_no' => 'required|min:2|max:300',
            'trade_name' => 'required|max:100'

        ];
        $validator=Validator::make($request->all(), $rules);
        return $validator;
    }
    private function doSearchingQuery($constraints,$model,$nameofcolumn) {
        if(strcmp($nameofcolumn,'trade_models.name')==0){
            $query = $model::where('trade_models.name',$constraints)
            ->select('trade_models.*', 'trade_models.name as trade_name')->first();
        }else if(strcmp($nameofcolumn,'aircraft.id')==0){
            $query = $model::where($nameofcolumn,$constraints)
            ->select('aircraft.*', 'aircraft.id as aircraft.id')->first();
    
        }else if(strcmp($nameofcolumn,'class_list.id')==0){
            $query = $model::where($nameofcolumn,$constraints)
            ->select('class_list.*', 'class_list.id as class_list.id')->first();
           

        }else {
            $query='2';
        }
     
        return $query;
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

    public function remove($id)
    {
        //
        StockModel::where('id', $id)->delete();
        return redirect()->intended('/stock-mgmt');
    }
    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
}
