<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Analytics actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Analytics</h1>
            </div>
            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <x-dropdown-filter align="right" />
                <x-datepicker />
                <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="max-xs:sr-only">Add View</span>
                </button>
            </div>
        </div>

        <!-- Monitoring Section -->
        <div id="title">MONITORING SUHU DAN KELEMBAPAN</div>
        <div id="subtitle">Badan Riset dan Inovasi Garut</div>

        <div class="scrollable-table">
            <table id="c4ytable" align="center">
                <thead>
                    <tr>
                        <th width="36"><strong>NO</strong></th>
                        <th width="90"><strong>TANGGAL</strong></th>
                        <th width="90"><strong>HARI</strong></th>
                        <th width="75"><strong>WAKTU</strong></th>
                        <th width="130"><strong>SUHU</strong></th>
                        <th width="200"><strong>KELEMBAPAN</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $index => $log)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $log->tanggal }}</td>
                        <td>{{ $log->hari }}</td>
                        <td>{{ $log->waktu }}</td>
                        <td>{{ $log->suhu }}</td>
                        <td>{{ $log->kelembapan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Charts -->
        <div id="charts" class="flex justify-between">
            <div class="chartContainer w-1/2 p-2">
                <canvas id="suhuChart"></canvas>
            </div>
            <div class="chartContainer w-1/2 p-2">
                <canvas id="kelembapanChart"></canvas>
            </div>
        </div>

        <!-- Include Chart.js and custom script -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Parsing data for charts
            var tanggal = <?php echo json_encode($tanggal); ?>;
            var hari = <?php echo json_encode($hari); ?>;
            var labels = <?php echo json_encode($labels); ?>;
            var suhuData = <?php echo json_encode($suhuData); ?>;
            var kelembapanData = <?php echo json_encode($kelembapanData); ?>;

            // Chart Initialization
            var ctxSuhu = document.getElementById('suhuChart').getContext('2d');
            var suhuChart = new Chart(ctxSuhu, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Suhu',
                        data: suhuData,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctxKelembapan = document.getElementById('kelembapanChart').getContext('2d');
            var kelembapanChart = new Chart(ctxKelembapan, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Kelembapan',
                        data: kelembapanData,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        fill: true,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            function updateCharts() {
                fetch('/realtime-data')
                    .then(response => response.json())
                    .then(data => {
                        // Update chart data
                        suhuChart.data.labels = data.labels;
                        suhuChart.data.datasets[0].data = data.suhuData;
                        suhuChart.update();

                        kelembapanChart.data.labels = data.labels;
                        kelembapanChart.data.datasets[0].data = data.kelembapanData;
                        kelembapanChart.update();

                        // Update tabel data
                        var table = document.getElementById('c4ytable');
                        var tbody = table.getElementsByTagName('tbody')[0];
                        tbody.innerHTML = '';
                        data.labels.forEach((label, index) => {
                            var row = tbody.insertRow();
                            var no = row.insertCell(0);
                            var tanggal = row.insertCell(1);
                            var hari = row.insertCell(2);
                            var waktu = row.insertCell(3);
                            var suhu = row.insertCell(4);
                            var kelembapan = row.insertCell(5);

                            no.innerHTML = index + 1;
                            tanggal.innerHTML = data.tanggal[index];
                            hari.innerHTML = data.hari[index];
                            waktu.innerHTML = label;
                            suhu.innerHTML = data.suhuData[index];
                            kelembapan.innerHTML = data.kelembapanData[index];
                        });
                    });
            }

            // Polling setiap 5 detik
            setInterval(updateCharts, 5000);
        </script>

    </div>
</x-app-layout>