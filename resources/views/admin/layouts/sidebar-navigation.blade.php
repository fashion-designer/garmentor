<!-- Dashboard -->
<li>
    <a class="app-menu__item active" href="{{ url('/') }}">
        <i class="fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
    </a>
</li>
<!-- Measurements -->
<li class="treeview">
    <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="fas fa-ruler-combined"></i>
        <span class="app-menu__label">Measurements</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
    </a>
    <ul class="treeview-menu">
        <!-- List -->
        <li>
            <a class="treeview-item" href="{{ url('admin/measurements/index') }}">
                <i class="fas fa-list"></i> Charts list
            </a>
        </li>
        <!-- Create New -->
        <li>
            <a class="treeview-item" href="{{ url('admin/measurements/create') }}">
                <i class="fas fa-plus-circle"></i> Create New
            </a>
        </li>
    </ul>
</li>