<div class="smos-navbar" style="height: 60px;">
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: rgb(137, 45, 45);">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand fs-4" href="#" style="color: white; font-family: 'Times New Roman', Times, serif;">SMOS <b style="color: orange;">COMPANY</b></a>
            <!-- toggler-button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Side-bar -->
            <div class="smos-sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <!-- Side-bar header-->
                <div class="offcanvas-header text-white border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">SMOS COMPANY</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <!-- Side-bar body-->
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    
                        @auth
                            <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ route('all_cvs') }}" style="color: white;">User Cv</a>

                            </li>
                            <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ route('admin.template')}}" style="color: white;">Template</a>

                            </li>
                            <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}" style="color: white;">Dashboard</a>
                            </li>
                            <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ route('admin.user') }}" style="color: white;">User</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="{{ route('logout') }}" style="color: white;">Logout</a>
                            </li>
                           
                        @else
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="login" style="color: white;">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
