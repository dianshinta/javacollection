@extends('layouts.sidebarmanajer')

@section('content')
        <div class="d-flex justify-content-start align-items-center gap-4 mb-4">
          <div class="d-flex align-items-center mr-5">
            <i class="nc-icon nc-circle-10 text-primary mr-2"></i>          
            <div>
              <span>Putu Dian Shinta Prativi</span>
              <small class="text-muted d-block">222212822</small>
            </div>
          </div>
          
          <div class="d-flex align-items-center mr-5">
            <i class="nc-icon nc-calendar-60 text-primary mr-2"></i>
            <div>
              <span>Sabtu</span>
              <small class="text-muted d-block">26 Oktober 2024</small>
            </div>
          </div>
          
          <div class="d-flex align-items-center me-4">
            <i class="nc-icon nc-pin-3 text-primary mr-2"></i>
            <div>
              <span>Cab. Tanah Abang</span>
            </div>
          </div>
        </div>

        <!-- Cabang -->
        <div class="cabang">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                  <div class="card-body ">
                    <div class="selected-menu">
                      <div class="selected-btn">
                        <span class="sBtn-text">Pilih Cabang</span>
                        <i class="bx bx-chevron-down"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    
          <div class="overlay" id="overlay-cabang">
            <ul class="options">
                <li class="option" id="option-first">
                    <span class="option-text">Cabang A</span>
                </li>
                <li class="option">
                    <span class="option-text">Cabang B</span>
                </li>
                <li class="option">
                    <span class="option-text">Cabang C</span>
                </li>
                <li class="option" id="option-last">
                    <span class="option-text">Cabang D</span>
                </li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">
                  Kehadiran<br>
                  Karyawan
                </h5>
                <p class="card-category">Mingguan</p>
              </div>
              <div class="card-body">
                <canvas id="barChart"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend">
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(0, 183, 255, 0.8);"></i>Hadir
                  </div>
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(255, 255, 0, 0.8);"></i>Terlambat
                  </div>
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(255, 0, 0, 0.8);"></i>Tidak Hadir
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">
                  Kehadiran<br>
                  Karyawan
                </h5>
                <p class="card-category" id="currentMonth"></p>
              </div>
              <div class="card-body ">
                <canvas id="doughnutChart"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend">
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(0, 183, 255, 0.8);"></i>Hadir
                  </div>
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(255, 255, 0, 0.8);"></i>Terlambat
                  </div>
                  <div class="legend-list">
                    <i class="fa fa-circle" style="color: rgba(255, 0, 0, 0.8);"></i>Tidak Hadir
                  </div>
              @endsection
