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

    


</div>
    </section>

   
@endsection
