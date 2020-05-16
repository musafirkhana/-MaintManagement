<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\StockModel;
use App\TradeModel;
use App\ClassModel;
use App\AircraftModel;

class FilterStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($country_id,$country_) {
        
        dd($country_);
        if($country_id==000){
        $datas = StockModel::where('stock_list.item_status', 'like', '%'.'stock'.'%')
        ->leftJoin('trade_models', 'stock_list.trade_name', '=', 'trade_models.id')
        ->leftJoin('class_list', 'stock_list.class_id', '=', 'class_list.id')
        ->select('stock_list.*', 'trade_models.name as trade_name','class_list.name as class_id')->paginate(5);
        $data['datas'] = $datas;
    }else {
        $datas = StockModel::where('stock_list.trade_name', '=', $country_id,'and','stock_list.item_status','like', '%'.'stock'.'%' )
        ->leftJoin('trade_models', 'stock_list.trade_name', '=', 'trade_models.id')
        ->leftJoin('class_list', 'stock_list.class_id', '=', 'class_list.id')
        ->select('stock_list.*', 'trade_models.name as trade_name','class_list.name as class_id')->paginate(5);
        $data['datas'] = $datas;
    }
         
        
         
      
          return view('stock-mgmt/index',$data);
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
    public function store(Request $request){}
    
    

  
    public function show($id){}
    
    
  
   
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

   
   
}
