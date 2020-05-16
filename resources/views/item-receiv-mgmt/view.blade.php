@extends('item-receiv-mgmt.base')

@section('action-content')

<section class="content">

<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Received Item
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
                                        <th  >Trade</th>
                                        <td colspan="5">{{ $data->trade_name }}</td>
                                    </tr>
                                    <tr>
                                        <th >Part No</th>
                                        <td colspan="1">{{ $data->part_no }}</td>
                                 </tr>
                                    <tr>
                                        <th >Description</th>
                                        <td colspan="1"> {{ $data->eqpt_description }}</td>
                                    </tr>
                                    <tr>
                                        <th >Qty Rcv</th>
                                        <td colspan="1">{{ $data->qty_received }}</td>
                                    </tr>
                                    <tr>
                                        <th >TBO</th>
                                        <td colspan="1">{{ $data->item_tbo }}</td>
                                    </tr>
                    
                                </tbody>
                        </table>
                    </div>

                    <div class="col-md-6 p-3 px-3">
                        <table class="table table-sm table-bordered">
                                <tbody>
                                     <tr>
                                        <th >Svc Life</th>
                                        <td >{{ $data->item_service_life }}</td>
                                    </tr>

                                    <tr>
                                        <th >Location</th>
                                        <td >{{ $data->item_location }}</td>
                                    </tr>

                                    <tr>
                                        <th >Class</th>
                                        <td > {{ $data->class_id}}</td>
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
                            <a  href="{{ url('item-receiv-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                            </div>
                        </div>
    
        
        
      </div>
                        
        </div>


  
     
@endsection
