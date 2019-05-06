<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ asset('images/user.png') }}" alt="User Image" width="48px" height="48px">
        <div>
        <p class="app-sidebar__user-name">{{ Auth::user()->username}}</p>
        </div>
    </div>
    <ul class="app-menu">
        {{-- <li>
            <a class="app-menu__item active" href="#">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li> --}}
        <li>
            <a class="app-menu__item {{ Route::is('posts.index') ? 'active' : ''}}" href="{{ route('posts.index') }}">
                <i class="app-menu__icon fa fa-list"></i>
                <span class="app-menu__label">Book List</span>
            </a>
        </li>
        <li>
        <a class="app-menu__item {{ Route::is('posts.create') ? 'active' : ''}}" href="{{ route('posts.create') }}">
                <i class="app-menu__icon fa fa-pencil-square-o"></i>
                <span class="app-menu__label">Add Book</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-bookmark"></i>
                <span class="app-menu__label">Category</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ Route::is('categories.create') ? 'active' : ''}} " href="{{ route('categories.create') }}"><i class="icon fa fa-circle-o"></i> Add Categoty</a></li>
                <li><a class="treeview-item {{ Route::is('categories.index') ? 'active' : ''}} " href="{{ route('categories.index') }}"><i class="icon fa fa-circle-o"></i> Category List</a></li>
            </ul>
        </li>
        @if (Auth::user()->role == 'ADMIN')
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">User</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{ Route::is('users.create') ? 'active' : ''}} " href="{{ route('users.create') }}"><i class="icon fa fa-circle-o"></i> Add User</a></li>
                <li><a class="treeview-item {{ Route::is('users.index') ? 'active' : ''}} " href="{{ route('users.index') }}"><i class="icon fa fa-circle-o"></i> List User</a></li>
            </ul>
        </li>
        @endif
        {{-- <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-edit"></i>
                <span class="app-menu__label">Forms</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form Components</a></li>
                <li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a></li>
                <li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a></li>
                <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form Notifications</a></li>
            </ul>
        </li> --}}
    </ul>
</aside>