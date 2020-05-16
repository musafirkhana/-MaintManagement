<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\ItemModel;



class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = ItemModel::paginate(5);
        // Redirect to state list if updating state wasn't existed
        $data['datas'] = DB::table('item_list')->get();
        
        return view('item-mgmt/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('item-mgmt/create');
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
        $keys = ['part_no', 'name', 'to_ref', 'item_class', 'item_range', 'qty_demand', 'yearof_demand', 'remarks'];
        $input = $this->createQueryInput($keys, $request);
        ItemModel::create($input);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $datas = ItemModel::find($id);
    
        if ($datas == null) {
            return redirect()->intended('/item-mgmt');
        }
    

        return view('item-mgmt/edit', ['data' => $datas]);
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

        $datas = ItemModel::findOrFail($id);
        $this->validateInput($request);
        $keys = ['part_no', 'name', 'to_ref', 'item_class', 'item_range', 'qty_demand', 'yearof_demand', 'remarks'];

        $input = $this->createQueryInput($keys, $request);
      

        ItemModel::where('id', $id)
            ->update($input);

        return redirect()->intended('/item-mgmt');
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
        ItemModel::where('id', $id)->delete();
        return redirect()->intended('/item-mgmt');
    }


    private function validateInput($request) {
        $this->validate($request, [
            'part_no' => 'required|max:300',
            'name' => 'required|max:500',
            'to_ref' => 'required|max:500',
            'item_class' => 'required|max:500',
            'item_range' => 'required|max:500',
            'qty_demand' => 'required|max:500',
            'yearof_demand' => 'required|max:500',  
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
