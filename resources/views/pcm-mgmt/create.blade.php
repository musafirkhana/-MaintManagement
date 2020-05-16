@extends('pcm-mgmt.base')

@section('action-content')
<div class="container bg-light mt-auto">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

            <h1 class="h2">PCM Management</h1>
           
  </div>

<div class="col-md-12 order-md-1  "  >
          <form class="needs-validation" role="form" method="POST" action="{{ route('pcm-mgmt.store') }}">
          {{ csrf_field() }}
          
            <div class="row">

              <div class="col-md-6 mb-3">
                <label for="part_no">Part No</label>
                <input type="text" class="form-control" type="text" name="part_no" id="part_no" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid part_no is required.
                </div>
              </div>


              <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" type="text" name="name" id="name" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid name is required.
                </div>
              </div>

            </div>


            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="to_ref">TO’s Ref</label>
                <input type="text" class="form-control" id="to_ref" name="to_ref" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid to_ref is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="item_class">Class</label>
                <input type="text" class="form-control" id="item_class" name="item_class" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid item_class is required.
                </div>
              </div>
             
            </div>
          
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="item_range">Range</label>
                <input type="text" class="form-control" id="item_range" name="item_range"  placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid item_range is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="qty_demand">Qty Demand</label>
                <input type="text" class="form-control" id="qty_demand" name="qty_demand"  placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid qty_demand is required.
                </div>
              </div>
             
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="yearof_demand">Year of demand</label>
                <input type="text" class="form-control" id="yearof_demand" name="yearof_demand"  placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid yearof_demand is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" name="remarks"  placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid remarks is required.
                </div>
              </div>
             
            </div>
             
            <div class="row">
             
              <div class="col-md-6 mb-3">
                <label for="ac_type">Ac Type</label>
                <input type="text" class="form-control" id="ac_type" name="ac_type"  placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid remarks is required.
                </div>
              </div>
             
            </div>



            <hr class="mb-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2"></h1>
            <div class="form-group">
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="{{ url('pcm-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
              </div>
              <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
            </div>
            </div>
          </div>
            <h1 class="h2"></h1>
          </form>
        </div>


</div>
@endsection
