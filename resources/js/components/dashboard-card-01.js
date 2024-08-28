// Import Chart.js
import {
    Chart,
    BarController,
    BarElement,
    CategoryScale,
    LinearScale,
    Tooltip,
} from "chart.js";
import { tailwindConfig, hexToRGB } from "../utils";

Chart.register(
    BarController,
    BarElement,
    CategoryScale,
    LinearScale,
    Tooltip
);

// A chart built with Chart.js 3
// https://www.chartjs.org/
const dashboardCard01 = () => {
    const ctx = document.getElementById("dashboard-card-01");
    if (!ctx) return;

    const userCount = parseInt(ctx.getAttribute('data-user-count')); // Mengambil data user count dari atribut data

    const chart = new Chart(ctx, {
        type: "bar", // Menggunakan chart tipe bar
        data: {
            labels: ["Users"], // Label sumbu X
            datasets: [
                {
                    label: 'Total Users',
                    data: [userCount], // Menampilkan data jumlah user
                    backgroundColor: `rgba(${hexToRGB(
                        tailwindConfig().theme.colors.violet[500]
                    )}, 0.7)`,
                    borderColor: tailwindConfig().theme.colors.violet[500],
                    borderWidth: 2,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: tailwindConfig().theme.colors.gray[500],
                    },
                },
                x: {
                    ticks: {
                        color: tailwindConfig().theme.colors.gray[500],
                    },
                },
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: (context) => context.raw,
                    },
                    backgroundColor: tailwindConfig().theme.colors.gray[800],
                    titleColor: tailwindConfig().theme.colors.gray[100],
                    bodyColor: tailwindConfig().theme.colors.gray[100],
                },
                legend: {
                    display: false,
                },
            },
            maintainAspectRatio: false,
        },
    });

    document.addEventListener("darkMode", (e) => {
        const { mode } = e.detail;
        const tooltipColors = mode === "on"
            ? tailwindConfig().theme.colors.gray[800]
            : tailwindConfig().theme.colors.gray[100];

        chart.options.plugins.tooltip.backgroundColor = tooltipColors;
        chart.update("none");
    });
};

export default dashboardCard01;
