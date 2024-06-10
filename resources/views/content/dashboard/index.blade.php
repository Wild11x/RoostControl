@extends('layout.admin')

@section('title', 'Dashboard | Roost Control')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <!-- Temperature Card -->
        <div class="col-lg-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-6 mb-4 pb-3">
                        <span class="round-48 d-flex align-items-center justify-content-center rounded bg-danger-subtle">
                            <iconify-icon icon="solar:temperature-outline" class="fs-6 text-danger"></iconify-icon>
                        </span>
                        <h6 class="mb-0 fs-4">Temperature</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-end mb-6">
                        <h6 class="mb-0 fw-medium"><span id="temp-value">{{ $dataSensor->first()->temperature ?? 0 }}</span> °C</h6>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 7px;">
                        <div class="progress-bar bg-danger" style="width: {{ $dataSensor->first()->temperature ?? 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Humidity Card -->
        <div class="col-lg-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-6 mb-4 pb-3">
                        <span class="round-48 d-flex align-items-center justify-content-center rounded bg-secondary-subtle">
                            <iconify-icon icon="solar:snowflake-outline" class="fs-6 text-secondary"></iconify-icon>
                        </span>
                        <h6 class="mb-0 fs-4">Humidity</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-end mb-6">
                        <h6 class="mb-0 fw-medium"><span id="humi-value">{{ $dataSensor->first()->humidity ?? 0 }}</span> %</h6>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 7px;">
                        <div class="progress-bar bg-secondary" style="width: {{ $dataSensor->first()->humidity ?? 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Light Intensity Card -->
        <div class="col-lg-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-6 mb-4 pb-3">
                        <span class="round-48 d-flex align-items-center justify-content-center rounded bg-warning-subtle">
                            <iconify-icon icon="solar:lightbulb-outline" class="fs-6 text-warning"></iconify-icon>
                        </span>
                        <h6 class="mb-0 fs-4">Light Intensity</h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-end mb-6">
                        <h6 class="mb-0 fw-medium"><span id="light-value">{{ $dataSensor->first()->light_intensity ?? 0 }}</span> %</h6>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 7px;">
                        <div class="progress-bar bg-warning" style="width: {{ $dataSensor->first()->light_intensity ?? 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>        <div class="col-lg-3">
            <div class="d-flex flex-column">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-6">
                            <span class="round-48 d-flex align-items-center justify-content-center rounded bg-primary-subtle">
                                <span class="fs-6 text-primary">ON</span>
                            </span>
                            <h6 class="mb-0 fs-4">Heater Status</h6>
                        </div>
                    </div>
                </div>
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-6">
                            <span class="round-48 d-flex align-items-center justify-content-center rounded bg-danger-subtle">
                                <span class="fs-6 text-danger">OFF</span>
                            </span>
                            <h6 class="mb-0 fs-4">Lamp Status</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Sensor Statistik</h5>
                        </div>
                        <div>
                            <select class="form-select">
                                <option value="1">March 2024</option>
                                <option value="2">April 2024</option>
                                <option value="3">May 2024</option>
                                <option value="4">June 2024</option>
                            </select>
                        </div>
                    </div>
                    <div id="revenue-forecast"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a></p>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script>
    $(function() {
        // Mendefinisikan data sensor
        var dataSensor = <?php echo json_encode($dataSensor); ?>;

        // Menginisialisasi variabel untuk data temperatur, kelembaban, dan intensitas cahaya
        var temperatureData = [];
        var humidityData = [];
        var lightIntensityData = [];

        // Mendapatkan data temperatur, kelembaban, dan intensitas cahaya dari dataSensor
        dataSensor.forEach(function(sensor) {
            temperatureData.push(sensor.temperature);
            humidityData.push(sensor.humidity);
            lightIntensityData.push(sensor.light_intensity);
        });

        // Mendefinisikan konfigurasi grafik untuk data temperatur
        var temperatureChartOptions = {
            chart: {
                type: 'line',
                height: 350,
                fontFamily: "inherit",
                foreColor: "#adb0bb",
            },
            series: [{
                name: 'Temperature',
                data: temperatureData,
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep'],
            },
            yaxis: {
                title: {
                    text: 'Temperature (°C)',
                },
            },
            tooltip: {
                theme: 'dark',
            },
        };

        // Menginisialisasi grafik untuk data temperatur
        var temperatureChart = new ApexCharts(document.querySelector("#temperature-chart"), temperatureChartOptions);
        temperatureChart.render();

        // Mendefinisikan konfigurasi grafik untuk data kelembaban
        var humidityChartOptions = {
            chart: {
                type: 'line',
                height: 350,
                fontFamily: "inherit",
                foreColor: "#adb0bb",
            },
            series: [{
                name: 'Humidity',
                data: humidityData,
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep'],
            },
            yaxis: {
                title: {
                    text: 'Humidity (%)',
                },
            },
            tooltip: {
                theme: 'dark',
            },
        };

        // Menginisialisasi grafik untuk data kelembaban
        var humidityChart = new ApexCharts(document.querySelector("#humidity-chart"), humidityChartOptions);
        humidityChart.render();

        // Mendefinisikan konfigurasi grafik untuk intensitas cahaya
        var lightIntensityChartOptions = {
            chart: {
                type: 'line',
                height: 350,
                fontFamily: "inherit",
                foreColor: "#adb0bb",
            },
            series: [{
                name: 'Light Intensity',
                data: lightIntensityData,
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep'],
            },
            yaxis: {
                title: {
                    text: 'Light Intensity (%)',
                },
            },
            tooltip: {
                theme: 'dark',
            },
        };

        // Menginisialisasi grafik untuk intensitas cahaya
        var lightIntensityChart = new ApexCharts(document.querySelector("#light-intensity-chart"), lightIntensityChartOptions);
        lightIntensityChart.render();
    });
</script>

@endpush

