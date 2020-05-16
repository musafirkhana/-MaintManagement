<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\PcmModel;



class PcmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = PcmModel::paginate(5);
        // Redirect to state list if updating state wasn't existed
        $data['datas'] = DB::table('pcm')->get();
        
        return view('pcm-mgmt/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pcm-mgmt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validateInput($request);
        $keys = ['part_no', 'name', 'to_ref', 'item_class', 'item_range', 'qty_demand', 'yearof_demand', 'remarks','ac_type'];
        $input = $this->createQueryInput($keys, $request);
        PcmModel::create($input);
         return redirect()->intended('/item-mgmt');
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

        $datas = ItemModel::find($id);
    
        if ($datas == null) {
            return redirect()->intended('/item-mgmt');
        }
    

        return view('pcm-mgmt/create_from_item', ['data' => $datas]);
    }
    

    public function showData($id)
    {
        //
        $datas = PcmModel::find($id);
    
        if ($datas == null) {
            return redirect()->intended('/pcm-mgmt');
        }

        return view('pcm-mgmt/view', ['data' => $datas]);
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
        $datas = PcmModel::find($id);
    
        if ($datas == null) {
            return redirect()->intended('/pcm-mgmt');
        }
    

        return view('pcm-mgmt/edit', ['data' => $datas]);
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
        $datas = PcmModel::findOrFail($id);
        $this->validateInput($request);
        $keys = ['part_no', 'name', 'to_ref', 'item_class', 'item_range', 'qty_demand', 'yearof_demand', 'remarks','ac_type'];
        $input = $this->createQueryInput($keys, $request);

        PcmModel::where('id', $id)
            ->update($input);

        return redirect()->intended('/pcm-mgmt');
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
        //
        PcmModel::where('id', $id)->delete();
        return redirect()->intended('/pcm-mgmt');
    }


    private function validateInput($request) {
        $this->validate($request, [
            'part_no' => 'required|max:300',
            'name' => 'required|max:500',
            'to_ref' => 'required|max:500',
            'item_class' => 'required|max:500',
            'item_range' => 'required|max:120',
            'qty_demand' => 'required|max:500',
            'yearof_demand' => 'required|max:500', 
            'ac_type' => 'required|max:500', 
            'remarks' => 'required|max:1000'          
        ]);
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
