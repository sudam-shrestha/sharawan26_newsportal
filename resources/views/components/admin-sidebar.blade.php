<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">
            SUDAM HUB
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown {{ Request::routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>

        <li class="dropdown {{ Request::routeIs('admin.company*') ? 'active' : '' }}">
            <a href="{{ route('admin.company.index') }}" class="nav-link"><i
                    data-feather="briefcase"></i><span>Company</span></a>
        </li>

        <li class="dropdown">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="tag"></i><span>Category</span></a>
        </li>

        <li class="dropdown">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="folder"></i><span>Article</span></a>
        </li>
    </ul>
</aside>
