
   
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
           
            <li class="treeview active">
                <a href="#">
                <i class="glyphicon glyphicon-edit"></i>
                <span>Update Profile</span>
                 <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                     <li><a href="{{URL::route('updates')}}"><i class="fa fa-circle-o"></i> Update Profile</a></li>
                                 </ul>
            </li>
           
            <li class="treeview" active>
                <a href="#">
                <i class="glyphicon glyphicon-edit"></i>
                <span>Change Password</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                   <li><a href="{{URL::route('updatepasswords')}}"><i class="fa fa-circle-o"></i> Change Password</a></li>
                            </ul>
            </li>
            <li class="treeview active">
                <a href="#">
                <i class="fa fa-laptop"></i>
                <span>File Uploads</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('FileUpload')}}"><i class="fa fa-circle-o"></i> File Upload</a></li>
                                <li><a href="{{URL::route('data')}}"><i class="fa fa-circle-o"></i> View Files</a></li>
                                 </ul>
            </li>
            <li class="treeview ">
                <a href="#">
                <i class="fa fa-edit"></i> <span>Export to Excel</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                   <li><a href="{{URL::route('format')}}"><i class="fa fa-circle-o"></i> Export Admin to Excel</a></li>
                                 <li><a href="{{URL::route('logformat')}}"><i class="fa fa-circle-o"></i> Export User Logs to Excel</a></li>
                                    <li><a href="{{URL::route('timeformat')}}"><i class="fa fa-circle-o"></i> Export File Uploads to Excel</a></li>
                                 <li><a href="{{URL::route('uploadformat')}}"><i class="fa fa-circle-o"></i> Export Time Zone to Excel</a></li>
                             </ul>
            </li>
            <li class="treeview ">
                <a href="#">
                <i class="fa fa-table"></i> <span>Export to PDF</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                     <li><a href="{{URL::route('pdfformat')}}"><i class="fa fa-circle-o"></i> Export Register to PDF</a></li>
                                 <li><a href="{{URL::route('logpdf')}}"><i class="fa fa-circle-o"></i> Export User Logs to PDF</a></li>
                                    <li><a href="{{URL::route('uploadspdf')}}"><i class="fa fa-circle-o"></i> Export File Uploads to PDF</a></li>
                                 <li><a href="{{URL::route('timepdf')}}"><i class="fa fa-circle-o"></i> Export Time Zone to PDF</a></li>
                           </ul>
            </li>
             <li class="treeview active">
                <a href="#">
                <i class="glyphicon glyphicon-time"></i>
                <span>Time Zone</span>
                 <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                     <li><a href="{{URL::route('timezone')}}"><i class="fa fa-circle-o"></i> Time Zone</a></li>
                                 </ul>
            </li>
           
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
  <div class="control-sidebar-bg"></div>
 

        <!-- jQuery 2.2.0 -->
        <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="plugins/morris/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
      