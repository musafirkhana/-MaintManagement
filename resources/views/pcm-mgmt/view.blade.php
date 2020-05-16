@extends('pcm-mgmt.base')

@section('action-content')
<div class="container bg-light mt-auto">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

<h1 class="h2">Item Details</h1>

</div >
    <div class="row">
        <div class="col-md-12  ">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('pcm-mgmt.update', [$data->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       


      <div class="row">
              <div class="col-md-6 mb-3">
                <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th  style="width: 25%">Part No</th>
                        <td colspan="5">{{ $data->part_no }}</td>
                    </tr>
                    <tr>
                        <th >Item Name</th>
                        <td colspan="1">{{ $data->name }}</td>
                        </tr>
                    <tr>
                        <th >To Ref</th>
                        <td colspan="1"> {{ $data->to_ref }}</td>
                        </tr>
                    <tr>
                        <th >Item Class</th>
                        <td colspan="1">{{ $data->item_class }}</td>
                        </tr>
                    
                    </tbody>
                </table>
              </div>

              <div class="col-md-6 mb-3">
              <table class="table table-bordered">
                  <tbody>
                    <tr>
                        <th style="width: 25%">Qty Demand</th>
                        <td >{{ $data->qty_demand }}</td>
                    </tr>

                    <tr>
                        <th >Year</th>
                        <td >{{ $data->yearof_demand }}</td>
                    </tr>

                    <tr>
                        <th >AC</th>
                        <td > {{ $data->ac_type}}</td>
                    </tr>

                    <tr>
                        <th >Range</th>
                        <td >{{ $data->item_range }}</td>
                    </tr>
             
                    </tbody>
                </table>
                </div>


               
        </div>
      
      </div>
      <div class="col-md-12">
                <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th  style="width: 25%">Remarks</th>
                        <td colspan="5">{{ $data->remarks }}</td>
                    </tr>
                   
                    </tbody>
                </table>
              </div>
      
            
          
    




                      
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a  href="{{ url('pcm-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
