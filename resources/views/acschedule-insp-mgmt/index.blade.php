@extends('acschedule-insp-mgmt.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <div class="col-md-12">
          <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <a type="button" href="{{ route('acschedule-insp-mgmt.create') }}" class="btn btn-primary">Add new</a> 
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
                <th >Ac Ser No</th>
                <th >Insp Type</th>
                <th >Insp Freq</th>
                <th >Due Hrs</th>
                <th >Left Hrs</th>
                <th >Action</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($datas as $data)
                <tr  >
                  <td >{{ $data->ac_ser_no }}</td>
                  <td >{{ $data->insp_type }}</td>
                  <td >{{ $data->insp_freq }}</td>
                  <td >{{ $data->due_hrs }}</td>
                  <td >{{ $data->left_hrs }}</td>
                  <td style="min-width: 50px;" >
      
                        <a   href="{{ route('entry-rect-mgmt.edit', [$data->ac_ser_no]) }}"  data-placement="left" title="Edit">
                          <i class="far fa-edit"></i>   
                        </a>

                        <a  onclick = "return confirm('Are you sure?')" href="{{ route('entry-rect-mgmt.remove', [$data->ac_ser_no]) }}"   data-placement="left" title="Delete">
                        <i class="fas fa-trash"></i>
                        </a>

                        <a   href="{{ route('entry-rect-mgmt.show', [$data->ac_ser_no]) }}"  data-placement="left" title="View">
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
