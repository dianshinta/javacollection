const demo = {
    initPickColor: function () {
        $('.pick-class-label').click(function () {
            const new_class = $(this).attr('new-class');
            const old_class = $('#display-buttons').attr('data-class');
            const display_div = $('#display-buttons');
            if (display_div.length) {
                const display_buttons = display_div.find('.btn');
                display_buttons.removeClass(old_class);
                display_buttons.addClass(new_class);
                display_div.attr('data-class', new_class);
            }
        });
    },
  };
  
  let barChartInstance = null;
  let doughnutChartInstance = null;
  
  export async function updateCharts(selectedCabang) {
      try {
          const response = await fetch(`/api/chart-data?toko=${encodeURIComponent(selectedCabang)}`);
          const { weeklyData, monthlyData } = await response.json();
  
          // Update Bar Chart
          const barChartCtx = document.getElementById("barChart").getContext("2d");
  
          // Hancurkan instance grafik jika sudah ada
          if (barChartInstance) {
              barChartInstance.destroy();
          }
  
          // Fungsi untuk mendapatkan semua tanggal dalam rentang seminggu terakhir
            const getLastWeekDates = () => {
                const dates = [];
                const today = new Date();

                for (let i = 6; i >= 0; i--) {
                    const date = new Date(today);
                    date.setDate(today.getDate() - i);
                    dates.push(date.toISOString().split('T')[0]); // Format: YYYY-MM-DD
                }

                return dates;
            };

            // Mengelompokkan data berdasarkan tanggal dengan nilai default
            const groupedData = getLastWeekDates().reduce((acc, date) => {
                acc[date] = { hadir: 0, terlambat: 0, tidak: 0 }; // Nilai default
                return acc;
            }, {});

            // Isi data dari weeklyData API ke groupedData
            weeklyData.forEach(item => {
                if (groupedData[item.tanggal]) {
                    if (item.status === "Hadir") {
                        groupedData[item.tanggal].hadir++;
                    } else if (item.status === "Terlambat") {
                        groupedData[item.tanggal].terlambat++;
                    } else if (item.status === "Tidak Hadir") {
                        groupedData[item.tanggal].tidak++;
                    }
                }
            });

            // Fungsi untuk mendapatkan nama hari
            const getDayName = (dateString) => {
                const date = new Date(dateString);
                const dayNames = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                return dayNames[date.getDay()];
            };

            // Ekstrak data untuk grafik
            const labels = Object.keys(groupedData).map(date => getDayName(date)); // Nama hari
            const hadirData = Object.keys(groupedData).map(date => groupedData[date].hadir);
            const terlambatData = Object.keys(groupedData).map(date => groupedData[date].terlambat);
            const tidakData = Object.keys(groupedData).map(date => groupedData[date].tidak);

            // Buat chart dengan data baru
            barChartInstance = new Chart(barChartCtx, {
                type: "bar",
                data: {
                    labels: labels, // Nama hari digunakan sebagai label
                    datasets: [
                        {
                            label: "Hadir",
                            data: hadirData,
                            backgroundColor: "rgba(0, 183, 255, 0.8)", // Warna biru
                        },
                        {
                            label: "Terlambat",
                            data: terlambatData,
                            backgroundColor: "rgba(255, 255, 0, 0.8)", // Warna kuning
                        },
                        {
                            label: "Tidak Hadir",
                            data: tidakData,
                            backgroundColor: "rgba(255, 0, 0, 0.8)", // Warna merah
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false, // Tampilkan legenda
                            position: "top",
                        },
                        tooltip: {
                            callbacks: {
                                title: (tooltipItems) => {
                                    // Gunakan tanggal asli sebagai judul tooltip
                                    const index = tooltipItems[0].dataIndex;
                                    const date = Object.keys(groupedData)[index]; // Ambil tanggal berdasarkan indeks
                                    return `Tanggal: ${date}`;
                                },
                                label: (tooltipItem) => {
                                    const datasetLabel = tooltipItem.dataset.label || "";
                                    const value = tooltipItem.raw;
                                    return `${datasetLabel}: ${value}`;
                                },
                            },
                        },
                    },
                    scales: {
                        x: {
                            stacked: true, // Batang saling ditumpuk
                            barPercentage: 0.5, // Lebar batang
                            categoryPercentage: 0.8, // Jarak antar batang
                        },
                        y: {
                            stacked: true, // Nilai saling ditumpuk
                            beginAtZero: true, // Mulai dari nol
                        },
                    },
                },
            });           
  
          // Update Doughnut Chart
          const doughnutChartCtx = document.getElementById("doughnutChart").getContext("2d");
  
          // Hancurkan instance grafik jika sudah ada
          if (doughnutChartInstance) {
              doughnutChartInstance.destroy();
          }
  
          // Menghitung jumlah status kehadiran
          const totalKehadiran = monthlyData.filter(item => item.status === "Hadir").length;
          const totalKeterlambatan = monthlyData.filter(item => item.status === "Terlambat").length;
          const totalTidak = monthlyData.filter(item => item.status === "Tidak Hadir").length;
  
          // Membuat grafik Doughnut
          doughnutChartInstance = new Chart(doughnutChartCtx, {
              type: "doughnut",
              data: {
                  labels: ["Hadir", "Terlambat", "Tidak Hadir"], // Label untuk setiap status
                  datasets: [
                      {
                          data: [totalKehadiran, totalKeterlambatan, totalTidak], // Data untuk setiap status
                          backgroundColor: [
                              "rgba(0, 183, 255, 0.8)", // Warna biru untuk Hadir
                              "rgba(255, 255, 0, 0.8)", // Warna kuning untuk Terlambat
                              "rgba(255, 0, 0, 0.8)",   // Warna merah untuk Tidak Hadir
                          ],
                      },
                  ],
              },
              options: {
                  responsive: true,
                  plugins: {
                      legend: {
                          display: false, // Tampilkan legenda
                          position: "top",
                      },
                  },
              },
          });
      } catch (error) {
          console.error("Gagal memperbarui grafik:", error);
      }
  }