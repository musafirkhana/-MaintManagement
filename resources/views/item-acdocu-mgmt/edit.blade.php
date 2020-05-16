@extends('item-mgmt.base')

@section('action-content')
<div class="container bg-light mt-auto">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

<h1 class="h2">Document Update</h1>

</div >
    <div class="row">
        <div class="col-md-12 order-md-1  ">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('item-acdocu-mgmt.update', [$data->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                          <input  type="text" class="form-control" id="name" name="name"  placeholder="" value="{{ $data->name }}"  >
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="remarks">Remarks </label>
                                          <input  type="text" class="form-control" name="remarks" id="remarks" placeholder="" value="{{ $data->remarks }}"  >
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

  
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
