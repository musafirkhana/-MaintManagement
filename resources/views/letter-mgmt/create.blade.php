@extends('ac-flghrs-mgmt.base')
@section('action-content')


  <section class="content">

<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Add Flg Hrs</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" method="POST" action="{{ route('letter-mgmt.store') }}" >
        {{ csrf_field() }}
        <div class="row">

          <div class="col-sm-6">
            <div class="form-group">
                <label>Aircraft</label>
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
              <label for="flg_date">Date </label>
              <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text"autocomplete="off" class="form_datetime form-control float-right" id="flg_date" name="flg_date">
              </div>
            </div>
          </div>

        </div>

        <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label>MSN Type</label>
                <div class="row">
                    <div class="col-sm-10">
                        <select class="form-control select2"style="width: 100%;" name="msn_type">
                        @foreach ($msnData as $msnDatas)
                        <option value="{{$msnDatas->id}}">{{$msnDatas->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <a  href="{{ url('ac-flghrs-mgmt') }}"  class=" btn btn-primary plus"data-toggle="modal" data-target="#modal-entrytype" data-placement="right" >
                        <i class="fas fa-plus"></i> </a>
                    </div>
                </div>
            </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group">
                  <label>Pilot</label>
                  <input type="text" class="form-control" id="total_ldg" name="pilot"  placeholder="" value="" required >
              </div>
          </div>

      </div>


        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="item_status">Co-Pilot </label>
              <input type="text" class="form-control" id="co_pilot" name="co_pilot"  placeholder="" value="" required >
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="flg_hours">Flg Hrs </label>
              <input type="text" class="form-control" id="flg_hours" name="flg_hours"  placeholder="" value="" required >
            </div>
          </div>

         
       </div>


        <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
              <label for="replacement_any">Total Landing</label>
              <input type="text" class="form-control" id="total_ldg" name="total_ldg"  placeholder="" value="" required >
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="replacement_any">Cycle Completed</label>
              <input type="text" class="form-control" id="cycle_completed" name="cycle_completed"  placeholder="" value="" required >
            </div>
          </div>
        </div>

    
        <div class="row">
          <div class="col-sm-12">
              <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" rows="3" id="remarks" name="remarks"  placeholder=""  ></textarea>
              </div>
          </div>
        </div>
     
    </div>
      

         
        <div class="card-footer">
              <div class="btn-group mr-2">
              <a  href="{{ url('letter-mgmt') }}"  class=" btn btn-primary " data-toggle="tooltip" data-placement="left" title="edit">Back</a>
              </div>
                 <button type="submit"  class="btn btn-primary toastrDefaultSuccess"> Create </button>
        </div>
       
        </form>
      </div>
      
@endsection

