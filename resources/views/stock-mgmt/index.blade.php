@extends('stock-mgmt.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <div class="col-md-12">
          <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <a type="button" href="{{ route('stock-mgmt.create') }}" class="btn btn-primary">Add new</a> 
                    <a type="button" href="{{ route('stock-mgmt.index') }}" class="btn btn-primary">Show All</a> 
                </div>
                   
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                <form class="form-horizontal" action="{{ route('stock-mgmt.search')}}" role="form" method="POST"  >
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-5">
                            <input type="text" class="form-control" type="text" name="part_no" id="part_no" placeholder="Enter part no..." value="" >
                        </div>

                        
                        <div class="col-5">
                            <select class="form-control select2"style="width: 100%;" name="trade_id">
                                    @foreach ($tradeDatas as $tradeData)
                                    <option value="{{$tradeData->id}}"<?=$trade == $tradeData->id ? ' selected="selected"' : '';?>>{{$tradeData->name}}</option>
                                    @endforeach
                            </select>
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
          <table id="stock_table" class="table table-striped table-bordered" style="width:100%; cellspacing="0">
            
            <thead>
              <tr >
                <th >Trade</th>
                <th >Part No</th>
                <th >Description</th>
                <th >Class</th>
                <th >Service Life</th>
                <th >Location</th>
                <th >Qty Received</th>
                <th >Qty Consumed</th>
                <th >Balance</th>
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
                  <td >{{ $data->class_id }}</td>
                  <td >{{ $data->item_service_life }}</td>
                  <td >{{ $data->item_location }}</td>
                  <td >{{ $data->qty_received }}</td>
                  <td >{{ $data->qty_consumed }}</td>
                  <td >{{ $data->qty_balance }}</td>
                  <td >{{ $data->remarks }}</td>
                  <td >
      
                          <a   href="{{ route('stock-mgmt.edit', [$data->id]) }}" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Edit">
                          <i class="fas fa-edit"></i>   
                                              </a>
                        <a  onclick = "return confirm('Are you sure?')" href="{{ route('stock-mgmt.remove', [$data->id]) }}"  class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Delete">
                        <i class="fas fa-trash"></i>
                        </a>
                        <a   href="{{ route('stock-mgmt.show', [$data->id]) }}"  class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Consume Item">
                        <i class="fas fa-plus-square"></i>                    
                               </a>
                    
                  </td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="10" style="text-align:right">Total:</th>
                <th>Total</th>
            </tr>
        </tfoot>
          </table>
        </div>
        <div class="modal fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title">Success Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>
    </section>

    <!-- /.content -->
   
@endsection
