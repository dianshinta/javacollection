<div class="sidebar-wrapper">
    <ul class="nav">
        <!-- Beranda -->
        <li class="{{ ($title === 'Beranda') ? 'active' : '' }}">
            <a href="{{route('beranda')}}">
            <i class="nc-icon nc-layout-11"></i>
            <p>Beranda</p>
            </a>
        </li>
        <!-- Karyawan -->
        <li class="dropdown {{($title === 'Perizinan' || $title === "Informasi") ? 'active' : '' }}">
            <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false" data-target="#pengajuanDropdown">
            <i class="nc-icon nc-single-copy-04"></i>
            <p class="d-inline-block mr-5">Karyawan</p>
            </a>
            <div class="collapse" id="pengajuanDropdown">
                <ul class="nav" style="margin-left: 62px;">
                    <!-- Sub menu perizinan -->
                    <li class="{{($title === 'Perizinan') ? 'active' : '' }}">
                        <a href="{{route('perizinan')}}">
                            <p>Perizinan</p>
                        </a>
                    </li>
                    <!-- Sub menu informasi -->
                    <li>
                        {{-- <li class="{{($title === 'Informasi') ? 'active' : '' }}">
                            <a href="{{route('informasi')}}">
                                <p>Informasi</p>
                            </a>
                        </li> --}}
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>