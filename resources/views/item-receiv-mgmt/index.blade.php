@extends('item-receiv-mgmt.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <div class="col-md-12">
          <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                </div>
                   
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                <form class="form-horizontal" action="{{ route('item-receiv-mgmt.search')}}" role="form" method="POST"  >
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-5"> 
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                              <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" autocomplete="off" placeholder="Start Date" class="form_datetime form-control float-right"  id="start_date" name="start_date">
                                </div>
                            </div>
                        </div>

                        <div class="col-5">
                        <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                              <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" autocomplete="off" placeholder="End Date" class="form_datetime form-control float-right" id="end_date" name="end_date">
                                </div>
                            </div>
                        </div>
                  

                        <div class="col-2">
                            <button type="submit"  class="btn btn-block btn-primary">Search</button>
                        </div>
                  
                    </div> 
                </form>
                </div> 
                </div> 

          </div>
        </div>
    </div>
  <div class="col-lg-12">
        <div  class="table-responsive">
          <table id="rcv_table" class="table table-striped table-bordered" style="width:100%; cellspacing="0">
            
            <thead>
              <tr >
                <th >Trade</th>
                <th >Part No</th>
                <th >Description</th>
                <th >Qty Rcv</th>
                <th >Rcv Date</th>
                <th >TBO</th>
                <th >Svc Life</th>
                <th >Location</th>
                <th >Class</th>
                <th >Remarks</th>
                <th >Action</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($datas as $data)
                <tr  >
                  <td >{{ $data->trade_name }}</td>
                  <td >{{ $data->part_no }}</td>
                  <td >{{ $data->eqpt_description }}</td>
                  <td >{{ $data->qty_received }}</td>
                  <td >{{ $data->qty_received_date }}</td>
                  <td >{{ $data->item_tbo }}</td>
                  <td >{{ $data->item_service_life }}</td>
                  <td >{{ $data->item_location }}</td>
                  <td >{{ $data->class_id }}</td>
                  <td >{{ $data->remarks }}</td>
                  <td >
      
                          <a   href="{{ route('item-receiv-mgmt.show', [$data->id]) }}" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Edit">
                          <i class="fas fa-eye"></i>   
                                              </a>
                      
                       
                    
                  </td>
              </tr>
            @endforeach
            </tbody>
           
          </table>
        </div>
        
    </section>

    <!-- /.content -->
   
@endsection
