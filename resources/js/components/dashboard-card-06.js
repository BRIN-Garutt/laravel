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

Chart.register(BarController, BarElement, CategoryScale, LinearScale, Tooltip);

const dashboardCard06 = () => {
    const ctx = document.getElementById("dashboard-card-06");
    if (!ctx) return;

    const activeUserCount = parseInt(
        ctx.getAttribute("data-active-user-count"),
        10
    );
    if (isNaN(activeUserCount)) {
        console.error("Data active user count is not a valid number.");
        return;
    }

    const chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Active Users"],
            datasets: [
                {
                    label: "Active Users",
                    data: [activeUserCount],
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
                        label: (context) => `${context.raw} users`,
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
        const tooltipColors =
            mode === "on"
                ? tailwindConfig().theme.colors.gray[800]
                : tailwindConfig().theme.colors.gray[100];

        chart.options.plugins.tooltip.backgroundColor = tooltipColors;
        chart.update("none");
    });
};

// Memastikan fungsi dashboardCard06 dipanggil setelah DOM dimuat sepenuhnya
document.addEventListener("DOMContentLoaded", () => {
    dashboardCard06();
});

export default dashboardCard06;
