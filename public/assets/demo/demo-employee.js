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
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [
          {
            label: 'Hadir',
            data: [6, 7, 8, 7, 6, 8, 9, 6, 7, 8, 7, 6],
            backgroundColor: 'rgba(0, 183, 255, 0.8)',
            stack: 'Stack 0',
          },
          {
            label: 'Izin',
            data: [1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1],
            backgroundColor: 'rgba(139, 69, 19, 0.8)',
            stack: 'Stack 0',
          },
          {
            label: 'Terlambat',
            data: [2, 1, 2, 1, 2, 0, 1, 2, 1, 2, 1, 2],
            backgroundColor: 'rgba(255, 255, 0, 0.8)',
            stack: 'Stack 0',
          },
          {
            label: 'Tanpa Keterangan',
            data: [1, 1, 0, 1, 1, 2, 0, 1, 1, 0, 1, 1],
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
    }
  };