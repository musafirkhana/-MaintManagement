<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PcmModel;
use Excel;
use App\Exports\PcmExport;
use Illuminate\Support\Facades\DB;

use Auth;
use PDF;

class ReportController extends Controller
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

    public function index() {
        
        $request='2020';
        
            $constraints = [
                'yearof_demand' => $request
                ];
        $data = $this->getpcmlistData($constraints);
        return view('report/index', ['datas' => $data, 'searchingVals' => $constraints]);
    }

    public function exportExcel(Request $request) {

        return Excel::download(new PcmExport( $request['yearof_demand']), 'users.xlsx');
        
        redirect()->intended('report/index');
    }

    public function exportPDF(Request $request) {
        $constraints = [
            'yearof_demand' => $request
            ];
        $employees = $this->getallData(['yearof_demand'=> $request['yearof_demand']]);
        $pdf = PDF::loadView('report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
        return $pdf->download('report_from_'. $request['yearof_demand'].'_to_'.$request['yearof_demand'].'pdf');
        // return view('system-mgmt/report/pdf', ['employees' => $employees, 'searchingVals' => $constraints]);
    }
    
    private function prepareExportingData($request) {
        $author = Auth::user()->username;
        $employees = $this->getallData(['yearof_demand'=> $request['yearof_demand']]);
        return Excel::create('report_from_'. $request['yearof_demand'].'_to_'.$request['yearof_demand'], function($excel) use($employees, $request, $author) {

        // Set the title
        $excel->setTitle('List of hired employees from '. $request['yearof_demand'].' to '. $request['yearof_demand']);

        // Chain the setters
        $excel->setCreator($author)
            ->setCompany('HoaDang');

        // Call them separately
        $excel->setDescription('The list of hired employees');

        $excel->sheet('Hired_Employees', function($sheet) use($employees) {

        $sheet->fromArray($employees);
            });
        });
    }

    public function search(Request $request) {
        $constraints = [
            'yearof_demand' => $request['yearof_demand']
            ];

        $data = $this->getpcmlistData($constraints);
        return view('report/index', ['datas' => $data, 'searchingVals' => $constraints]);
    }

    private function getHiredEmployees($constraints) {
        $employees = Employee::where('date_hired', '>=', $constraints['from'])
                        ->where('date_hired', '<=', $constraints['to'])
                        ->get();
        return $employees;
    }
    private function getpcmlistData($constraints) {
        $datas = PcmModel::where('yearof_demand', 'like', $constraints['yearof_demand'])
                        ->get();
        return $datas;
    }
    private function getExportingData($constraints) {

        return DB::table('employees')
        ->leftJoin('city', 'employees.city_id', '=', 'city.id')
        ->leftJoin('department', 'employees.department_id', '=', 'department.id')
        ->leftJoin('state', 'employees.state_id', '=', 'state.id')
        ->leftJoin('country', 'employees.country_id', '=', 'country.id')
        ->leftJoin('division', 'employees.division_id', '=', 'division.id')
        ->select('employees.firstname', 'employees.middlename', 'employees.lastname', 
        'employees.age','employees.birthdate', 'employees.address', 'employees.zip', 'employees.date_hired',
        'department.name as department_name', 'division.name as division_name')
        ->where('date_hired', '>=', $constraints['from'])
        ->where('date_hired', '<=', $constraints['to'])
        ->get()
        ->map(function ($item, $key) {
        return (array) $item;
        })
        ->all();
    }

    private function getallData($constraints) {
       
        return DB::table('pcm')
        ->where('yearof_demand', 'like', $constraints['yearof_demand'])
        ->get()
        ->map(function ($item, $key) {
        return (array) $item;
        })
        ->all();
    }
}
