@extends('entry-rect-mgmt.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <div class="col-md-12">
          <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <a type="button" href="{{ route('entry-rect-mgmt.create') }}" class="btn btn-primary">Add new</a> 
                    <a type="button" href="{{ route('entry-rect-mgmt.index') }}" class="btn btn-primary">Show All</a> 
                </div>
                   
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                <form class="form-horizontal" action="{{ route('entry-rect-mgmt.search')}}" role="form" method="POST"  >
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-3">
                            <input type="text" autocomplete="off"  class="form-control" type="text" name="start_date" id="start_date" placeholder="Start Date..." value="" >
                        </div>
                        <div class="col-3">
                            <input type="text" autocomplete="off" class="form-control" type="text" name="end_date" id="end_date" placeholder="End Date..." value="" >
                        </div>
                        
                        <div class="col-2">
                            <select class="form-control select2"style="width: 100%;" name="ac_id">
                                    @foreach ($AcData as $AcDatas)
                                    <option value="{{$AcDatas->id}}"<?=$ac_ser_no == $AcDatas->id ? ' selected="selected"' : '';?>>{{$AcDatas->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <select class="form-control select2"style="width: 100%;" name="trade_id">
                                    @foreach ($TradeData as $TradeDatas)
                                    <option value="{{$TradeDatas->id}}"<?=$trade == $TradeDatas->id ? ' selected="selected"' : '';?>>{{$TradeDatas->name}}</option>
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
        <table id="entry_rect_table" class="table table-striped table-bordered" style="width:100%; cellspacing="0">
            
            <thead>
              <tr >
                <th >Trade</th>
                <th style="min-width: 170px;">Type</th>
                <th >Ac Ser No</th>
                <th >Entry Date</th>
                <th >Item Consumed</th>
                <th >Date Rect</th>
                <th >Remarks</th>
                <th >Worker</th>
                <th >Supervisor</th>
                <th >Action</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($datas as $data)
                <tr  >
                  <td >{{ $data->trade_name }}</td>
                  <td >{{ $data->type_name }}</td>
                  <td >{{ $data->ac_ser_no }}</td>
                  <td >{{ $data->date_of_entry }}</td>
                  <td >{{ $data->replacement_any }}</td>
                  <td >{{ $data->date_of_rect }}</td>
                  <td >{{ $data->remarks }}</td>
                  <td >{{ $data->workers }}</td>
                  <td >{{ $data->supervisor }}</td>
                  <td style="min-width: 50px;" >
      
                        <a   href="{{ route('entry-rect-mgmt.edit', [$data->id]) }}"  data-placement="left" title="Edit">
                          <i class="far fa-edit"></i>   
                        </a>

                        <a  onclick = "return confirm('Are you sure?')" href="{{ route('entry-rect-mgmt.remove', [$data->id]) }}"   data-placement="left" title="Delete">
                        <i class="fas fa-trash"></i>
                        </a>

                        <a   href="{{ route('entry-rect-mgmt.show', [$data->id]) }}"  data-placement="left" title="View">
                        <i class="far fa-eye"></i>                    
                        </a>
                      
                       
                    
                  </td>
              </tr>
            @endforeach
            </tbody>
           
          </table>
       
        </div>
    </div>


</div>
    </section>

   
@endsection
