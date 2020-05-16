@extends('item-acdocu-mgmt.base')

@section('action-content')


  <section class="content">

<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">AC Document </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      <form class="needs-validation" role="form" method="POST" action="{{ route('item-acdocu-mgmt.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="row">

          <div class="col-sm-12">
              <div class="form-group">
                <label for="name">Name</label>
                <input  type="text" class="form-control" id="name" name="name"  placeholder="" value=""  >
              </div>
          </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label for="remarks">Remarks </label>
                <input  type="text" class="form-control" name="remarks" id="remarks" placeholder="" value=""  >
              </div>
            </div>
            
          <div class="col-sm-12">
            <div class="form-group">
                    <label for="ac_document">Choose File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="input_file_name"  name="input_file_name">
                        <label class="custom-file-label" for="input_file_name">Choose file</label>
                      </div>
                    
                    </div>
            </div>
          </div>        

        </div>

        <div class="card-footer">
              <div class="btn-group mr-2">
              <a  href="{{ url('item-acdocu-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
              </div>
                 <button type="submit" class="btn btn-primary"> Create </button>
        </div>
       
        </form>
      </div>
    </div>
  </div>

@endsection
