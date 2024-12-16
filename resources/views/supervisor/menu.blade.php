<div class="sidebar-wrapper">
    <ul class="nav">
      <li class="active ">
        <a href="{{route('beranda')}}">
          <i class="nc-icon nc-layout-11"></i>
          <p>Beranda</p>
        </a>
      </li>
      <li>
        <a href="{{route('presensi')}}">
          <i class="nc-icon nc-touch-id"></i>
          <p>Presensi</p>
        </a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="collapse" aria-expanded="false" data-target="#pengajuanDropdown">
          <i class="nc-icon nc-single-copy-04"></i>
          <p class="d-inline-block mr-5">Pengajuan</p>
        </a>
        <div class="collapse" id="pengajuanDropdown">
          <ul class="nav" style="margin-left: 62px;">
            <li>
              <a href="{{route('perizinan')}}" ">
                <p>Perizinan</p>
              </a>
            </li>
            <li>
              <a href="{{route(name: 'kasbon')}}">
                <p>Kasbon</p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      
      <li>
        <a href="./notifications.html">
          <i class="nc-icon nc-money-coins"></i>
          <p>Gaji</p>
        </a>
      </li>
      <li>
        <a href="./user.html">
          <i class="nc-icon nc-single-02"></i>
          <p>User Profile</p>
        </a>
      </li>
    </ul>
    </div>