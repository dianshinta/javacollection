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

// Fungsi utama untuk mengambil data dan menampilkan chart
const initBarChart = async () => {
    try {
        const response = await fetch('/api/index-data'); // Ganti dengan URL API Anda
        const weeklyData = await response.json(); // Parsing data JSON dari respons

        // Tahun sekarang
        const currentYear = new Date().getFullYear();

        // Filter data berdasarkan tahun ini
        const currentYearData = weeklyData.filter(item => {
            const year = new Date(item.tanggal).getFullYear();
            return year === currentYear;
        });

        // Fungsi untuk mendapatkan nama bulan
        const getMonthName = (monthIndex) => {
            const monthNames = [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];
            return monthNames[monthIndex];
        };

        // Kelompokkan data berdasarkan bulan (dalam tahun ini saja)
        const groupedData = currentYearData.reduce((acc, item) => {
            const date = new Date(item.tanggal);
            const month = date.getMonth(); // Index bulan (0 = Januari, 11 = Desember)
            if (!acc[month]) {
                acc[month] = { hadir: 0, terlambat: 0, tidak: 0 };
            }
            if (item.status === "Hadir") {
                acc[month].hadir++;
            } else if (item.status === "Terlambat") {
                acc[month].terlambat++;
            } else if (item.status === "Tidak Hadir") {
                acc[month].tidak++;
            }
            return acc;
        }, {});

        // Ekstrak data untuk grafik (hanya bulan yang memiliki data)
        const labels = Object.keys(groupedData)
            .map(monthIndex => getMonthName(monthIndex)); // Nama bulan
        const hadirData = Object.keys(groupedData)
            .map(monthIndex => groupedData[monthIndex].hadir);
        const terlambatData = Object.keys(groupedData)
            .map(monthIndex => groupedData[monthIndex].terlambat);
        const tidakData = Object.keys(groupedData)
            .map(monthIndex => groupedData[monthIndex].tidak);

        // Elemen canvas untuk chart
        const barChartCanvas = document.getElementById("barChart");
        if (!barChartCanvas) {
            console.error("Elemen canvas dengan id 'barChart' tidak ditemukan!");
            return;
        }

        const barChartCtx = barChartCanvas.getContext("2d");

        // Hancurkan instance grafik jika sudah ada
        if (barChartInstance) {
            barChartInstance.destroy();
        }

        // Buat chart dengan data baru
        barChartInstance = new Chart(barChartCtx, {
            type: "bar",
            data: {
                labels: labels, // Nama bulan digunakan sebagai label
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
                        display: false,
                        position: "top",
                    },
                    tooltip: {
                        callbacks: {
                            title: (tooltipItems) => {
                                // Gunakan bulan asli sebagai judul tooltip
                                const index = tooltipItems[0].dataIndex;
                                return `Bulan: ${labels[index]}`;
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
    } catch (error) {
        console.error("Gagal memuat data atau membuat chart:", error);
    }
};

// Panggil fungsi untuk memulai
initBarChart();
