<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <!-- Blog & Video Content -->

        <li class="nav-item sidebar-category">
            <p>Content Management</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#blogMenu" aria-expanded="false">
                <i class="mdi mdi-pencil menu-icon"></i>
                <span class="menu-title">Blog Articles</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blogMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.blog.create') }}">Add New</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.blog.index') }}">Manage Articles</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.blog.categories') }}">Categories </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#videosMenu" aria-expanded="false">
                <i class="mdi mdi-youtube menu-icon"></i>
                <span class="menu-title">Video Library</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="videosMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.videos.index') }}">Youtube Videos</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.videos.playlists') }}">Playlist</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.videos.trending') }}">Trending </a>
                    </li>
                </ul>
            </div>
        </li>


        <!-- Stock Analysis -->
        <li class="nav-item sidebar-category">
            <p> Stock Analysis</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#stockAnalysisMenu" aria-expanded="false">
                <i class="mdi mdi-chart-line menu-icon"></i>
                <span class="menu-title">Stock Analytics</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="stockAnalysisMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="#">Daily Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Weekly Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Monthly Analytics</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Quarterly & Yearly</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Custom Filters</a></li>
                </ul>
            </div>
        </li>

        <!-- Portfolio Management -->
        <li class="nav-item sidebar-category">
            <p>Portfolio Management</p>
            <span></span>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.portfolio.index') }}">
                <i class="mdi mdi-folder menu-icon"></i>
                <span class="menu-title">User Portfolios</span>
            </a>
        </li>

        <!-- Stockbroker Directory -->
        <li class="nav-item sidebar-category">
            <p>Stockbroker Directory</p>
            <span></span>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.stockbrokers.index') }}">
                <i class="mdi mdi-bank menu-icon"></i>
                <span class="menu-title">Stockbrokers List</span>
            </a>
        </li>

        <!-- Esusu Management -->
        <li class="nav-item sidebar-category">
            <p>Esusu Management</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.esusu.index') }}">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Esusu Groups</span>
            </a>
        </li>

        <!-- Settings & Logout -->

        <li class="nav-item sidebar-category">
            <p>Settings</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.settings') }}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Settings</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">
                <i class="mdi mdi-logout menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>
