@extends('pcm-mgmt.base')
@section('action-content')
<section class="content">

        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Add Item to PCM</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="POST" action="{{ route('pcm-mgmt.store') }}" >
                {{ csrf_field() }}
                  <div class="row">

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="part_no">Part No</label>
                        <input type="text" class="form-control"name="part_no" id="part_no" placeholder="" value="{{ $data->part_no }}" required>
                   
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="name">Name </label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $data->name }}" required >
                      </div>
                    </div>

                  </div>

                  <div class="row">
                  
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label for="to_ref">TO’s Ref</label>
                      <input type="text" class="form-control" id="to_ref" name="to_ref" placeholder="" value="{{ $data->to_ref }}" required>
                   
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="item_class">Class </label>
                      <input type="text" class="form-control"  id="item_class" name="item_class" placeholder="" value="{{ $data->item_class }}" required >
                       
                    </div>
                  </div>

                </div>
                <div class="row">
                  
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label for="item_range">Range</label>
                      <input type="text" class="form-control" id="item_range" name="item_range"  placeholder="" value="{{ $data->item_range }}" required>
                 
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="qty_demand">Qty Demand </label>
                      <input type="text" class="form-control" id="qty_demand" name="qty_demand"  placeholder="" value="{{ $data->qty_demand }}" required >
                         
                    </div>
                  </div>

                </div>
                <div class="row">
                  
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label for="yearof_demand">Year of demand</label>
                      <input type="text" class="form-control" id="yearof_demand" name="yearof_demand"  placeholder="" value="{{ $data->yearof_demand }}" required>
                       
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="ac_type">Ac Type </label>
                      <input type="text" class="form-control" id="ac_type" name="ac_type"  placeholder="" value="" required >
                       
                    </div>
                  </div>

                </div>
                <div class="row">
             
              
             
            </div>
                <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control" rows="3" id="remarks" name="remarks"  placeholder=""  >{{ $data->remarks }}</textarea>
                      </div>
               </div>
              </div>

                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

               
                </form>
              </div>
              
        </div>
@endsection
