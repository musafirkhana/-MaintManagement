<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;
use App\ItemConsumeModel;
use App\TradeModel;
use App\ClassModel;
use App\AircraftModel;

class ConsumeItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
          $datas = DB::table('item_consumption')
          ->leftJoin('trade_models', 'item_consumption.trade_name', '=', 'trade_models.id')
          ->leftJoin('class_list', 'item_consumption.class_id', '=', 'class_list.id')
          ->select('item_consumption.*', 'trade_models.name as trade_name','class_list.name as class_id')->get();
          $data['datas'] = $datas;
          
          return view('item-consume-mgmt/index',['datas' => $datas]);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

    }
   
 

   
    public function show($id){
        $datas = ItemConsumeModel::find($id);
    
        if ($datas == null) {
            return redirect()->intended('/item-consume-mgmt');
        }
    

        return view('item-consume-mgmt/view', ['data' => $datas]);
    }
   

  
   
    public function edit($id)
    {
        //
       
    }


    public function search(Request $request) {
        $constraints = [
            'from' => $request['start_date'],
            'to' => $request['end_date']
        ];
       
      
        $datas = $this->getReceivedItemList($constraints);
        return view('item-consume-mgmt/index',['datas' => $datas]);
    }
    private function getReceivedItemList($constraints) {
        $data = ItemConsumeModel::where('consumption_date', '>=', $constraints['from'])
                        ->where('consumption_date', '<=', $constraints['to'])
                        ->get();
        return $data;
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
           
    }
    
    private function validateInput($request) {
        
        $rules = [
            'part_no' => 'required|min:2|max:300',
            'trade_name' => 'required|max:100'

        ];
        $validator=Validator::make($request->all(), $rules);
        return $validator;
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

   
   
}
