<?php

namespace App\Exports;

use App\PcmModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class PcmExport implements FromCollection
{

    public function __construct($request)
{
    $this->request = $request;
}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ExelData=PcmModel::where('yearof_demand', 'like', $this->request)
        ->get();
        return  $ExelData;
    }

    
}
