
  <!-- Main Header -->
  @extends('layouts.app-template')
  @section('content')
    <!-- /.content-wrapper -->
    <section class="content">
  <h1 class="mt-4"></h1>
  <div class="col-md-12">

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item ">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Item List</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('item-mgmt') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Pcm Demand</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('pcm-mgmt') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Stock Management</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('stock-mgmt') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Aircraft Document</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{ url('item-acdocu-mgmt') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                        <img src="{{ asset("/assets/AdminLTE-3.0.4/dist/img/photo4.jpg") }}"
                            alt="BAF Logo"
                            class="img-responsive"
                            height='442'
                            style="width: 100%; opacity: .2">
                        <div class="row"  >
                       
                        
                        </div>
                        </div>
    <!-- /.content -->
  </div>
  </section>
  @endsection
  


   <!-- Footer -->
   
    <!-- /.content -->
<!-- REQUIRED JS SCRIPTS -->
