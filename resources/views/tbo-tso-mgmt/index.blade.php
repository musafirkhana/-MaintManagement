@extends('tbo-tso-mgmt.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <div class="col-md-12">
          <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <a type="button" href="{{ route('tbo-tso-mgmt.create') }}" class="btn btn-primary">Add new</a> 
                </div>
                   
                </div>

          </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div  class="table-responsive">
        <table id="major_comp_table" class="table table-striped table-bordered" style="width:100%; cellspacing="0">
            
            <thead>
            <tr>
                <th style="vertical-align : middle;text-align:center;" rowspan="2" >Aircraft</th>
                <th colspan="2" scope="colgroup">Ac Hrs</th>
                <th colspan="2" scope="colgroup">Left Eng  Hrs</th>
                <th colspan="2" scope="colgroup">Right Eng  Hrs</th>
                <th colspan="2" scope="colgroup">Left Prop  Hrs</th>
                <th colspan="2" scope="colgroup">Right Prop  Hrs</th>
                <th style="vertical-align : middle;text-align:center;" rowspan="2">Action</th>
            </tr>
            <tr>
                <th scope="col">TBO</th>
                <th scope="col">TSO</th>
                <th scope="col">TBO</th>
                <th scope="col">TSO</th>
                <th scope="col">TBO</th>
                <th scope="col">TSO</th>
                <th scope="col">TBO</th>
                <th scope="col">TSO</th>
                <th scope="col">TBO</th>
                <th scope="col">TSO</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($datas as $data)
                <tr  >
                  <td >{{ $data->ac_ser_no }}</td>
                  <td >{{ $data->ac_tbo_hrs }}</td>
                  <td >{{ $data->ac_tso_hrs }}</td>
                  <td >{{ $data->eng_lt_tbo_hrs }}</td>
                  <td >{{ $data->eng_lt_tso_hrs }}</td>
                  <td >{{ $data->eng_rt_tbo_hrs }}</td>
                  <td >{{ $data->prop_lt_tso_hrs }}</td>
                  <td >{{ $data->prop_lt_tbo_hrs }}</td>
                  <td >{{ $data->prop_lt_tso_hrs }}</td>
                  <td >{{ $data->prop_rt_tbo_hrs }}</td>
                  <td >{{ $data->prop_rt_tso_hrs }}</td>
                  
              
                  <td style="min-width: 50px;" >
      
                        <a   href="{{ route('ac-flghrs-mgmt.edit', [$data->ac_ser_no]) }}"  data-placement="left" title="Edit">
                          <i class="far fa-edit"></i>   
                        </a>

                        <a  onclick = "return confirm('Are you sure?')" href="{{ route('ac-flghrs-mgmt.show', [$data->ac_ser_no]) }}"   data-placement="left" title="Delete">
                        <i class="fas fa-trash"></i>
                        </a>

                        <a   href="{{ route('ac-flghrs-mgmt.show', [$data->ac_ser_no]) }}"  data-placement="left" title="View">
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
