@extends('entry-rect-mgmt.base')

@section('action-content')
<section class="content">
<div class="col-md-12">

    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Entry & Rectification Detail
        </h3>
      </div>
    </div >

    <div class="card">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 p-3 px-3">
                        <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th  style="width: 25%">Trade</th>
                                        <td colspan="5">{{ $data->trade_name }}</td>
                                    </tr>
                                    <tr>
                                        <th >Entry Type</th>
                                        <td colspan="1">{{ $data->type_name }}</td>
                                    </tr>
                                    <tr>
                                        <th >AC Ser No</th>
                                        <td colspan="1"> {{ $data->ac_ser_no }}</td>
                                    </tr>
                                    <tr>
                                        <th >Date of Entry</th>
                                        <td colspan="1">{{ $data->date_of_entry }}</td>
                                    </tr>
                                    <tr>
                                        <th >Remarks</th>
                                        <td colspan="1">{{ $data->remarks }}</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>

                    <div class="col-md-6 p-3 px-3">
                        <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th >Description</th>
                                        <td >{{ $data->description }}</td>
                                    </tr>
                                    <tr>
                                        <th >Consumed Item</th>
                                        <td >{{ $data->replacement_any }}</td>
                                    </tr>
                                    <tr>
                                        <th >Rectification</th>
                                        <td > {{ $data->rect_description}}</td>
                                    </tr>
                                    <tr>
                                        <th >Rectification Date</th>
                                        <td >{{ $data->date_of_rect }}</td>
                                    </tr>
                                    <tr>
                                        <th >Workers</th>
                                        <td >{{ $data->workers }}</td>
                                    </tr>
                                    <tr>
                                        <th >Supervisor</th>
                                        <td >{{ $data->supervisor }}</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
           </div> 
        </div>               
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                            <a  href="{{ url('entry-rect-mgmt') }}"  class=" btn btn-primary" data-toggle="tooltip" data-placement="left" title="edit">Back</a>
                            </div>
                        </div>
    </div>
</div>

@endsection
