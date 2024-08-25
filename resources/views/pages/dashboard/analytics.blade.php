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
            <form method="GET" action="{{ route('filterAnalytics') }}" id="filterForm">
                <div class="flex items-center space-x-4">
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $filterData['tanggal'] ?? '') }}" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="hari" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Hari</label>
                        <select id="hari" name="hari" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" {{ request('hari') == '' ? 'selected' : '' }}>Semua</option>
                            <option value="Senin" {{ request('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ request('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ request('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ request('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ request('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ request('hari') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            <option value="Minggu" {{ request('hari') == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                        </select>
                    </div>
                    <div>
                        <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Waktu Mulai</label>
                        <input type="time" id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai', $filterData['waktu_mulai'] ?? '') }}" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="waktu_selesai" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Waktu Selesai</label>
                        <input type="time" id="waktu_selesai" name="waktu_selesai" value="{{ old('waktu_selesai', $filterData['waktu_selesai'] ?? '') }}" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="submit" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Filter</label>
                        <button type="sumbit" id="resetFilter" class="btn bg-red-500 border leading-none border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">Reset</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="scrollable-table">
            <table id="c4ytable" align="center" class="min-w-full bg-white border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">NO</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">TANGGAL</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">HARI</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">WAKTU</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">SUHU</th>
                        <th class="py-2 px-4 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">KELEMBAPAN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $index => $log)
                    <tr>
                        <td class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $log->tanggal }}</td>
                        <td class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $log->hari }}</td>
                        <td class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $log->waktu }}</td>
                        <td class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $log->suhu }} °C</td>
                        <td class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $log->kelembapan }} %</td>
                    </tr>
                    @endforeach
                    <!-- Display average per day if needed -->
                <tfoot class="bg-gray-100">
                    <tr>
                        <td colspan="4" class="py-2 px-4 border-b text-right font-semibold dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">Rata-rata per Hari</td>
                        <td class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $averageSuhu }} °C</td>
                        <td class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $averageKelembapan }} %</td>
                    </tr>
                </tfoot>
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
            document.getElementById('resetFilter').addEventListener('click', function() {
                // Mengembalikan nilai dropdown ke nilai default
                document.getElementById('tanggal').value = '';
                document.getElementById('hari').selectedIndex = 0;
                document.getElementById('waktu_mulai').value = '';
                document.getElementById('waktu_selesai').value = '';

                // Submit form untuk menghapus filter
                document.getElementById('filterForm').submit();
            });


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

                            no.className = 'py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
                            tanggal.className = 'py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
                            hari.className = 'py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
                            waktu.className = 'py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
                            suhu.className = 'py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
                            kelembapan.className = 'py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';

                            no.innerHTML = index + 1;
                            tanggal.innerHTML = data.tanggal[index];
                            hari.innerHTML = data.hari[index];
                            waktu.innerHTML = label;
                            suhu.innerHTML = data.suhuData[index] + ' °C';
                            kelembapan.innerHTML = data.kelembapanData[index] + ' %';
                        });
                    });
            }

            // Memanggil updateCharts() setiap 5 detik
            setInterval(updateCharts, 5000);
        </script>
        <!-- Terhubung ke jquery pada header.blade.php di views/components/app -->
        <script>
            $(document).ready(function() {
                $('#c4ytable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
        </script>
    </div>
</x-app-layout>
