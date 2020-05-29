@extends('engschedule-insp-mgmt.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <div class="col-md-12">
          <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <a type="button" href="{{ route('engschedule-insp-mgmt.create') }}" class="btn btn-primary">Add new</a> 
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
                <th style="vertical-align : middle;text-align:center;" rowspan="2" >Insp Type</th>
                <th style="vertical-align : middle;text-align:center;" rowspan="2" >Insp Freq</th>
                <th colspan="2" style="vertical-align : middle;text-align:center;"scope="colgroup">Right Eng  Hrs</th>
                <th colspan="2" style="vertical-align : middle;text-align:center;" scope="colgroup">Left Eng  Hrs</th>
                <th style="vertical-align : middle;text-align:center " rowspan="2">Action</th>
            </tr>
            <tr>
                <th scope="col"style="vertical-align : middle;text-align:center;">Due</th>
                <th scope="col"style="vertical-align : middle;text-align:center;">Left</th>
                <th scope="col"style="vertical-align : middle;text-align:center;">Due</th>
                <th scope="col"style="vertical-align : middle;text-align:center;">Left</th>
              
          
            </tr>
            </thead>

            <tbody>
            @foreach ($datas as $data)
                <tr  >
                  <td >{{ $data->ac_ser_no }}</td>
                  <td >{{ $data->insp_type }}</td>
                  <td >{{ $data->insp_freq }}</td>
              
                  <td >{{ $data->due_hrs_lt_eng }}</td>
                  <td >{{ $data->left_hrs_lt_eng }}</td>
                  <td >{{ $data->due_hrs_rt_eng }}</td>
                  <td >{{ $data->left_hrs_rt_eng }}</td>
        
                  
              
                  <td style="" >
      
                        <a   href="{{ route('engschedule-insp-mgmt.edit', [$data->ac_ser_no]) }}"  data-placement="left" title="Edit">
                          <i class="far fa-edit"></i>   
                        </a>

                        <a  onclick = "return confirm('Are you sure?')" href="{{ route('engschedule-insp-mgmt.show', [$data->ac_ser_no]) }}"   data-placement="left" title="Delete">
                        <i class="fas fa-trash"></i>
                        </a>

                        <a   href="{{ route('engschedule-insp-mgmt.show', [$data->ac_ser_no]) }}"  data-placement="left" title="View">
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
