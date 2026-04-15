<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{ asset('assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Admin Smart Eskul</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="{{ route('admin.dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard Admin</span>
          </a>
        </li>
                <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-warning" href="{{ route('home') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Halaman User</span>
          </a>
        </li>
        <li class="nav-item">
  <a class="nav-link text-white" href="{{ route('admin.siswa.index') }}">
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">people</i>
    </div>
    <span class="nav-link-text ms-1">Data Siswa</span>
  </a>
</li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('admin.eskul.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Ekskul</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('admin.jadwal.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Jadwal Ekskul</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('admin.daftar_eskul.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Daftar Ekskul</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('admin.penerimaan.index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
          <span class="nav-link-text ms-1">Penerimaan Siswa Baru</span>
          </a>
        </li>
  <li class="nav-item">
  <a class="nav-link text-white" data-bs-toggle="collapse" href="#tahunAjaranMenu" role="button" aria-expanded="false" aria-controls="tahunAjaranMenu">
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">calendar_today</i>
    </div>
    <span class="nav-link-text ms-1">Tahun Ajaran</span>
  </a>
  <div class="collapse ps-2" id="tahunAjaranMenu">
    <ul class="nav ms-4 flex-column">
      <li class="nav-item">
        <a class="nav-link text-white {{ session('filter_tahun') == '' ? 'fw-bold' : '' }}" href="{{ route('admin.filter.tahun', ['tahun_ajaran' => '']) }}">
          -- Semua Tahun --
        </a>
      </li>
      @foreach ($tahunList as $tahun)
        <li class="nav-item">
          <a class="nav-link text-white {{ session('filter_tahun') == $tahun ? 'fw-bold' : '' }}" href="{{ route('admin.filter.tahun', ['tahun_ajaran' => $tahun]) }}">
            {{ $tahun }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
  <li class="nav-item mt-3">
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger w-100">
            Logout
        </button>
    </form>
</li>

            </li>
      </ul>
    </div>
  </aside>
