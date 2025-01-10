<div class="navbar-wrapper d-md-none">
    <!-- Hamburger Menu -->
    <button class="navbar-toggler" id="hamburger-menu" type="button">
        <i class="nc-icon nc-align-left-2"></i>
    </button>
    <!-- Logout Button -->
    <form action="{{ route('logout') }}" method="POST" class="d-inline-block ml-auto">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="nc-icon nc-button-power"></i>
        </button>
    </form>
</div>

<div class="sidebar-wrapper d-none d-md-block" id="sidebar">
    <ul class="nav">
        <!-- Beranda -->
        <li class="{{ ($title === 'Beranda') ? 'active' : '' }}">
            <a href="{{route('supervisor.beranda')}}">
            <i class="nc-icon nc-layout-11"></i>
            <p>Beranda</p>
            </a>
        </li>
        <!-- Karyawan -->
        <li class="dropdown {{($title === 'Perizinan' || $title === "Informasi") ? 'active' : '' }}">
            <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false" data-target="#karyawanDropdown">
                <i class="nc-icon nc-single-02"></i>
            <p class="d-inline-block mr-5">Karyawan</p>
            </a>
            <div class="collapse" id="karyawanDropdown">
                <ul class="nav" style="margin-left: 62px;">
                    <!-- Sub menu perizinan -->
                    <li class="{{($title === 'Perizinan') ? 'active' : '' }}">
                        <a href="{{route('supervisor.perizinan')}}">
                            <p>Perizinan</p>
                        </a>
                    </li>
                    <!-- Sub menu informasi -->
                    <li class="{{ request()->is('supervisor/infokaryawan') ? 'active' : '' }}">
                        <a href="{{ route('supervisor.infokaryawan') }}">
                            <p>Informasi Karyawan</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- Kasbon -->
        <li class="dropdown {{($title === 'Pengajuan' || $title === "Pembayaran") ? 'active' : '' }}">
            <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false" data-target="#kasbonDropdown">
            <i class="nc-icon nc-money-coins"></i>
            <p class="d-inline-block mr-5">Kasbon</p>
            </a>
            <div class="collapse" id="kasbonDropdown">
                <ul class="nav" style="margin-left: 62px;">
                    <!-- Sub menu pengajuan -->
                    <li class="{{($title === 'Pengajuan') ? 'active' : '' }}">
                        <a href="{{route('supervisor.pengajuan')}}">
                            <p>Pengajuan</p>
                        </a>
                    </li>
                    <!-- Sub menu pembayaran -->
                    <li>
                        <li class="{{($title === 'Pembayaran') ? 'active' : '' }}">
                            <a href="{{route('supervisor.pembayaran')}}">
                                <p>Pembayaran</p>
                            </a>
                        </li>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <!-- Logout -->
    <div class="mt-auto p-3">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger btn-block">
            <i class="nc-icon nc-button-power"></i> Logout
          </button>
        </form>
    </div>
</div>

<!-- Tambahkan script untuk hamburger -->
<script>
    document.getElementById('hamburger-menu').addEventListener('click', function () {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('d-none');
    });
</script>

<!-- Tambahkan styling -->
<style>
    .navbar-wrapper {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
    }

    .navbar-toggler {
        border: none;
        background: none;
    }

    .navbar-wrapper form {
        margin-left: auto;
    }
</style>
