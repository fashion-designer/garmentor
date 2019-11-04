<!-- Dashboard -->
<li>
    <a class="app-menu__item active" href="{{ url('/') }}">
        <i class="fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
    </a>
</li>
<!-- Designer Users -->
<li class="treeview">
    <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="fas fa-users"></i>
        <span class="app-menu__label">My Users</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
    </a>
    <ul class="treeview-menu">
        <!-- List -->
        <li>
            <a class="treeview-item" href="#">
                <i class="fas fa-list"></i> Users list
            </a>
        </li>
        <!-- Create New -->
        <li>
            <a class="treeview-item" href="#">
                <i class="fas fa-plus-circle"></i> Create New
            </a>
        </li>
    </ul>
</li>
<!-- Orders -->
<li class="treeview">
    <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="far fa-window-restore"></i>
        <span class="app-menu__label">Orders</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
    </a>
    <ul class="treeview-menu">
        <!-- List -->
        <li>
            <a class="treeview-item" href="#">
                <i class="fas fa-list"></i> Orders list
            </a>
        </li>
        <!-- Create New -->
        <li>
            <a class="treeview-item" href="{{ route('designer.orders.create') }}">
                <i class="fas fa-plus-circle"></i> Create New
            </a>
        </li>
    </ul>
</li>