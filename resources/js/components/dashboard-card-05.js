// Import Chart.js
import {
    Chart,
    LineController,
    LineElement,
    Filler,
    PointElement,
    LinearScale,
    TimeScale,
    Tooltip,
} from "chart.js";
import "chartjs-adapter-moment";
import { chartAreaGradient } from "../app";

// Import utilities
import { tailwindConfig, hexToRGB } from "../utils";

Chart.register(
    LineController,
    LineElement,
    Filler,
    PointElement,
    LinearScale,
    TimeScale,
    Tooltip
);

// A chart built with Chart.js3
// https://www.chartjs.org/
// Mendeteksi kelembapan dari web openweathermap.org pameungpeuk garut
const apiKey = "dff875fb10cfae1af293b659110fff2e"; // API key Anda
const apiUrl = `https://api.openweathermap.org/data/2.5/weather?id=1632972&units=metric&appid=${apiKey}`;

const dashboardCard05 = () => {
    const ctx = document.getElementById("dashboard-card-05");
    if (!ctx) return;

    const darkMode = localStorage.getItem("dark-mode") === "true";

    const textColor = {
        light: "#9CA3AF",
        dark: "#6B7280",
    };

    const gridColor = {
        light: "#F3F4F6",
        dark: `rgba(${hexToRGB("#374151")}, 0.6)`,
    };

    const tooltipTitleColor = {
        light: "#1F2937",
        dark: "#F3F4F6",
    };

    const tooltipBodyColor = {
        light: "#6B7280",
        dark: "#9CA3AF",
    };

    const tooltipBgColor = {
        light: "#ffffff",
        dark: "#374151",
    };

    const tooltipBorderColor = {
        light: "#E5E7EB",
        dark: "#4B5563",
    };

    const chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [],
            datasets: [
                {
                    label: "Kelembapan (%)",
                    data: [],
                    fill: true,
                    backgroundColor: function (context) {
                        const chart = context.chart;
                        const { ctx, chartArea } = chart;
                        return chartAreaGradient(ctx, chartArea, [
                            {
                                stop: 0,
                                color: `rgba(${hexToRGB(
                                    tailwindConfig().theme.colors.blue[500]
                                )}, 0)`,
                            },
                            {
                                stop: 1,
                                color: `rgba(${hexToRGB(
                                    tailwindConfig().theme.colors.blue[500]
                                )}, 0.2)`,
                            },
                        ]);
                    },
                    borderColor: tailwindConfig().theme.colors.blue[500],
                    borderWidth: 2,
                    pointRadius: 0,
                    pointHoverRadius: 3,
                    pointBackgroundColor:
                        tailwindConfig().theme.colors.blue[500],
                    pointHoverBackgroundColor:
                        tailwindConfig().theme.colors.blue[500],
                    pointBorderWidth: 0,
                    pointHoverBorderWidth: 0,
                    clip: 20,
                    tension: 0.2,
                },
            ],
        },
        options: {
            layout: {
                padding: 20,
            },
            scales: {
                x: {
                    title: {
                        display: true, // Pastikan display true untuk menampilkan label
                        text: "Waktu",
                    },
                    type: "time",
                    time: {
                        parser: "hh:mm:ss",
                        unit: "second",
                        tooltipFormat: "MMM DD, H:mm:ss a",
                        displayFormats: {
                            second: "H:mm:ss",
                        },
                    },
                    border: {
                        display: true, // border bawah
                    },
                    grid: {
                        display: false,
                    },
                    ticks: {
                        autoSkipPadding: 48,
                        maxRotation: 0,
                        color: darkMode ? textColor.dark : textColor.light,
                    },
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true, // Pastikan display true untuk menampilkan label
                        text: "Kelembapan (%)",
                    },
                    border: {
                        display: true, // border kiri
                    },
                    suggestedMin: 0,
                    suggestedMax: 100, // Maksimum nilai y
                    ticks: {
                        maxTicksLimit: 5,
                        callback: (value) => `${value}%`,
                        color: darkMode ? textColor.dark : textColor.light,
                    },
                    grid: {
                        color: darkMode ? gridColor.dark : gridColor.light,
                    },
                },
            },
            plugins: {
                legend: {
                    display: true, // Pastikan display true untuk menampilkan legend
                },
                tooltip: {
                    titleFont: {
                        weight: 600,
                    },
                    callbacks: {
                        label: (context) => `${context.parsed.y}%`,
                    },
                    titleColor: darkMode
                        ? tooltipTitleColor.dark
                        : tooltipTitleColor.light,
                    bodyColor: darkMode
                        ? tooltipBodyColor.dark
                        : tooltipBodyColor.light,
                    backgroundColor: darkMode
                        ? tooltipBgColor.dark
                        : tooltipBgColor.light,
                    borderColor: darkMode
                        ? tooltipBorderColor.dark
                        : tooltipBorderColor.light,
                },
            },
            interaction: {
                intersect: false,
                mode: "nearest",
            },
            animation: false,
            maintainAspectRatio: false,
        },
    });

    const chartValue = document.getElementById("dashboard-card-05-value");
    const chartDeviation = document.getElementById(
        "dashboard-card-05-deviation"
    );

    const addData = (value, prev) => {
        const { datasets } = chart.data;
        chart.data.labels.push(new Date());
        datasets[0].data.push(value);
        if (datasets[0].data.length > 5) {
            // Jika data lebih dari 5, hapus data pertama
            chart.data.labels.shift();
            datasets[0].data.shift();
        }
        chart.update(0);
        if (!chartValue) return;
        const diff = prev ? ((value - prev) / prev) * 100 : 0;
        chartValue.innerHTML = `${value}%`;
        if (!chartDeviation) return;
        if (diff < 0) {
            chartDeviation.style.backgroundColor = `rgba(${hexToRGB(
                tailwindConfig().theme.colors.red[500]
            )}, 0.2)`;
            chartDeviation.style.color = tailwindConfig().theme.colors.red[700];
        } else {
            chartDeviation.style.backgroundColor = `rgba(${hexToRGB(
                tailwindConfig().theme.colors.green[500]
            )}, 0.2)`;
            chartDeviation.style.color =
                tailwindConfig().theme.colors.green[700];
        }
    };

    const fetchHumidity = async () => {
        try {
            const response = await fetch(apiUrl);
            const data = await response.json();
            const humidity = data.main.humidity;
            const prevHumidity = chart.data.datasets[0].data.slice(-1)[0];
            addData(humidity, prevHumidity);
        } catch (error) {
            console.error("Error fetching humidity data:", error);
        }
    };

    fetchHumidity();
    setInterval(fetchHumidity, 1000);

    document.addEventListener("darkMode", (e) => {
        const { mode } = e.detail;
        if (mode === "on") {
            chart.options.scales.x.ticks.color = textColor.dark;
            chart.options.scales.y.ticks.color = textColor.dark;
            chart.options.scales.y.grid.color = gridColor.dark;
            chart.options.plugins.tooltip.titleColor = tooltipTitleColor.dark;
            chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.dark;
            chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.dark;
            chart.options.plugins.tooltip.borderColor = tooltipBorderColor.dark;
        } else {
            chart.options.scales.x.ticks.color = textColor.light;
            chart.options.scales.y.ticks.color = textColor.light;
            chart.options.scales.y.grid.color = gridColor.light;
            chart.options.plugins.tooltip.titleColor = tooltipTitleColor.light;
            chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.light;
            chart.options.plugins.tooltip.backgroundColor =
                tooltipBgColor.light;
            chart.options.plugins.tooltip.borderColor =
                tooltipBorderColor.light;
        }
        chart.update("none");
    });
};

document.addEventListener("DOMContentLoaded", dashboardCard05);

export default dashboardCard05;
