<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="https://vignette.wikia.nocookie.net/narutopedija-sr/images/7/7d/Naruto_Part_II.png/revision/latest?cb=20161011100547" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="https://vignette.wikia.nocookie.net/narutopedija-sr/images/7/7d/Naruto_Part_II.png/revision/latest?cb=20161011100547" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">
                                {{ ucfirst(admin()->user()->name ?? auth()->user()->name) }}
                            </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    @if( admin()->user()!== null )
                        <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Manage Admin
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a target="_blank" href="{{ aurl('create') }}" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-pie-chart"></i>
                        <p>
                            Manage Inventories
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ aiurl() }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Present All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ aiurl('create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Create Inventory</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tree"></i>
                        <p>
                            Manage Manager
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a target="_blank" href="{{ amurl() }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Present all</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" href="{{ amurl('create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Create Manager</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>
                            Manage Suppliers
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a target="_blank" href="{{ surl('') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Present All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" href="{{ surl('create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Create Supplier</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Tables
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/tables/simple.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/data.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Data Tables</p>
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