<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview active">

                <ul class="treeview-menu">
                    <li><a href="{{URL::route('updates')}}"><i class="fa fa-circle-o"></i> Update Profile</a></li>
                    <li><a href="{{URL::route('viewprofile')}}"><i class="fa fa-circle-o"></i> View profile</a></li>               
                </ul>
            </li>           
            <li class="treeview active">

                <ul class="treeview-menu">
                    <li><a href="{{URL::route('updatepasswords')}}"><i class="fa fa-circle-o"></i> Change Password</a></li>
                </ul>
            </li>
            <li class="treeview active">
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('FileUpload')}}"><i class="fa fa-circle-o"></i> File Upload</a></li>
                    <li><a href="{{URL::route('data')}}"><i class="fa fa-circle-o"></i> View Files</a></li>
                </ul>
            </li>
            <li class="treeview active">
                <ul class="treeview-menu">
                    <li><a href="{{URL::route('format')}}"><i class="fa fa-circle-o"></i> Export Admin to Excel</a></li>
                    <li><a href="{{URL::route('logformat')}}"><i class="fa fa-circle-o"></i> Export User Logs to Excel</a></li>
                    <li><a href="{{URL::route('timeformat')}}"><i class="fa fa-circle-o"></i> Export File Uploads to Excel</a></li>
                    <li><a href="{{URL::route('uploadformat')}}"><i class="fa fa-circle-o"></i> Export Time Zone to Excel</a></li>
                </ul>
            </li>
            <li class="treeview active">

                <ul class="treeview-menu">
                    <li><a href="{{URL::route('pdfformat')}}"><i class="fa fa-circle-o"></i> Export Admin to PDF</a></li>
                    <li><a href="{{URL::route('logpdf')}}"><i class="fa fa-circle-o"></i> Export User Logs to PDF</a></li>
                    <li><a href="{{URL::route('uploadspdf')}}"><i class="fa fa-circle-o"></i> Export File Uploads to PDF</a></li>
                    <li><a href="{{URL::route('timepdf')}}"><i class="fa fa-circle-o"></i> Export Time Zone to PDF</a></li>
                    <li><a href="{{URL::route('timezone')}}"><i class="fa fa-circle-o"></i> Time Zone</a></li>
                </ul>
            </li>

        </ul>
    </section>
</aside>
