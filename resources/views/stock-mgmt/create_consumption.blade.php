@extends('pcm-mgmt.base')

@section('action-content')


  <section class="content">

<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Consume Stock </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" method="POST" role="form" action="{{ route('stock-mgmt.update', [$data->id]) }}" >
        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">

          <div class="col-sm-6">
              <div class="form-group">
                <label for="part_no">Part No</label>
                <input  type="text" class="form-control" id="part_no" name="part_no"  placeholder="" value="{{ $data->part_no }}"  >
              </div>
          </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="eqpt_description">Description </label>
                <input  type="text" class="form-control" name="eqpt_description" id="eqpt_description" placeholder="" value="{{ $data->eqpt_description }}"  >
              </div>
            </div>

        </div>

        <div class="row">
          <div class="col-sm-6">
    
              <div class="form-group">
                  <label>Consumed Aircraft</label>
                  <select class="form-control select2"style="width: 100%;" name="consumption_ac_ser">
                  @foreach ($Acdata as $Acdatas)
                        <option value="{{$Acdatas->id}}">{{$Acdatas->name}}</option>
                        @endforeach
                  </select>
              </div>
          </div>

         
          <div class="col-sm-6">
            <div class="form-group">
              <label for="consumption_date">Consumption Date </label>
              <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" autocomplete="off" class="form_datetime form-control float-right" id="consumption_date" name="consumption_date">
              </div>
            </div>
          </div>
      </div>


        <div class="row">
          
          <div class="col-sm-6">
            <div class="form-group">
              <label for="qty_consumed">Quantity Consumed</label>
              <input  type="number" class="form-control" id="qty_consumed" name="qty_consumed"  min="1" max="{{ $data->qty_balance }}" placeholder="" value="{{ $data->qty_balance }}" >
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
            <label for="item_tbo">TBO </label>
              <input readonly type="text" class="form-control" id="item_tbo" name="item_tbo"  placeholder="" value="{{ $data->item_tbo }}"  >
            </div>
          </div>
        </div>

        <div class="row">
        
          <div class="col-sm-6">
            <div class="form-group">
              <label for="class_id">Class</label>
              <input readonly type="text" class="form-control" id="class_id" name="class_id"  placeholder="" value="{{ $data->class_id }}" >
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="trade_name">Trade</label>
              <input readonly type="text" class="form-control" id="trade_name" name="trade_name"  placeholder="{{ $data->trade_name }}" value="{{ $data->trade_name }}" >
            </div>
          </div>

          
      </div>



        <div class="row">
          
          <div class="col-sm-6">
            <div class="form-group">
              <label for="item_service_life">Service Life</label>
              <input readonly type="text" class="form-control" id="item_service_life" name="item_service_life"  placeholder="" value="{{ $data->item_service_life }}" >
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="item_location">Location </label>
              <input readonly type="text" class="form-control" id="item_location" name="item_location"  placeholder="" value="{{ $data->item_location }}"  >
            </div>
          </div>
    </div>
        


    
        <div class="row">
          <div class="col-sm-12">
              <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea  class="form-control" rows="3" id="remarks" name="remarks"  placeholder=""  >{{ $data->remarks }}</textarea>
              </div>
          </div>
        </div>
     
    </div>
      

         
        <div class="card-footer">
              <div class="btn-group mr-2">
              <a  href="{{ url('stock-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
              </div>
                 <button type="submit" class="btn btn-primary"> Create </button>
        </div>
       
        </form>
      </div>
      
@endsection
