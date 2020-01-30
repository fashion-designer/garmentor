<!-- Dashboard -->
<li>
    <a class="app-menu__item {!! ($activeTab === 'dashboard') ? 'active' : '' !!}" href="{{ url('/') }}">
        <i class="fa fa-dashboard"></i>
        <span class="app-menu__label">Dashboard</span>
    </a>
</li>
<!-- Admins List -->
<li>
    <a class="app-menu__item {!! ($activeTab === 'admins') ? 'active' : '' !!}" href="{{ route('admin.admins-list') }}">
        <i class="fas fa-user-shield"></i>
        <span class="app-menu__label">Admins List</span>
    </a>
</li>
<!-- Designers List -->
<li>
    <a class="app-menu__item {!! ($activeTab === 'designers') ? 'active' : '' !!}" href="{{ route('admin.designers-list') }}">
        <i class="fas fa-user-cog"></i>
        <span class="app-menu__label">Designers List</span>
    </a>
</li>
<!-- Users List -->
<li>
    <a class="app-menu__item {!! ($activeTab === 'users') ? 'active' : '' !!}" href="{{ route('admin.users-list') }}">
        <i class="fas fa-user-friends"></i>
        <span class="app-menu__label">Users List</span>
    </a>
</li>
<!-- Contact Requests -->
<li>
    <a class="app-menu__item {!! ($activeTab === 'contact-requests') ? 'active' : '' !!}" href="{{ route('admin.contact-requests') }}">
        <i class="fas fa-file-signature"></i>
        <span class="app-menu__label">Contact Requests</span>
    </a>
</li>
<!-- My Profile -->
<li>
    <a class="app-menu__item {!! ($activeTab === 'profile') ? 'active' : '' !!}" href="{{ route('admin.profile.edit') }}">
        <i class="fas fa-id-card"></i>
        <span class="app-menu__label">My Profile</span>
    </a>
</li>
<!-- Orders -->
<li>
    <a class="app-menu__item {!! ($activeTab === 'orders') ? 'active' : '' !!}" href="{{ route('admin.orders') }}">
        <i class="fas fa-tshirt"></i>
        <span class="app-menu__label">Orders</span>
    </a>
</li>
<!-- Demo -->
<li class="treeview">
    <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="fas fa-ruler-combined"></i>
        <span class="app-menu__label">Demo</span>
        <i class="treeview-indicator fa fa-angle-right"></i>
    </a>
    <ul class="treeview-menu">
        <!-- List -->
        <li>
            <a class="treeview-item" href="#">
                <i class="fas fa-list"></i> Demo 1
            </a>
        </li>
        <!-- Create New -->
        <li>
            <a class="treeview-item" href="#">
                <i class="fas fa-plus-circle"></i> Demo 2
            </a>
        </li>
    </ul>
</li>