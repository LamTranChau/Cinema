<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminNe/dist/img/ChauNe2.jpg' ) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.user.index') }}" class="d-block">
                    Lâm Trấn Châu                    
                </a>
            </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">            
            <div class="info">                
                <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket" style="margin-right: 10px;"></i>Đăng xuất</a>
            </div>
        </div>
       
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon classĐăng ký
                    with font-awesome or any other icon font library -->
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fas fa-user"></i>
                        <p>
                            Người dùng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link">
                                <p>Danh sách - Người dùng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.create') }}" class="nav-link">                                
                                <p>Đăng ký - Người dùng</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-brands fa-intercom"></i>
                        <p>
                            Ứng dụng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.appmanage.index') }}" class="nav-link">
                                <p>Giao diện - Ứng dụng</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fas fa-house"></i>
                        <p>
                            Chi nhánh
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.brand.index') }}" class="nav-link">
                                <p>Danh sách - Chi nhánh</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brand.create') }}" class="nav-link">                                
                                <p>Đăng ký - Chi nhánh</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-person-booth"></i>
                        <p>
                            Phòng chiếu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.room.index') }}" class="nav-link">
                                <p>Danh sách - Phòng chiếu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.room.create') }}" class="nav-link">                                
                                <p>Đăng ký - Phòng chiếu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-couch"></i>
                        <p>
                            Ghế
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.seat.index') }}" class="nav-link">
                                <p>Danh sách - Ghế</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.seat.create') }}" class="nav-link">                                
                                <p>Đăng ký - Ghế</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-list"></i>
                        <p>
                            Thể loại
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}" class="nav-link">
                                <p>Danh sách - Thể loại</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.create') }}" class="nav-link">                                
                                <p>Đăng ký - Thể loại</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fas fa-film"></i>
                        <p>
                            Phim
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.film.index') }}" class="nav-link">
                                <p>Danh sách - Phim</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.film.create') }}" class="nav-link">                                
                                <p>Đăng ký - Phim</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-calendar-day"></i>
                        <p>
                            Thời gian
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.time.index') }}" class="nav-link">
                                <p>Danh sách - Thời gian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.time.create') }}" class="nav-link">                                
                                <p>Đăng ký - Thời gian</p>
                            </a>
                        </li>
                    </ul>
                </li>              
               
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-ticket"></i>
                        <p>
                            Suất chiếu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.showtime.index') }}" class="nav-link">
                                <p>Danh sách - Suất chiếu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.showtime.create') }}" class="nav-link">                                
                                <p>Đăng ký - Suất chiếu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-ticket"></i>
                        <p>
                            Đặt vé
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.ticket.index') }}" class="nav-link">
                                <p>Danh sách - Đặt vé</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.ticket.create') }}" class="nav-link">                                
                                <p>Đăng ký - Đặt vé</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bill"></i>
                        <p>
                            Thanh toán
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.payment') }}" class="nav-link">
                                <p>Danh sách - Thanh toán</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>