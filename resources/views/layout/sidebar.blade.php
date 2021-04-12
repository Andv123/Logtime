<?php
    if (Auth::User()->role == 0) {
?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-cyan elevation-4">
        <!-- Sidebar user panel (optional) -->
        <div class="sidebar">
            <a href="../page/home" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Allogical</span>
            </a>
            <!-- Sidebar user profile -->
            <div class="profile">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/{{Auth::User()->picture}} " class="img-circle elevation-2" alt="User Image">
                    </div>
                    <a href="../page/profile" class="info">
                        <div class="d-block">{{Auth::User()->full_name}}</div>
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2 sile-bar__menu">
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                    <li class="nav-item sidebar__menu--user">
                        <a href="../page/profile" class="nav-link now-active">
                            <i class="nav-icon fas fa-user"></i>
                            <p>User profile</p>
                        </a>
                    </li>
                    <li class="nav-item sidebar__menu--over-time">
                        <a href="../page/overtime/{{Auth::User()->id}}" class="nav-link now-active">
                            <i class="nav-icon fas fa-business-time"></i>
                            <p>Over times</p>
                        </a>
                    </li>
                    <li class="nav-item sidebar__menu--off-time">
                        <a href="../page/attendence/{{Auth::User()->id}}" class="nav-link now-active">
                            <i class="nav-icon fas fa-calendar-times"></i>
                            <p>Off times</p>
                        </a>
                    </li>
                    <li class="nav-item sidebar__menu--add-ot">
                        <a href="../page/overtime/add/{{Auth::User()->id}}" class="nav-link now-active">
                            <i class="nav-icon fas fa-plus-square"></i>
                            <p>Log Overtime</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </aside>
<?php
    }
    if (Auth::User()->role == 1) {
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar user panel (optional) -->
    <div class="sidebar">
        <a href="../admin/home" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-light">Allogical</span>
        </a>
        <!-- Sidebar user profile -->
        <div  class="profile">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/{{Auth::User()->picture}} " class="img-circle elevation-2" alt="User Image">
                </div>
                <a href="" class="info not-active">
                    <div class="d-block">Admin</div>
                </a>
            </div>
        </div>

        <nav class="mt-2 sidebar__menu">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item  menu__user">
                    <a href="javascript:void(0);" class="nav-link user-title">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User manage</p>
                    </a>
                    <ul class="nav list__menu--user">
                        <li class="nav-item">
                            <a href="../admin/user_manage/list" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p>List user</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/user_manage/add" class="nav-link">
                                <i class="far fa-address-book nav-icon"></i>
                                <p>Add new user</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/user_manage/export" class="nav-link"
                               onclick="return confirm('Are you sure you want to export list user?');">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Export data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu__over-time">
                    <a href="javascript:void(0);" class="nav-link ot-title">
                        <i class="nav-icon fas fa-business-time"></i>
                        <p>Over times</p>
                    </a>
                    <ul class="nav list__menu--over-time">
                        <li class="nav-item">
                            <a href="../admin/overtime/list" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p>List over time</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/overtime/add" class="nav-link">
                                <i class="fa fa-clock nav-icon"></i>
                                <p>Add new over time</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/overtime/export" class="nav-link"
                               onclick="return confirm('Are you sure you want to export list over time?');">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Export data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu__off-time">
                    <a href="javascript:void(0);" class="nav-link off-title">
                        <i class="nav-icon fas fa-calendar-times"></i>
                        <p>Off times</p>
                    </a>
                    <ul class="nav list__menu--off-time">
                        <li class="nav-item">
                            <a href="../admin/attendence/list" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p>List off time</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/attendence/add" class="nav-link">
                                <i class="far fa-clock nav-icon"></i>
                                <p>Add new off time</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/attendence/export" class="nav-link"
                               onclick="return confirm('Are you sure you want to export list off time?');">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Export off time</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>


    </div>
    <!-- /.sidebar -->
</aside>
<?php } ?>
