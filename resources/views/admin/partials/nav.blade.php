<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Menu</li>
  <!-- Optionally, you can add icons to the links -->
  <li {{ request()->is('admin') ? 'class=active' : '' }}>
      <a href=" {{ route('dashboard') }}"><i class="fa fa-home"></i> <span>Inicio</span>
      </a>
  </li>
  <li class="treeview {{ request()->is('admin/users') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-bars"></i> <span>Usuarios</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li {{ setActiveRoute('admin.users')  }}>
		      <a href=" {{ route('admin.users.index') }}"><i class="fa fa-eye"></i> Mostrar todos</a>
      </li>

    </ul>


  </li>
  <li class="treeview {{ request()->is('admin/roles') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-bars"></i> <span>Roles</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li {{ setActiveRoute('admin.cairo_ps_get_levels()')  }}>
          <a href="{{ route('admin.roles.index') }}"><i class="fa fa-eye"></i> Mostrar todos</a>
      </li>

    </ul>
  </li>
  @if(auth()->user()->hasRoles(['admin']))
  <li class="treeview {{ request()->is('admin/files') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-bars"></i> <span>Archivos</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li {{ setActiveRoute('admin.files')  }}>
          <a href=" {{ route('admin.files.index') }}"><i class="fa fa-eye"></i> Mostrar todos</a>
      </li>

    </ul>
  </li>
  @endif
</ul>