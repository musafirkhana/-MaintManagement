
        <!-- Main Sidebar Container -->
  <aside class="main-sidebar control-sidebar-light">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset("/assets/AdminLTE-3.0.4/dist/img/AdminLTELogo.png") }}"
           alt="BAF Logo"
           class="brand-image img-circle"
           style="opacity: .8">

      <span class="brand-text font-weight-light">BAF</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset("/assets/AdminLTE-3.0.4/dist/img/avatar.png") }}" class="img-circle" alt="User Image">
        </div>
        <div class="info">
        <p>{{ Auth::user()->name}}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{ url('dashboard') }}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ (request()->is('item-mgmt')) ? 'menu-open' : '' }} {{ (request()->is('pcm-mgmt')) ? 'menu-open' : '' }}">
            <a href="{{ url('item-mgmt') }}" class="nav-link {{ (request()->is('item-mgmt')) ? 'active' : '' }} {{ (request()->is('pcm-mgmt')) ? 'active' : '' }}">
              <i class="fas fa-rocket nav-icon"></i>
              <p>
                PCM Demand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li  class="nav-item " >
                <a href="{{ url('item-mgmt') }}" class="nav-link {{ (request()->is('item-mgmt')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item List</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ url('pcm-mgmt') }}" class="nav-link {{ (request()->is('pcm-mgmt')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PCM Management</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview {{ (request()->is('stock-mgmt')) ? 'menu-open' : '' }}
          {{ (request()->is('item-receiv-mgmt')) ? 'menu-open' : '' }}
          {{ (request()->is('item-consume-mgmt')) ? 'menu-open' : '' }} ">
            <a href="{{ url('stock-mgmt') }}" class="nav-link {{ (request()->is('stock-mgmt')) ? 'active' : '' }}
            {{ (request()->is('item-receiv-mgmt')) ? 'active' : '' }}
            {{ (request()->is('item-consume-mgmt')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-concierge-bell"></i>
              <p>
                Spare Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="{{ url('stock-mgmt') }}" class="nav-link {{ (request()->is('stock-mgmt')) ? 'active '  : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ url('item-receiv-mgmt') }}" class="nav-link {{ (request()->is('item-receiv-mgmt')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Received Item</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('item-consume-mgmt') }}" class="nav-link {{ (request()->is('item-consume-mgmt')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consumed Item</p>
                </a>
              </li>
         
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="nav-item has-treeview {{ (request()->is('entry-rect-mgmt')) ? 'menu-open' : '' }}
          {{ (request()->is('entry-rect-mgmt')) ? 'menu-open' : '' }}"
           class="nav-link {{ (request()->is('entry-rect-mgmt')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-stethoscope"></i>
              <p>
                ENtries & Rectification
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('entry-rect-mgmt') }}" class="nav-link {{ (request()->is('entry-rect-mgmt')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Entries</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Aircraft State
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('ac-flghrs-mgmt') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Flg Hrs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('tbo-tso-mgmt') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Major Component Life</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li>
         
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Schedule Insp
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('acschedule-insp-mgmt') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aircraft</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('engschedule-insp-mgmt') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Engine</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('acschedule-insp-mgmt') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Others</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-header">DOCUMENT</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                MTD Training
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{ url('item-acdocu-mgmt') }}" class="nav-link {{ (request()->is('item-acdocu-mgmt')) ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                AC Document
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Critical Item
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Major Equipt
              </p>
            </a>
          </li>
          <li class="nav-header">PERSONNEL</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Man Power</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Leave</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Outstanding</p>
            </a>
          </li>
          <li class="nav-header">REPORT</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Outstanding</p>
            </a>
          </li>
        
              
              
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

