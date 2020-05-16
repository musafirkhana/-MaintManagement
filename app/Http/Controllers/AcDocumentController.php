<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\AvDocumentModel;


class AcDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $datas = DB::table('ac_document')
        ->select('ac_document.*')->get();
        $data['datas'] = $datas;
        return view('item-acdocu-mgmt/index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('item-acdocu-mgmt/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if($request->hasFile('input_file_name'))
            {
            $allowedfileExtension=['pdf','jpg','png','docx'];
            $files = $request->file('input_file_name');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);
            if($check){
                $path = $request->file('input_file_name')->store('ac_document');
            }
           
            $keys = ['name', 'remarks', 'uploader_name'];
            $input = $this->createQueryInput($keys, $request);
            $input['file_name'] = $path;
            $input['file_name_original'] = $filename;
            $input['uploader_name'] = 'admin';
            $this->validateInput($request); 
            AvDocumentModel::create($input);
            return redirect()->intended('/item-acdocu-mgmt');
          
            }
            
            
            
           
            
            
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = AvDocumentModel::find($id);
    
        if ($datas == null) {
            return redirect()->intended('/item-acdocu-mgmt');
        }
    

        return view('item-acdocu-mgmt/view', ['data' => $datas]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = AvDocumentModel::find($id);
    
        if ($datas == null) {
            return redirect()->intended('/item-acdocu-mgmt');
        }
    

        return view('item-acdocu-mgmt/edit', ['data' => $datas]);
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
        $datas = AvDocumentModel::findOrFail($id);
        if($request->hasFile('input_file_name'))
        {
        $allowedfileExtension=['pdf','jpg','png','docx'];
        $files = $request->file('input_file_name');
        $filename = $files->getClientOriginalName();
        $extension = $files->getClientOriginalExtension();
        $check=in_array($extension,$allowedfileExtension);
        if($check){
            $path = $request->file('input_file_name')->store('ac_document');
        }
    }else {
        $path = $datas['file_name'];
        $filename = $datas['file_name_original'];
    }
        $keys = ['name', 'remarks', 'uploader_name'];
        $input = $this->createQueryInput($keys, $request);
        $input['file_name'] = $path;
        $input['file_name_original'] = $filename;
        $input['uploader_name'] = $datas['uploader_name'];
        $this->validateInput($request); 
      
        AvDocumentModel::where('id', $id)
            ->update($input);
  
        return redirect()->intended('/item-acdocu-mgmt');
    }
   /**
     * Load image resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function Download($id) {
        $data=AvDocumentModel::where('id', $id)->first();
        $path = storage_path().'/app/'.$data['file_name'];
        if (file_exists($path)) {
            return Response::download($path,$data['file_name_original']);
        }
      
   }
   public function remove($id)
   {
       //
       AvDocumentModel::where('id', $id)->delete();
       return redirect()->intended('/item-acdocu-mgmt');
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
            'name' => 'required|max:500'
        ]);
    }
}
