@extends('acschedule-insp-mgmt.base')
@section('action-content')


  <section class="content">

<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Schedule Insp Aircraft</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" method="POST" action="{{ route('acschedule-insp-mgmt.store') }}" >
        {{ csrf_field() }}
        <div class="row">

          <div class="col-sm-6">
            <div class="form-group">
                <label>Aircraft Ser No</label>
                <div class="row">
                    <div class="col-sm-10">
                        <select class="form-control select2"style="width: 100%;" name="ac_ser_no">
                        @foreach ($acData as $acDatas)
                        <option value="{{$acDatas->id}}">{{$acDatas->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <a  href=""  class=" btn btn-primary plus"  data-toggle="modal" data-target="#modal-aircraft"data-placement="left" >
                        <i class="fas fa-plus"></i> </a>
                    </div>
                </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
               
                <div class="row">
                    <div class="col-sm-12">
                    <label>Inspection Type</label>
                    <select class="form-control select2"style="width: 100%;" name="insp_type">
                    @foreach ($inspData as $inspDatas)
                        <option value="{{$inspDatas->id}}">{{$inspDatas->insp_type}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                </div>
            </div>
          </div>

        </div>

        <div class="row">

<div class="col-sm-6">
  <div class="form-group">
      <label>Due Hours</label>
        <div class="row">
                  <div class="col-sm-12">
                      <input type="text" class="form-control" id="due_hrs" name="due_hrs"  placeholder="" value="" required >
                  </div>
        </div>
  </div>
</div>

<div class="col-sm-6">
  <div class="form-group">
      <label>Remarks</label>
        <div class="row">
                  <div class="col-sm-12">
                      <input type="text" class="form-control" id="remarks" name="remarks"  placeholder="" value="" required >
                  </div>
        </div>
  </div>
</div>

</div>
    </div>
     

        <div class="card-footer">
              <div class="btn-group mr-2">
              <a  href="{{ url('acschedule-insp-mgmt') }}"  class=" btn btn-primary " data-toggle="tooltip" data-placement="left" title="edit">Back</a>
              </div>
                 <button type="submit"  class="btn btn-primary"> Create </button>
        </div>


       
        </form>
      </div>
      
@endsection

