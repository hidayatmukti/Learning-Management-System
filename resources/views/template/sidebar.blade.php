<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">E-LEARNING</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if ($role == 1 )
          <li class="nav-item">
            <a href="{{route('admin')}}" class="nav-link @if ($title == 'DASHBOARD' ){{'active'}} @endif">
              <i class="fas fa-calculator nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('matkul')}}" class="nav-link @if ($title == 'MATA KULIAH' ){{'active'}} @endif">
              <i class="fas fa-calculator nav-icon"></i>
              <p>Mata Kuliah</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('soal')}}" class="nav-link @if ($title == 'SOAL' ){{'active'}} @endif">
              <i class="fas fa-calculator nav-icon"></i>
              <p>Soal</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ujian')}}" class="nav-link @if ($title == 'UJIAN' ){{'active'}} @endif">
              <i class="fas fa-calculator nav-icon"></i>
              <p>Ujian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('pengumuman')}}" class="nav-link @if ($title == 'PENGUMUMAN' ){{'active'}} @endif">
              <i class="fas fa-calculator nav-icon"></i>
              <p>Pengumuman</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('tugas')}}" class="nav-link @if ($title == 'TUGAS' ){{'active'}} @endif">
              <i class="fas fa-calculator nav-icon"></i>
              <p>Tugas</p>
            </a>
          </li>
          @endif
          @if ($role == 2 )
          <li class="nav-item">
            <a href="{{route('admin')}}" class="nav-link @if ($title == 'DASHBOARD' ){{'active'}} @endif">
              <i class="fas fa-calculator nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('matkuls')}}" class="nav-link @if ($title == 'MATA KULIAH' ){{'active'}} @endif">
              <i class="fas fa-calculator nav-icon"></i>
              <p>Mata Kuliah</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ujians')}}" class="nav-link @if ($title == 'UJIAN' ){{'active'}} @endif">
              <i class="fas fa-calculator nav-icon"></i>
              <p>Ujian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('tugass')}}" class="nav-link @if ($title == 'TUGAS' ){{'active'}} @endif">
              <i class="fas fa-calculator nav-icon"></i>
              <p>Tugas</p>
            </a>
          </li>
          
          @endif
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link ">
              <i class="fas fa-calculator nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>