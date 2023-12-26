<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your existing head content here -->

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Add a script section to define your first donut chart
        document.addEventListener('DOMContentLoaded', function () {
            var userCtx = document.getElementById('userChart').getContext('2d');
            var userCount = @json($userCount);

            console.log(userCount); // Check the value in the console

            var userChart = new Chart(userCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Total Users'],
                    datasets: [{
                        label: 'User Count',
                        data: [userCount],
                        backgroundColor: ['rgba(255, 99, 132, 0.5)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    cutoutPercentage: 50,
                }
            });
        });

        // Add a script section to define your second donut chart
        document.addEventListener('DOMContentLoaded', function () {
            var orderCtx = document.getElementById('orderChart').getContext('2d');
            var orderCount = @json($orderCount);

            console.log(orderCount); // Check the value in the console

            var orderChart = new Chart(orderCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Total Orders'],
                    datasets: [{
                        label: 'Order Count',
                        data: [orderCount],
                        backgroundColor: ['rgba(75, 192, 192, 0.5)'], // Adjust color as needed
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    cutoutPercentage: 50,
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            var vendorCtx = document.getElementById('vendorChart').getContext('2d');
            var vendorCount = @json($vendorCount);

            console.log(vendorCount); // Check the value in the console

            var vendorChart = new Chart(vendorCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Total Vendor'],
                    datasets: [{
                        label: 'Order Count',
                        data: [vendorCount],
                        backgroundColor: ['rgba(75, 150, 192, 0.5)'], // Adjust color as needed
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    cutoutPercentage: 50,
                }
            });
        });
    </script>

</head>
<body>
    <section>
        @include('components.navbaradmin')
    </section>
    <div>
        <h1>Halaman admin</h1>
        <p>Selamat datang {{ auth()->user()->name }}</p>

        <!-- Add a canvas element for the first chart -->
        <canvas id="userChart" width="200" height="200"></canvas>

        <!-- Add a canvas element for the second chart -->
        <canvas id="orderChart" width="200" height="200"></canvas>
        <canvas id="vendorChart" width="200" height="200"></canvas>
    </div>
</body>
</html>
