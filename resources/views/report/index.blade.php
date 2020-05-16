@extends('report.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="col-lg-12">
  <div class="col-lg-12">
  <h1 class="h2"></h1>
  <h1 class="h2"></h1>
    <div class="row" >
 
        <div class="col-sm-8" >
          <form class="form-inline active-purple-4" method="POST" action="{{ route('report.search') }}">
          {{ csrf_field() }}
            <input id="yearof_demand"  class="form-control -sm mr-3 w-75" name="yearof_demand" type="text" placeholder="Search"
              aria-label="Search">
              <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
          </form>
          
        </div>
        <div class="col-sm-2">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('report.excel') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$searchingVals['yearof_demand']}}" name="yearof_demand" />
                <input type="hidden" value="{{$searchingVals['yearof_demand']}}" name="yearof_demand" />
                <button type="submit" class="btn btn-primary">
                  Export to Excel
                </button>
            </form>
        </div>
        <div class="col-sm-2">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('report.pdf') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$searchingVals['yearof_demand']}}" name="yearof_demand" />
                <input type="hidden" value="{{$searchingVals['yearof_demand']}}" name="yearof_demand" />
                <button type="submit" class="btn btn-info">
                  Export to PDF
                </button>
            </form>
        </div>
    </div>
    <h1 class="h2"></h1>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      
  
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered"  style="width:100%">
            <thead>
              <tr >
                <th >Part No</th>
                <th >Name</th>
                <th>To Ref</th>
                <th >Class</th>
                <th >Range</th>
                <th >QTY</th>
                <th>Year</th>
                <th >AC </th>
                <th >Remarks</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($datas as $data)
                <tr >
                  <td>{{ $data->part_no }} </td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->to_ref }}</td>
                  <td>{{ $data->item_class }}</td>
                  <td>{{ $data->item_range }} </td>
                  <td>{{ $data->qty_demand }}</td>
                  <td>{{ $data->yearof_demand }}</td>
                  <td>{{ $data->ac_type }}</td>
                  <td>{{ $data->remarks }}</td>
              </tr>
            @endforeach
            </tbody>
          
          </table>
        </div>
      </div>
 
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection