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

        const days = weeklyData.map(item => item.day);
        const hadir = weeklyData.map(item => item.hadir);
        const izin = weeklyData.map(item => item.izin);
        const terlambat = weeklyData.map(item => item.terlambat);
        const tanpaketerangan = weeklyData.map(item => item.tanpaketerangan);

        barChartInstance = new Chart(barChartCtx, {
            type: "bar",
            data: {
                labels: days,
                datasets: [
                    { label: "Hadir", data: hadir, backgroundColor: "rgba(0, 183, 255, 0.8)" },
                    { label: "Izin", data: izin, backgroundColor: "rgba(139, 69, 19, 0.8)" },
                    { label: "Terlambat", data: terlambat, backgroundColor: "rgba(255, 255, 0, 0.8)" },
                    { label: "Tanpa Keterangan", data: tanpaketerangan, backgroundColor: "rgba(255, 0, 0, 0.8)" },
                ],
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    x: { barPercentage: 0.5, categoryPercentage: 0.8 },
                    y: { beginAtZero: true },
                },
            },
        });

        // Update Doughnut Chart
        const doughnutChartCtx = document.getElementById("doughnutChart").getContext("2d");

        // Hancurkan instance grafik jika sudah ada
        if (doughnutChartInstance) {
            doughnutChartInstance.destroy();
        }

        const totalKehadiran = monthlyData.reduce((sum, item) => sum + item.hadir, 0);
        const totalIzin = monthlyData.reduce((sum, item) => sum + item.izin, 0);
        const totalKeterlambatan = monthlyData.reduce((sum, item) => sum + item.terlambat, 0);
        const totalAbsen = monthlyData.reduce((sum, item) => sum + item.tanpaketerangan, 0);

        doughnutChartInstance = new Chart(doughnutChartCtx, {
            type: "doughnut",
            data: {
                labels: ["Hadir", "Izin", "Terlambat", "Tanpa Keterangan"],
                datasets: [{
                    data: [totalKehadiran, totalIzin, totalKeterlambatan, totalAbsen],
                    backgroundColor: [
                        "rgba(0, 183, 255, 0.8)",
                        "rgba(139, 69, 19, 0.8)",
                        "rgba(255, 255, 0, 0.8)",
                        "rgba(255, 0, 0, 0.8)",
                    ],
                }],
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
            },
        });
    } catch (error) {
        console.error("Gagal memperbarui grafik:", error);
    }
}
