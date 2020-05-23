@extends('tbo-tso-mgmt.base')
@section('action-content')


  <section class="content">

<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Major Component Life</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" method="POST" action="{{ route('tbo-tso-mgmt.store') }}" >
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
                <label>Aircraft</label>
                <div class="row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="ac_tbo_hrs" name="ac_tbo_hrs"  placeholder="TBO" value="" required >
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="ac_tso_hrs" name="ac_tso_hrs"  placeholder="TSO" value="" required >
                    </div>
                </div>
            </div>
          </div>

        </div>

        <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label>Eng Left</label>
                <div class="row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="eng_lt_tbo_hrs" name="eng_lt_tbo_hrs"  placeholder="TBO" value="" required >
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="eng_lt_tso_hrs" name="eng_lt_tso_hrs"  placeholder="TSO" value="" required >
                    </div>
                </div>
            </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group">
                  <label>Eng Right</label>
                  <div class="row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="eng_rt_tbo_hrs" name="eng_rt_tbo_hrs"  placeholder="TBO" value="" required >
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="eng_rt_tso_hrs" name="eng_rt_tso_hrs"  placeholder="TSO" value="" required >
                    </div>
                </div>
              </div>
          </div>

      </div>


        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="item_status">Propeller Left </label>
              <div class="row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="prop_lt_tbo_hrs" name="prop_lt_tbo_hrs"  placeholder="TBO" value="" required >
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="prop_lt_tso_hrs" name="prop_lt_tso_hrs"  placeholder="TSO" value="" required >
                    </div>
                </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="flg_hours">Propeller Right </label>
              <div class="row">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="prop_rt_tbo_hrs" name="prop_rt_tbo_hrs"  placeholder="TBO" value="" required >
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="prop_rt_tso_hrs" name="prop_rt_tso_hrs"  placeholder="TSO" value="" required >
                    </div>
                </div>
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
              <a  href="{{ url('tbo-tso-mgmt') }}"  class=" btn btn-primary " data-toggle="tooltip" data-placement="left" title="edit">Back</a>
              </div>
                 <button type="submit"  class="btn btn-primary"> Create </button>
        </div>
       
        </form>
      </div>
      
@endsection

