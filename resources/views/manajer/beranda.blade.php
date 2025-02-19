@extends('layouts.sidebarmanajer')

@section('content')
<div class="mb-4">
          <small class="text-muted d-block">Beranda</small>
          <h5 class="font-weight-bold">Selamat datang!</h5>
        </div>
        <div class="d-flex justify-content-start align-items-center gap-4 mb-4">
          <div class="d-flex align-items-center mr-5">
            <i class="nc-icon nc-circle-10 text-primary mr-2"></i>          
            <div>
              <span  style="overflow: hidden; text-overflow: ellipsis; max-width: 130px; max-height: 3rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ Auth::user()->name }}</span>
              <small class="text-muted d-block">{{ Auth::user()->nip }}</small>
            </div>
          </div>
          <div class="d-flex align-items-center mr-5">
            <i class="nc-icon nc-calendar-60 text-primary mr-2"></i>
            <div>
              <span>{{ \Carbon\Carbon::now()->translatedFormat('l') }}</span> <!-- Nama Hari -->
              <small class="text-muted d-block">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</small> <!-- Tanggal -->
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
                        <span class="sBtn-text"></span>
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
                </div>
              </div>
            </div>
          </div>
        </div>

          <!-- Tabel -->
          <div class="row">
            <p class="font-weight-bold" style="margin-left: 1rem; margin-bottom: 0.5rem; font-size: 1.2rem;">Riwayat</p>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Waktu</th>
                                </thead>
                                <tbody id="data-table-body">
                                    <!-- Data akan diisi secara dinamis -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

<script type="module" src="{{ asset('../assets/js/dashboard-manajer.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
