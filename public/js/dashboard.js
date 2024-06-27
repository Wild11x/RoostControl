$(function () {


    // -----------------------------------------------------------------------
    // Subscriptions
    // -----------------------------------------------------------------------
    var chart = {
        series: [
            {
                name: "2024",
                data: [1.2, 2.7, 1, 3.6, 2.1, 2.7, 2.2, 1.3, 2.5],
            },
            {
                name: "2023",
                data: [-2.8, -1.1, -2.5, -1.5, -2.3, -1.9, -1, -2.1, -1.3],
            },
        ],
        chart: {
            toolbar: {
                show: false,
            },
            type: "bar",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
            height: 270,
            stacked: true,
            offsetX: -15,
        },
        colors: ["var(--bs-primary)", "var(--bs-danger)"],
        plotOptions: {
            bar: {
                horizontal: false,
                barHeight: "60%",
                columnWidth: "15%",
                borderRadius: [6],
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "all",
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        grid: {
            show: true,
            padding: {
                top: 0,
                bottom: 0,
                right: 0,
            },
            borderColor: "rgba(0,0,0,0.05)",
            xaxis: {
                lines: {
                    show: true,
                },
            },
            yaxis: {
                lines: {
                    show: true,
                },
            },
        },
        yaxis: {
            min: -5,
            max: 5,
        },
        xaxis: {
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "July",
                "Aug",
                "Sep",
            ],
            labels: {
                style: { fontSize: "13px", colors: "#adb0bb", fontWeight: "400" },
            },
        },
        yaxis: {
            tickAmount: 4,
        },
        tooltip: {
            theme: "dark",
        },
    };

    var chart = new ApexCharts(
        document.querySelector("#revenue-forecast"),
        chart
    );
    chart.render();
    var customers = {
        chart: {
            id: "sparkline3",
            type: "line",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
            height: 60,
            sparkline: {
                enabled: true,
            },
            group: "sparklines",
        },
        series: [
            {
                name: "Income",
                color: "var(--bs-danger)",
                data: [30, 25, 35, 20, 30, 40],
            },
        ],
        stroke: {
            curve: "smooth",
            width: 2,
        },
        markers: {
            size: 0,
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: true,
                position: "right",
            },
            x: {
                show: false,
            },
        },
    };
    new ApexCharts(document.querySelector("#total-income"), customers).render();

})

// assume you have a function to retrieve data from the devices
function getDataFromDevices() {
    // replace with your actual implementation
    const temperature = 35; // retrieve temperature data from device
    const humidity = 75; // retrieve humidity data from device
    const lightIntensity = 100; // retrieve light intensity data from device
    const heaterStatus = true; // retrieve heater status from device
    const lampStatus = false; // retrieve lamp status from device

    // update the UI with the retrieved data
    document.getElementById("temperature-value").innerHTML = temperature + " °C";
    document.getElementById("humidity-value").innerHTML = humidity + " %";
    document.getElementById("light-intensity-value").innerHTML = lightIntensity + " lux";
    document.getElementById("heater-button").innerHTML = heaterStatus ? "ON" : "OFF";
    document.getElementById("lamp-button").innerHTML = lampStatus ? "ON" : "OFF";

    // update the progress bars
    const temperatureFill = document.getElementById("temperature-fill");
    temperatureFill.style.width = (temperature / 100) * 100 + "%";

    const humidityFill = document.getElementById("humidity-fill");
    humidityFill.style.width = (humidity / 100) * 100 + "%";

    const lightIntensityFill = document.getElementById("light-intensity-fill");
    lightIntensityFill.style.width = (lightIntensity / 100) * 100 + "%";

    // create a line chart
    const ctx = document.getElementById("chart").getContext("2d");
    const chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: ["Time 1", "Time 2", "Time 3", "Time 4", "Time 5"],
            datasets: [{
                label: "Temperature (°C)",
                data: [35, 36, 37, 38, 39], // retrieve temperature data from device
                backgroundColor: "rgba(255, 99, 132, 0.2)",
                borderColor: "rgba(255, 99, 132, 1)",
                borderWidth: 1
            }, {
                label: "Humidity (%)",
                data: [75, 76, 77, 78, 79], // retrieve humidity data from device
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 1
            }, {
                label: "Light Intensity (lux)",
                data: [100, 110, 120, 130, 140], // retrieve light intensity data from device
                backgroundColor: "rgba(255, 206, 86, 0.2)",
                borderColor: "rgba(255, 206, 86, 1)",
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
};

// call the function to retrieve data from devices
getDataFromDevices();

// update the data periodically (e.g., every 1 second)
setInterval(getDataFromDevices, 1000);


