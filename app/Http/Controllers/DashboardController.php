<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AddFlghrsModel;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard');
    }

    function getAllMonth(){
        $month_array=array();
        $flg_dates = AddFlghrsModel::orderBy('flg_date','ASC')->pluck('flg_date');
        if(!empty($flg_dates)){
            foreach ($flg_dates as $unformated_date){
                $month_no=date("m",strtotime($unformated_date));
                $month_name=date("M",strtotime($unformated_date));
                $month_array[$month_no]=$month_name;
            }
        }
        return $month_array;
    } 

    function getMonthlyCount($month,$ac_ser_no){
        $monthly_count_data = AddFlghrsModel::whereMonth('flg_date',$month)
        ->where('ac_ser_no',$ac_ser_no)
        ->get()->sum('flg_hours');
        return $monthly_count_data;
    } 
    function getMonthlyData(){
        $monthly_flg_counr_array=array();
        $monthly_flg_counr_array_3014=array();
        $monthly_flg_counr_array_3015=array();
        $month_array=$this->getAllMonth();
        $month_name_array=array();
        if(!empty($month_array)){
          
            foreach ($month_array as $month_no=>$month_name){
                    $monthly_flg_count=$this->getMonthlyCount($month_no,'1');
                    $monthly_flg_count_3014=$this->getMonthlyCount($month_no,'2');
                    $monthly_flg_count_3015=$this->getMonthlyCount($month_no,'3');
                    array_push($monthly_flg_counr_array,$monthly_flg_count);
                    array_push($monthly_flg_counr_array_3014,$monthly_flg_count_3014);
                    array_push($monthly_flg_counr_array_3015,$monthly_flg_count_3015);
                    array_push($month_name_array,$month_name);
            }
            $month_array=$this->getAllMonth();
            $monthly_flg_data_array =array(
                'months'=>$month_name_array,
                'flg_count_array'=>$monthly_flg_counr_array,
                'monthly_flg_counr_array_3014'=>$monthly_flg_counr_array_3014,
                'monthly_flg_counr_array_3015'=>$monthly_flg_counr_array_3015,
            );
        }
       
        return $monthly_flg_data_array;
    } 

    function getYearSumData(){
        $year_array=array();
        
        
        $datas = DB::select( DB::raw("SELECT aircraft.name as name,ceil(sum(flg_hours.flg_hours)) as hrs FROM flg_hours 
        LEFT JOIN aircraft ON flg_hours.ac_ser_no=aircraft.id where year='2019' GROUP BY aircraft.id,aircraft.name
        ") );
       
        if(!empty($datas)){
            foreach ($datas as $unformated_date){
                array_push($year_array,$unformated_date->hrs);
            }
            $yearly_flg_data_array =array(
                'year'=>$year_array,
            );
        }
        return $yearly_flg_data_array;

       
    } 
}
