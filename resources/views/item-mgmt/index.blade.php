@extends('item-mgmt.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Item Management</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <a type="button" href="{{ route('item-mgmt.create') }}" class="btn btn-primary">Add new</a>
              </div>
            </div>
  </div>
  
  <div class="card-body">
        <div  class="table-responsive">
          <table id="item_table" class="table table-bordered" width="100%" cellspacing="0">
            
            <thead>
              <tr >
                <th >Part No</th>
                <th >Item Name</th>
                <th >TO Ref</th>
                <th >Item class</th>
                <th >Item range</th>
                <th >Qty Demand</th>
                <th >Year of demand</th>
                <th >Remarks</th>
                <th >Action</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($datas as $data)
                <tr  >
                  <td >{{ $data->part_no }}</td>
                  <td >{{ $data->name }}</td>
                  <td >{{ $data->to_ref }}</td>
                  <td >{{ $data->item_class }}</td>
                  <td >{{ $data->item_range }}</td>
                  <td >{{ $data->qty_demand }}</td>
                  <td >{{ $data->yearof_demand }}</td>
                  <td >{{ $data->remarks }}</td>
                  <td >
      
                          <a   href="{{ route('item-mgmt.edit', [$data->id]) }}" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Edit">
                          <i class="fas fa-edit" ></i>   
                                              </a>
                        <a  onclick = "return confirm('Are you sure?')" href="{{ route('item-mgmt.remove', [$data->id]) }}"  class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Delete">
                        <i class="fas fa-trash"></i>
                        </a>
                        <a  href="{{ route('item-mgmt.show', [$data->id]) }}"  class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Add to PCM">
                        <i class="fas fa-plus-square"></i>
                        </a>
                      
                       

                    
                  </td>
              </tr>
            @endforeach
            </tbody>
          
          </table>
        </div>
    
    </div>

  <!-- /.box-body -->
    </section>

    <!-- /.content -->
   
@endsection
</div>
