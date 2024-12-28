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
  
    initChartsPages: async function () {
      chartColor = "#FFFFFF";
  
      // Fetch data from API
      const response = await fetch('/api/attendance-data');
      const attendanceData = await response.json();
  
      const days = attendanceData.map(item => item.day);
      const present = attendanceData.map(item => item.present);
      const leave = attendanceData.map(item => item.leave);
      const late = attendanceData.map(item => item.late);
      const absent = attendanceData.map(item => item.absent);
  
      // Total untuk setiap kategori untuk doughnut chart
      const totalPresent = present.reduce((a, b) => a + b, 0);
      const totalLeave = leave.reduce((a, b) => a + b, 0);
      const totalLate = late.reduce((a, b) => a + b, 0);
      const totalAbsent = absent.reduce((a, b) => a + b, 0);
  
      // 1. Grafik Bar
      const bar = document.getElementById('barChart').getContext('2d');
      const barData = {
          labels: days,
          datasets: [
              {
                  label: 'Hadir',
                  data: present,
                  backgroundColor: 'rgba(0, 183, 255, 0.8)',
                  stack: 'Stack 0',
              },
              {
                  label: 'Izin',
                  data: leave,
                  backgroundColor: 'rgba(139, 69, 19, 0.8)',
                  stack: 'Stack 0',
              },
              {
                  label: 'Terlambat',
                  data: late,
                  backgroundColor: 'rgba(255, 255, 0, 0.8)',
                  stack: 'Stack 0',
              },
              {
                  label: 'Tanpa Keterangan',
                  data: absent,
                  backgroundColor: 'rgba(255, 0, 0, 0.8)',
                  stack: 'Stack 0',
              },
          ],
      };
  
      const barOptions = {
          responsive: true,
          plugins: {
              legend: {
                  display: false, // Menghapus legend
              },
          },
          scales: {
              x: {
                  ticks: {
                      beginAtZero: true,
                  },
                  barPercentage: 0.5,
                  categoryPercentage: 0.8,
              },
              y: {
                  beginAtZero: true,
              },
          },
      };
  
      new Chart(bar, {
          type: 'bar',
          data: barData,
          options: barOptions,
      });
  
      // 2. Grafik Doughnut
      const doughnut = document.getElementById('doughnutChart').getContext("2d");
      const doughnutData = {
          labels: ['Hadir', 'Izin', 'Terlambat', 'Tanpa Keterangan'],
          datasets: [{
              label: "Karyawan",
              backgroundColor: [
                  'rgba(0, 183, 255, 0.8)',
                  'rgba(139, 69, 19, 0.8)',
                  'rgba(255, 255, 0, 0.8)',
                  'rgba(255, 0, 0, 0.8)'
              ],
              borderWidth: 0,
              data: [totalPresent, totalLeave, totalLate, totalAbsent],
          }],
      };
  
      const doughnutOptions = {
          responsive: true,
          plugins: {
              legend: {
                  display: false, // Menghapus legend
              },
          },
      };
  
      new Chart(doughnut, {
          type: 'doughnut',
          data: doughnutData,
          options: doughnutOptions,
      });
    }
};