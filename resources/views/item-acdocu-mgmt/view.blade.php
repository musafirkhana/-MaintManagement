@extends('item-acdocu-mgmt.base')

@section('action-content')

<section class="content">

<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Document
 </h3>
      </div>

    </div >
    <div class="card">
        <div class="row">
            <div class="col-md-12">
                       

     
                <div class="row ">
                    <div class="col-md-6 p-3 px-3 ">
                        <table class="table table-sm table-bordered">
                            
                                <tbody>
                                    <tr>
                                        <th  >Name</th>
                                        <td colspan="5">{{ $data->name }}</td>
                                    </tr>
                                    <tr>
                                        <th >Uploader Name</th>
                                        <td colspan="1">{{ $data->uploader_name }}</td>
                                 </tr>
                                    
                    
                                </tbody>
                        </table>
                    </div>

                    <div class="col-md-6 p-3 px-3">
                        <table class="table table-sm table-bordered">
                                <tbody>
                                     <tr>
                                        <th >File Name</th>
                                        <td >{{ $data->file_name_original }}</td>
                                    </tr>

                                    <tr>
                                        <th >Remarks</th>
                                        <td >{{ $data->remarks }}</td>
                                    </tr>

                                    
                                   
             
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
               
        
          
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a  href="{{ url('item-acdocu-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                            </div>
                        </div>
    
        
        
      </div>
                        
        </div>


  
     
@endsection
