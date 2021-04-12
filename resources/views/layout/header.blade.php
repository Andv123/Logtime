<?php
    if (Auth::User()->role == 0){
?>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-cyan navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebar-toggle-btn" id="push-menu" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../page/home" class="nav-link text-bold">
                    <i class="fas fa-home"></i>Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../page/contact" class="nav-link  text-bold">
                    <i class="fas fa-phone-alt"></i> Contact</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Logout -->
            <li class="nav-item">
                <a href="../page/logout" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" role="button" onclick="fullScreen()">
                    <i class="fas fa-expand d-none" id="zoom-in"></i>
                    <i class="fas fa-expand-arrows-alt" id="zoom-out"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

<?php
    }
    if (Auth::User()->role == 1) {
?>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-gray navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebar-toggle-btn" id="push-menu" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../admin/home" class="nav-link text-bold">
                    <i class="fas fa-home"></i>Home</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <div class="navbar-search-block">
                    <form class="form-inline" action="../admin/search" method="post">
                        <div class="input-group input-group-sm">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input class="form-control form-control-navbar" type="search"
                                   placeholder="Search user" name='searchKey'>
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Logout -->
            <li class="nav-item">
                <a href="../page/logout" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" role="button" onclick="fullScreen()">
                    <i class="fas fa-expand d-none" id="zoom-in"></i>
                    <i class="fas fa-expand-arrows-alt" id="zoom-out"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
<?php } ?>
