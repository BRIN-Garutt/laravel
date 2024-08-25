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

        <!-- Filters Section -->
        <div class="mb-4">
            <form method="GET" action="{{ route('filterAnalytics') }}">
                <div class="flex items-center space-x-4">
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $filterData['tanggal'] ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
                        <select id="hari" name="hari" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">Semua</option>
                            <option value="Senin" {{ (old('hari', $filterData['hari'] ?? '') == 'Senin') ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ (old('hari', $filterData['hari'] ?? '') == 'Selasa') ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ (old('hari', $filterData['hari'] ?? '') == 'Rabu') ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ (old('hari', $filterData['hari'] ?? '') == 'Kamis') ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ (old('hari', $filterData['hari'] ?? '') == 'Jumat') ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ (old('hari', $filterData['hari'] ?? '') == 'Sabtu') ? 'selected' : '' }}>Sabtu</option>
                            <option value="Minggu" {{ (old('hari', $filterData['hari'] ?? '') == 'Minggu') ? 'selected' : '' }}>Minggu</option>
                        </select>
                    </div>
                    <div>
                        <label for="waktu_mulai" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                        <input type="time" id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai', $filterData['waktu_mulai'] ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label for="waktu_selesai" class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                        <input type="time" id="waktu_selesai" name="waktu_selesai" value="{{ old('waktu_selesai', $filterData['waktu_selesai'] ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label for="submit" class="block text-sm font-medium text-gray-700">Filter</label>
                        <button type="submit" class="btn bg-blue-500 text-white">Terapkan</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="scrollable-table">
            <table id="c4ytable" align="center" class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NO</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TANGGAL</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">HARI</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">WAKTU</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SUHU</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">KELEMBAPAN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $index => $log)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border-b">{{ $log->tanggal }}</td>
                        <td class="py-2 px-4 border-b">{{ $log->hari }}</td>
                        <td class="py-2 px-4 border-b">{{ $log->waktu }}</td>
                        <td class="py-2 px-4 border-b">{{ $log->suhu }} °C</td>
                        <td class="py-2 px-4 border-b">{{ $log->kelembapan }} %</td>
                    </tr>
                    @endforeach
                    <!-- Display average per day if needed -->
                    <tr class="bg-gray-100">
                        <td colspan="4" class="py-2 px-4 border-b text-right font-semibold">Rata-rata per Hari</td>
                        <td class="py-2 px-4 border-b">{{ $averageSuhu }} °C</td>
                        <td class="py-2 px-4 border-b">{{ $averageKelembapan }} %</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Charts Section -->
        <div id="charts" class="flex justify-between mt-6">
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
                // Ambil nilai filter
                var tanggal = document.getElementById('tanggal').value;
                var hari = document.getElementById('hari').value;
                var waktuMulai = document.getElementById('waktu_mulai').value;
                var waktuSelesai = document.getElementById('waktu_selesai').value;

                // Buat URL dengan query string filter
                var url = `/realtime-data?tanggal=${encodeURIComponent(tanggal)}&hari=${encodeURIComponent(hari)}&waktu_mulai=${encodeURIComponent(waktuMulai)}&waktu_selesai=${encodeURIComponent(waktuSelesai)}`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // Update chart data
                        suhuChart.data.labels = data.labels;
                        suhuChart.data.datasets[0].data = data.suhuData;
                        suhuChart.update();

                        kelembapanChart.data.labels = data.labels;
                        kelembapanChart.data.datasets[0].data = data.kelembapanData;
                        kelembapanChart.update();

                        // Update table data
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
                            suhu.innerHTML = data.suhuData[index] + ' °C';
                            kelembapan.innerHTML = data.kelembapanData[index] + ' %';
                        });

                        // Display average per day
                        var avgRow = tbody.insertRow();
                        avgRow.classList.add('bg-gray-100');
                        avgRow.insertCell(0).setAttribute('colspan', '4');
                        avgRow.cells[0].innerText = 'Rata-rata per Hari';
                        avgRow.cells[0].classList.add('text-right', 'font-semibold', 'py-2', 'px-4', 'border-b');
                        avgRow.insertCell(1).innerText = data.averageSuhu + ' °C';
                        avgRow.cells[1].classList.add('py-2', 'px-4', 'border-b');
                        avgRow.insertCell(2).innerText = data.averageKelembapan + ' %';
                        avgRow.cells[2].classList.add('py-2', 'px-4', 'border-b');
                    });
            }

            // Memanggil updateCharts() setiap 5 detik
            setInterval(updateCharts, 5000);
        </script>


    </div>
</x-app-layout>