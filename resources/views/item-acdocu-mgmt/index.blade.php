@extends('item-acdocu-mgmt.base')
@section('action-content')
    <!-- Main content -->
    
    <section class="content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <a type="button" href="{{ route('item-acdocu-mgmt.create') }}" class="btn btn-primary">Add new</a>
              </div>
            </div>
  </div>
  
      <div  class="col-lg-12">
        <div  class="table-responsive">
          <table id="ac_docu_table" class="table table-striped table-bordered" >
            
            <thead>
              <tr >
                <th >Name</th>
                <th >Uploader Name</th>
                <th >File Name</th>
                <th >Remarks</th>
                <th style="width:105px">Download</th>
                <th style="width:130px">Action</th>
              </tr>
            </thead>

            <tbody>
            @foreach ($datas as $data)
                <tr  >
                  <td >{{ $data->name }}</td>
                  <td >{{ $data->uploader_name }}</td>
                  <td >{{ $data->file_name_original }}</td>
                  <td >{{ $data->remarks }}</td>
                  <td >
                  <button type="button" onClick="document.location.href='{{ route('item-acdocu-mgmt.Download', [$data->id]) }}'" class="btn btn-primary float-right" >
                  Download   <i class="fas fa-download"></i>
                  </button>
                  </td>
                  <td >
      
                          <a   href="{{ route('item-acdocu-mgmt.edit', [$data->id]) }}" class="btn btn-info" data-toggle="tooltip" data-placement="left" title="Edit">
                          <i class="fas fa-edit"></i>   
                                              </a>
                        <a  onclick = "return confirm('Are you sure?')" href="{{ route('item-acdocu-mgmt.remove', [$data->id]) }}"  class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Delete">
                        <i class="fas fa-trash"></i>
                        </a>
                        <a   href="{{ route('item-acdocu-mgmt.show', [$data->id]) }}"  class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Consume Item">
                        <i class="fas fa-eye"></i>                    
                               </a>
                    
                  </td>
              </tr>
            @endforeach
            </tbody>
          
          </table>
        </div>
    
    </div>

    </section>

   
@endsection
</div>
