<?php $link = asset('backend_4/'); ?>
<div id="left-sidebar" class="sidebar">
    <a href="#" class="menu_toggle"><i class="fa fa-angle-left"></i></a>
    <div class="navbar-brand">
        <a href="{{ route('home') }}"><img src="{{$link}}/assets/images/icon.svg" alt="Mooli Logo" class="img-fluid logo"><span>SIPAS</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{$link}}/assets/images/user.png" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>{{ auth()->user()->roles->nama_role }},</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ auth()->user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="page-profile.html"><i class="fa fa-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="fa fa-envelope"></i>Messages</a></li>
                    <li><a href="setting.html"><i class="fa fa-gear"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>Logout</a></li>
                </ul>
            </div>
        </div>  
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu animation-li-delay">
                <li class="header">Main</li>
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li class="header">Setup Management</li>
                <li><a href="{{ route('instansi') }}"><i class="fa fa-envelope"></i> <span>Instansi / Lembaga</span></a></li>
                <li><a href="{{ route('klasifikasi') }}"><i class="fa fa-envelope"></i> <span>Data Klasifikasi</span></a></li>
                <li><a href="{{ route('unit_kerja') }}"><i class="fa fa-envelope"></i><span>Unit Kerja</span></a></li>
                <li class="header">Surat</li>
                <li><a href="{{ route('surat_masuk') }}"><i class="fa fa-envelope"></i> <span>Surat Masuk</span></a></li>
                <li><a href="{{ route('surat_keluar') }}"><i class="fa fa-envelope"></i> <span>Surat Keluar</span></a></li>
                <li class="header">User Management</li>
                <li><a href="#"><i class="fa fa-envelope"></i> <span>Roles</span></a></li>
                <li><a href="{{ route('users') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                {{-- <li><a href="app-chat.html"><i class="fa fa-comments"></i> <span>Chat</span></a></li>
                <li><a href="app-calendar.html"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
                <li><a href="app-todo.html"><i class="fa fa-th-list"></i> <span>Todo List</span></a></li>
                
                <li><a href="app-filemanager.html"><i class="fa fa-folder"></i> <span>File Manager</span></a></li>
                <li><a href="app-contacts.html"><i class="fa fa-address-book"></i> <span>Contacts</span></a></li>
                <li><a href="app-scrumboard.html"><i class="fa fa-tasks"></i> <span>Scrumboard</span></a></li>
                <li><a href="page-news.html"><i class="fa fa-globe"></i> <span>Blog</span></a></li>
                <li><a href="page-social.html"><i class="fa fa-share-alt-square"></i> <span>Social</span></a></li>
                <li class="header">Vendors</li>
                <li>
                    <a href="#uiElements" class="has-arrow"><i class="fa fa-diamond"></i><span>ui Elements</span></a>
                    <ul>
                        <li><a href="ui-helper-class.html">Helper Classes</a></li>
                        <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-tabs.html">Tabs</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>                            
                        <li><a href="ui-icons.html">Icons</a></li>
                        <li><a href="ui-notifications.html">Notifications</a></li>
                        <li><a href="ui-colors.html">Colors</a></li>
                        <li><a href="ui-dialogs.html">Dialogs</a></li>                                    
                        <li><a href="ui-list-group.html">List Group</a></li>
                        <li><a href="ui-media-object.html">Media Object</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-nestable.html">Nestable</a></li>
                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                        <li><a href="ui-range-sliders.html">Range Sliders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#forms" class="has-arrow"><i class="fa fa-pencil"></i><span>Forms Elements</span></a>
                    <ul>
                        <li><a href="forms-basic.html">Basic Elements</a></li>
                        <li><a href="forms-advanced.html">Advanced Elements</a></li>
                        <li><a href="forms-validation.html">Form Validation</a></li>
                        <li><a href="forms-wizard.html">Form Wizard</a></li>
                        <li><a href="forms-dragdropupload.html">Drag &amp; Drop Upload</a></li>
                        <li><a href="forms-cropping.html">Image Cropping</a></li>
                        <li><a href="forms-summernote.html">Summernote</a></li>
                        <li><a href="forms-editors.html">CKEditor</a></li>
                        <li><a href="forms-markdown.html">Markdown</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#Tables" class="has-arrow"><i class="fa fa-table"></i><span>Tables</span></a>
                    <ul>
                        <li><a href="table-normal.html">Normal Tables</a></li>
                        <li><a href="table-jquery-datatable.html">Jquery Datatables</a></li>
                        <li><a href="table-editable.html">Editable Tables</a></li>
                        <li><a href="table-color.html">Tables Color</a></li>
                        <li><a href="table-filter.html">Table Filter</a></li>
                        <li><a href="table-dragger.html">Table dragger</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#charts" class="has-arrow"><i class="fa fa-pie-chart"></i><span>Charts</span></a>
                    <ul>
                        <li><a href="chart-apex.html">Apex Charts</a></li>
                        <li><a href="chart-c3.html">C3 Charts</a></li>
                        <li><a href="chart-morris.html">Morris Chart</a></li>
                        <li><a href="chart-flot.html">Flot Chart</a></li>
                        <li><a href="chart-chartjs.html">ChartJS</a></li>
                        <li><a href="chart-jquery-knob.html">Jquery Knob</a></li>                            
                        <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                    </ul>
                </li>
                <li class="header">More Pages</li>
                <li><a href="widgets.html"><i class="fa fa-puzzle-piece"></i><span>Widgets</span></a></li>
                <li class="active">
                    <a href="#Pages" class="has-arrow"><i class="fa fa-folder"></i><span>Pages</span></a>
                    <ul>
                        <li><a href="page-login.html">Login</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-forgot-password.html">Forgot Password</a></li>
                        <li><a href="page-404.html">Page 404</a></li>
                        <li class="active"><a href="page-blank.html">Blank Page</a></li>
                        <li><a href="page-search-results.html">Search Results</a></li>
                        <li><a href="page-profile.html">Profile </a></li>
                        <li><a href="page-invoices.html">Invoices </a></li>
                        <li><a href="page-gallery.html">Image Gallery </a></li>
                        <li><a href="page-timeline.html">Timeline</a></li>
                        <li><a href="page-pricing.html">Pricing</a></li>
                    </ul>
                </li>
                <li><a href="map-jvectormap.html"><i class="fa fa-map"></i> <span>jVector Maps</span></a></li>
                <li class="extra_widget">
                    <div class="form-group">
                        <label class="d-block">Traffic this Month <span class="float-right">77%</span></label>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="d-block">Server Load <span class="float-right">50%</span></label>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                        </div>
                    </div>
                </li> --}}
            </ul>
        </nav>     
    </div>
</div>