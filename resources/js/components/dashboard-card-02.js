// Import Chart.js
import {
    Chart,
    BarController,
    BarElement,
    CategoryScale,
    LinearScale,
    Tooltip,
} from "chart.js";
import { hexToRGB } from "../utils";

// Register the necessary components
Chart.register(BarController, BarElement, CategoryScale, LinearScale, Tooltip);

// Define the chart function
const dashboardCard02 = () => {
    const ctx = document.getElementById("dashboard-card-02");
    const avgTempElement = document.getElementById("average-temperature");

    if (!ctx || !avgTempElement) return;

    const darkMode = localStorage.getItem("dark-mode") === "true";

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

    const apiKey = "dff875fb10cfae1af293b659110fff2e";
    const apiUrl = `https://api.openweathermap.org/data/2.5/forecast?id=1632972&units=metric&appid=${apiKey}`;

    fetch(apiUrl)
        .then((response) => response.json())
        .then((data) => {
            // Filter data for today's date
            const today = new Date().toISOString().split("T")[0];
            const todayData = data.list.filter((item) =>
                item.dt_txt.startsWith(today)
            );

            // Calculate average temperature for today and round to nearest integer
            const averageTemperature = Math.round(
                todayData.reduce((sum, item) => sum + item.main.temp, 0) /
                    todayData.length
            );

            // Update the DOM element with the calculated average temperature
            avgTempElement.textContent = `${averageTemperature}°C`;

            const chart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Rata-rata Suhu Hari Ini (°C)"],
                    datasets: [
                        {
                            label: "Suhu",
                            data: [averageTemperature],
                            backgroundColor: `rgba(${hexToRGB(
                                "#4F46E5"
                            )}, 0.8)`,
                            borderColor: `rgba(${hexToRGB("#4F46E5")}, 1)`,
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                title: () => "Rata-rata Suhu Hari Ini",
                                label: (context) => `${context.parsed.y} °C`,
                                labelTextColor: () => "#FFFFFF", // Mengatur warna label menjadi putih
                            },
                            bodyColor: darkMode
                                ? tooltipBodyColor.dark
                                : tooltipBodyColor.light,
                            backgroundColor: "rgba(255, 255, 255, 0)", // Background transparan
                            borderColor: darkMode
                                ? tooltipBorderColor.dark
                                : tooltipBorderColor.light,
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
                if (mode === "on") {
                    chart.options.plugins.tooltip.bodyColor =
                        tooltipBodyColor.dark;
                    chart.options.plugins.tooltip.backgroundColor =
                        tooltipBgColor.dark;
                    chart.options.plugins.tooltip.borderColor =
                        tooltipBorderColor.dark;
                } else {
                    chart.options.plugins.tooltip.bodyColor =
                        tooltipBodyColor.light;
                    chart.options.plugins.tooltip.backgroundColor =
                        tooltipBgColor.light;
                    chart.options.plugins.tooltip.borderColor =
                        tooltipBorderColor.light;
                }
                chart.update("none");
            });
        });
};

export default dashboardCard02;
