@extends('ac-flghrs-mgmt.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <div class="col-md-12">
          <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <a type="button" href="{{ route('ac-flghrs-mgmt.create') }}" class="btn btn-primary">Add new</a> 
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
                <th >Date</th>
                <th >Ac ser no</th>
                <th >Msn Type</th>
                <th >Flg Hrs</th>
                <th >Total Ldg</th>
                <th >Cycle</th>
                <th >Pilot</th>
                <th >Co-Pilot</th>
                <th >Action</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($datas as $data)
                <tr  >
                  <td >{{ date('F j, Y', strtotime($data->flg_date))}}</td>
                  <td >{{ $data->ac_ser_no }}</td>
                  <td >{{ $data->msn_type }}</td>
                  <td >{{ $data->flg_hours }}</td>
                  <td >{{ $data->total_ldg }}</td>
                  <td >{{ $data->cycle_completed }}</td>
                  <td >{{ $data->pilot }}</td>
                  <td >{{ $data->co_pilot }}</td>
                  <td style="min-width: 50px;" >
      
                        <a   href="{{ route('ac-flghrs-mgmt.edit', [$data->id]) }}"  data-placement="left" title="Edit">
                          <i class="far fa-edit"></i>   
                        </a>

                        <a  onclick = "return confirm('Are you sure?')" href="{{ route('ac-flghrs-mgmt.show', [$data->id]) }}"   data-placement="left" title="Delete">
                        <i class="fas fa-trash"></i>
                        </a>

                        <a   href="{{ route('ac-flghrs-mgmt.show', [$data->id]) }}"  data-placement="left" title="View">
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
