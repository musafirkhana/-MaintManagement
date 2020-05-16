@extends('entry-rect-mgmt.base')

@section('action-content')


  <section class="content">

<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Entry & Rectification</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form role="form" method="POST" action="{{ route('entry-rect-mgmt.store') }}" >
        {{ csrf_field() }}
        <div class="row">

          <div class="col-sm-6">
            <div class="form-group">
                <label>Aircraft</label>
                <div class="row">
                    <div class="col-sm-10">
                        <select class="form-control select2"style="width: 100%;" name="ac_ser_no">
                        @foreach ($AcData as $AcDatas)
                        <option value="{{$AcDatas->id}}">{{$AcDatas->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <a  href="{{ url('item-acdocu-mgmt') }}"  class=" btn btn-primary plus" data-toggle="tooltip" data-placement="left" title="edit">
                        <i class="fas fa-plus"></i> </a>
                    </div>
                </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="date_of_entry">Date Of Entry </label>
              <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text"autocomplete="off" class="form_datetime form-control float-right" id="date_of_entry" name="date_of_entry">
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-sm-6">
    
              <div class="form-group">
                  <label>Trade</label>
                  <select class="form-control select2"style="width: 100%;" name="trade_name">
                        @foreach ($TradeData as $TradeDatas)
                        <option value="{{$TradeDatas->id}}">{{$TradeDatas->name}}</option>
                        @endforeach
                  </select>
              </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
                <label>Type Of Entry</label>
                <div class="row">
                    <div class="col-sm-10">
                        <select class="form-control select2"style="width: 100%;" name="type_name">
                        @foreach ($TypeData as $TypeDatas)
                        <option value="{{$TypeDatas->id}}">{{$TypeDatas->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <a  href="{{ url('item-acdocu-mgmt') }}"  class=" btn btn-primary plus" data-toggle="tooltip" data-placement="left" title="edit">
                        <i class="fas fa-plus"></i> </a>
                    </div>
                </div>
            </div>
          </div>

      </div>


        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="item_status">Description </label>
              <textarea class="form-control" rows="3" id="description" name="description"  placeholder=""  ></textarea>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="item_status">Action Description </label>
              <textarea class="form-control" rows="3" id="rect_description" name="rect_description"  placeholder=""  ></textarea>
            </div>
          </div>

         
       </div>


        <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
              <label for="replacement_any">Replacement (If any) </label>
              <input type="text" class="form-control" id="replacement_any" name="replacement_any"  placeholder="" value="" required >
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="date_of_rect">Date Of Rectification </label>
              <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text"autocomplete="off" class="form_datetime form-control float-right" id="date_of_rect" name="date_of_rect">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="workers">Worker </label>
              <input type="text" class="form-control" id="workers" name="workers"  placeholder="" value="" required>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="supervisor">Supervisor </label>
              <input type="text" class="form-control" id="supervisor" name="supervisor"  placeholder="" value="" required>
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
              <a  href="{{ url('entry-rect-mgmt') }}"  class=" btn btn-primary " data-toggle="tooltip" data-placement="left" title="edit">Back</a>
              </div>
                 <button type="submit"  class="btn btn-primary toastrDefaultSuccess"> Create </button>
        </div>
       
        </form>
      </div>
      
@endsection
