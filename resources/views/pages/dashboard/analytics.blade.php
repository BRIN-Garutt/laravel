<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Analytics actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Analytics</h1>
            </div>
        </div>

        <!-- Monitoring Section -->
        <div id="title" class="text-center font-bold dark:text-gray-100">MONITORING SUHU DAN KELEMBAPAN</div>
        <br>

        <!-- Filters Section -->
        <div class="mb-4">
            <form method="GET" action="{{ route('filterAnalytics') }}" id="filterForm">
                <div class="flex items-center space-x-4">
                    <div>
                        <label for="tanggal"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-100">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal"
                            value="{{ old('tanggal', $filterData['tanggal'] ?? '') }}"
                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="hari"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-100">Hari</label>
                        <select id="hari" name="hari"
                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" {{ request('hari')=='' ? 'selected' : '' }}>Semua</option>
                            <option value="Senin" {{ request('hari')=='Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ request('hari')=='Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ request('hari')=='Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ request('hari')=='Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ request('hari')=='Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ request('hari')=='Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            <option value="Minggu" {{ request('hari')=='Minggu' ? 'selected' : '' }}>Minggu</option>
                        </select>
                    </div>
                    <div>
                        <label for="waktu_mulai"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-100">Waktu Mulai</label>
                        <input type="time" id="waktu_mulai" name="waktu_mulai"
                            value="{{ old('waktu_mulai', $filterData['waktu_mulai'] ?? '') }}"
                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="waktu_selesai"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-100">Waktu Selesai</label>
                        <input type="time" id="waktu_selesai" name="waktu_selesai"
                            value="{{ old('waktu_selesai', $filterData['waktu_selesai'] ?? '') }}"
                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="submit"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-100">Filter</label>
                        <button type="submit" id="resetFilter"
                            class="btn btn-grad border leading-none border-gray-300 text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:btn btn-grad3 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">Reset</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Table Section -->
        <div class="scrollable-table">
            <table id="c4ytable" align="center"
                class="min-w-full bg-white border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <thead class="bg-red-500">
                    <tr>
                        <th
                            class="py-2 px-4 border-b text-left text-xs font-medium text-white uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            NO</th>
                        <th
                            class="py-2 px-4 border-b text-left text-xs font-medium text-white uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            TANGGAL</th>
                        <th
                            class="py-2 px-4 border-b text-left text-xs font-medium text-white uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            HARI</th>
                        <th
                            class="py-2 px-4 border-b text-left text-xs font-medium text-white uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            WAKTU</th>
                        <th
                            class="py-2 px-4 border-b text-left text-xs font-medium text-white uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            SUHU</th>
                        <th
                            class="py-2 px-4 border-b text-left text-xs font-medium text-white uppercase tracking-wider dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            KELEMBAPAN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $index => $log)
                    <tr data-id="{{ $log->id }}">
                        <td
                            class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{ $index + 1 }}
                        </td>
                        <td
                            class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{ date('d-m-Y', strtotime($log->tanggal)) }}
                        </td>
                        <td
                            class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{ $log->hari }}
                        </td>
                        <td
                            class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{ $log->waktu }}
                        </td>
                        <td
                            class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{ $log->suhu }} °C
                        </td>
                        <td
                            class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{ $log->kelembapan }} %
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-white">
                    <tr>
                        <td colspan="4"
                            class="py-2 px-4 border-b text-right font-semibold dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            Rata-rata per Hari</td>
                        <td
                            class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{ $averageSuhu }} °C
                        </td>
                        <td
                            class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{ $averageKelembapan }} %
                        </td>
                    </tr>
                </tfoot>
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

            // Simpan halaman aktif ke localStorage
            function saveActivePage(pageNumber) {
                localStorage.setItem('activePage', pageNumber);
            }

            // Ambil halaman aktif dari localStorage
            function getActivePage() {
                return localStorage.getItem('activePage') || 1; // Default ke halaman 1 jika tidak ada
            }

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
                        var table = $('#c4ytable').DataTable();
                        var currentPage = table.page.info().page;
                        var totalPages = table.page.info().pages;

                        table.clear();

                        // Update chart data
                        suhuChart.data.labels = data.labels;
                        suhuChart.data.datasets[0].data = data.suhuData;
                        suhuChart.update();

                        kelembapanChart.data.labels = data.labels;
                        kelembapanChart.data.datasets[0].data = data.kelembapanData;
                        kelembapanChart.update();

                        // Update table data
                        var table = $('#c4ytable').DataTable();
                        table.clear();

                        var newData = [];
                        data.labels.forEach((label, index) => {
                            newData.push([
                                index + 1,
                                data.tanggal[index],
                                data.hari[index],
                                label,
                                data.suhuData[index] + ' °C',
                                data.kelembapanData[index] + ' %'
                            ])
                        });

                        // Add new data to the table
                        table.rows.add(newData).draw();

                        // Check where new data is located
                        var newDataPage = Math.floor(newData.length / 10); // assuming 10 rows per page
                        if (newDataPage >= totalPages) {
                            newDataPage = totalPages - 1;
                        }

                        // Go to the page containing the new data
                        table.page(newDataPage).draw('page');

                        // Update footer for average per day
                        var tfoot = table.table().footer();
                        $(tfoot).html(`
                            <tr class="bg-white">
                                <td colspan="4" class="py-2 px-4 border-b text-right font-semibold dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">Rata-rata per Hari</td>
                                <td class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">${data.averageSuhu} °C</td>
                                <td class="py-2 px-4 border-b dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">${data.averageKelembapan} %</td>
                            </tr>
                        `);
                    });
            }

            // Memanggil updateCharts() setiap 2 detik
            setInterval(updateCharts, 2000);

            $(document).ready(function() {
                var table = $('#c4ytable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    pageLength: 10,
                    initComplete: function() {
                        var activePage = getActivePage();
                        table.page(activePage - 1).draw('page'); // DataTables menggunakan indeks berbasis nol
                    }
                });

                // Event handler untuk perubahan halaman
                $('#c4ytable').on('page.dt', function() {
                    var pageInfo = table.page.info();
                    saveActivePage(pageInfo.page + 1); // Menyimpan halaman aktif
                });
            });
        </script>
    </div>
</x-app-layout>