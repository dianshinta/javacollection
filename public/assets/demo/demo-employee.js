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
  
    /*initDocChart: function() {
      chartColor = "#FFFFFF";
  
      ctx = document.getElementById('chartHours').getContext("2d");
  
      myChart = new Chart(ctx, {
        type: 'line',
  
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
          datasets: [{
              borderColor: "#6bd098",
              backgroundColor: "#6bd098",
              pointRadius: 0,
              pointHoverRadius: 0,
              borderWidth: 3,
              data: [300, 310, 316, 322, 330, 326, 333, 345, 338, 354]
            },
            {
              borderColor: "#f17e5d",
              backgroundColor: "#f17e5d",
              pointRadius: 0,
              pointHoverRadius: 0,
              borderWidth: 3,
              data: [320, 340, 365, 360, 370, 385, 390, 384, 408, 420]
            },
            {
              borderColor: "#fcc468",
              backgroundColor: "#fcc468",
              pointRadius: 0,
              pointHoverRadius: 0,
              borderWidth: 3,
              data: [370, 394, 415, 409, 425, 445, 460, 450, 478, 484]
            }
          ]
        },
        options: {
          legend: {
            display: false
          },
  
          tooltips: {
            enabled: false
          },
  
          scales: {
            yAxes: [{
  
              ticks: {
                fontColor: "#9f9f9f",
                beginAtZero: false,
                maxTicksLimit: 5,
                //padding: 20
              },
              gridLines: {
                drawBorder: false,
                zeroLineColor: "#ccc",
                color: 'rgba(255,255,255,0.05)'
              }
  
            }],
  
            xAxes: [{
              barPercentage: 1.6,
              gridLines: {
                drawBorder: false,
                color: 'rgba(255,255,255,0.1)',
                zeroLineColor: "transparent",
                display: false,
              },
              ticks: {
                padding: 20,
                fontColor: "#9f9f9f"
              }
            }]
          },
        }
      });
  
    },*/
  
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
      
/*      ctx = document.getElementById('doughnutChart').getContext("2d");
  
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
          },
        }
      });*/
  
      var speedCanvas = document.getElementById("speedChart");
  
      var dataFirst = {
        data: [0, 19, 15, 20, 30, 40, 40, 50, 25, 30, 50, 70],
        fill: false,
        borderColor: '#fbc658',
        backgroundColor: 'transparent',
        pointBorderColor: '#fbc658',
        pointRadius: 4,
        pointHoverRadius: 4,
        pointBorderWidth: 8,
      };
  
      var dataSecond = {
        data: [0, 5, 10, 12, 20, 27, 30, 34, 42, 45, 55, 63],
        fill: false,
        borderColor: '#51CACF',
        backgroundColor: 'transparent',
        pointBorderColor: '#51CACF',
        pointRadius: 4,
        pointHoverRadius: 4,
        pointBorderWidth: 8
      };
  
      var speedData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [dataFirst, dataSecond]
      };
  
      var chartOptions = {
        legend: {
          display: false,
          position: 'top'
        }
      };
  
      var lineChart = new Chart(speedCanvas, {
        type: 'line',
        hover: false,
        data: speedData,
        options: chartOptions
      });
    },
  
    initGoogleMaps: function() {
      var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
      var mapOptions = {
        zoom: 13,
        center: myLatlng,
        scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
        styles: [{
          "featureType": "water",
          "stylers": [{
            "saturation": 43
          }, {
            "lightness": -11
          }, {
            "hue": "#0088ff"
          }]
        }, {
          "featureType": "road",
          "elementType": "geometry.fill",
          "stylers": [{
            "hue": "#ff0000"
          }, {
            "saturation": -100
          }, {
            "lightness": 99
          }]
        }, {
          "featureType": "road",
          "elementType": "geometry.stroke",
          "stylers": [{
            "color": "#808080"
          }, {
            "lightness": 54
          }]
        }, {
          "featureType": "landscape.man_made",
          "elementType": "geometry.fill",
          "stylers": [{
            "color": "#ece2d9"
          }]
        }, {
          "featureType": "poi.park",
          "elementType": "geometry.fill",
          "stylers": [{
            "color": "#ccdca1"
          }]
        }, {
          "featureType": "road",
          "elementType": "labels.text.fill",
          "stylers": [{
            "color": "#767676"
          }]
        }, {
          "featureType": "road",
          "elementType": "labels.text.stroke",
          "stylers": [{
            "color": "#ffffff"
          }]
        }, {
          "featureType": "poi",
          "stylers": [{
            "visibility": "off"
          }]
        }, {
          "featureType": "landscape.natural",
          "elementType": "geometry.fill",
          "stylers": [{
            "visibility": "on"
          }, {
            "color": "#b8cb93"
          }]
        }, {
          "featureType": "poi.park",
          "stylers": [{
            "visibility": "on"
          }]
        }, {
          "featureType": "poi.sports_complex",
          "stylers": [{
            "visibility": "on"
          }]
        }, {
          "featureType": "poi.medical",
          "stylers": [{
            "visibility": "on"
          }]
        }, {
          "featureType": "poi.business",
          "stylers": [{
            "visibility": "simplified"
          }]
        }]
  
      }
      var map = new google.maps.Map(document.getElementById("map"), mapOptions);
  
      var marker = new google.maps.Marker({
        position: myLatlng,
        title: "Hello World!"
      });
  
      // To add the marker to the map, call setMap();
      marker.setMap(map);
    },
  
    showNotification: function(from, align) {
      color = 'primary';
  
      $.notify({
        icon: "nc-icon nc-bell-55",
        message: "Welcome to <b>Paper Dashboard</b> - a beautiful bootstrap dashboard for every web developer."
  
      }, {
        type: color,
        timer: 8000,
        placement: {
          from: from,
          align: align
        }
      });
    }
  
  };