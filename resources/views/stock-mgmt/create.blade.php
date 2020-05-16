@extends('pcm-mgmt.base')

@section('action-content')


  <section class="content">

<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Add Item Stock</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" method="POST" action="{{ route('stock-mgmt.store') }}" >
        {{ csrf_field() }}
        <div class="row">

          <div class="col-sm-6">
              <div class="form-group">
                <label for="part_no">Part No</label>
                <input type="text" class="form-control" id="part_no" name="part_no"  placeholder="" value="" required >
              </div>
          </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="eqpt_description">Description </label>
                <input type="text" class="form-control" name="eqpt_description" id="eqpt_description" placeholder="" value="" required >
              </div>
            </div>

        </div>

        <div class="row">
          
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label for="qty_received">Quantity Received</label>
              <input type="number" class="form-control" id="qty_received" name="qty_received" placeholder="" value="" required>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="qty_received_date">Received Date </label>
              <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form_datetime form-control float-right" id="qty_received_date" name="qty_received_date">
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label for="item_status">Status</label>
              <input readonly type="text" class="form-control" id="item_status" name="item_status"  placeholder="" value="Stock" >
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="item_tbo">TBO </label>
              <input type="text" class="form-control" id="item_tbo" name="item_tbo"  placeholder="" value="" required >
            </div>
          </div>
       </div>



        <div class="row">
          <div class="col-sm-6">
    
              <div class="form-group">
                  <label>Class</label>
                  <select class="form-control select2"style="width: 100%;" name="class_id">
                        @foreach ($ClassData as $ClassDatas)
                        <option value="{{$ClassDatas->id}}">{{$ClassDatas->name}}</option>
                        @endforeach
                  </select>
              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group">
                  <label>Trade</label>
                  <select class="form-control select2"style="width: 100%;" name="trade_name">
                        @foreach ($Data as $Datas)
                        <option value="{{$Datas->id}}">{{$Datas->name}}</option>
                        @endforeach
                  </select>
              </div>
          </div>
      </div>



        <div class="row">
          
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label for="item_service_life">Service Life</label>
              <input type="text" class="form-control" id="item_service_life" name="item_service_life"  placeholder="" value="" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="item_location">Location </label>
              <input type="text" class="form-control" id="item_location" name="item_location"  placeholder="" value="" required >
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
              <a  href="{{ url('stock-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
              </div>
                 <button type="submit" class="btn btn-primary"> Create </button>
        </div>
       
        </form>
      </div>
      
@endsection
