demo = {
  initPickColor: function() {
    $('.pick-class-label').click(function() {
      var new_class = $(this).attr('new-class');
      var old_class = $('#display-buttons').attr('data-class');
      var display_div = $('#display-buttons');
      if (display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
      }
    });
  },

  initChartsPages: function() {
    chartColor = "#FFFFFF";

    const bar = document.getElementById('barChart').getContext('2d');
    const data = {
      labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
      datasets: [
        {
          label: 'Hadir',
          data: [6, 7, 8, 7, 6, 8, 9],
          backgroundColor: 'rgba(0, 183, 255, 0.8)',
          stack: 'Stack 0',
        },
        {
          label: 'Izin',
          data: [1, 1, 0, 1, 1, 0, 0],
          backgroundColor: 'rgba(139, 69, 19, 0.8)',
          stack: 'Stack 0',
        },
        {
          label: 'Terlambat',
          data: [2, 1, 2, 1, 2, 0, 1],
          backgroundColor: 'rgba(255, 255, 0, 0.8)',
          stack: 'Stack 0',
        },
        {
          label: 'Tanpa Keterangan',
          data: [1, 1, 0, 1, 1, 2, 0],
          backgroundColor: 'rgba(255, 0, 0, 0.8)',
          stack: 'Stack 0',
        },
      ],
    };

    const options = {
      responsive: true,
      plugins: {
        legend: {
          display: false, // Menghapus legend
        },
      },
      scales: {
        x: {
            ticks: {
                beginAtZero: true
            },
            barPercentage: 0.5,        // Mengecilkan lebar setiap bar (0 - 1.0)
            categoryPercentage: 0.8    // Mengatur ruang dalam satu kategori
        },
        y: {
            beginAtZero: true
        }
      }
    };    
    
    new Chart(bar, {
      type: 'bar',
      data,
      options,
    });
    
    ctx = document.getElementById('doughnutChart').getContext("2d");

    myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Hadir', 'Izin', 'Terlambat', 'Tanpa Keterangan'],
        datasets: [{
          label: "Karyawan",
          pointRadius: 0,
          pointHoverRadius: 0,
          backgroundColor: [
            'rgba(0, 183, 255, 0.8)',
            'rgba(139, 69, 19, 0.8)',
            'rgba(255, 255, 0, 0.8)',
            'rgba(255, 0, 0, 0.8)'
          ],
          borderWidth: 0,
          data: [342, 480, 530, 120]
        }]
      },

      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false, // Menghapus legend
          },
        },

        pieceLabel: {
          render: 'percentage',
          fontColor: ['white'],
          precision: 2
        },

        tooltips: {
          enabled: false
        },

/*        scales: {
          yAxes: [{

            ticks: {
              display: false
            },
            gridLines: {
              drawBorder: false,
              zeroLineColor: "transparent",
              color: 'rgba(255,255,255,0.05)'
            }

          }],

          xAxes: [{
            barPercentage: 1.6,
            gridLines: {
              drawBorder: false,
              color: 'rgba(255,255,255,0.1)',
              zeroLineColor: "transparent"
            },
            ticks: {
              display: false,
            }
          }]
        },*/
      }
    });
  }
};