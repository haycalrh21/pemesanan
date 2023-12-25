<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your existing head content here -->

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Add a script section to define your donut chart
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('userChart').getContext('2d');
            var userCount = @json($userCount);

            console.log(userCount); // Check the value in the console

            var myChart = new Chart(ctx, {
                type: 'doughnut', // Set chart type to doughnut
                data: {
                    labels: ['Total Users'],
                    datasets: [{
                        label: 'User Count',
                        data: [userCount],
                        backgroundColor: ['rgba(255, 99, 132, 0.5)'], // Adjust color as needed
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: false, // Set to false to make the chart non-responsive
                    maintainAspectRatio: false, // Disable aspect ratio to customize size
                    cutoutPercentage: 50, // Adjust cutout percentage to control the size of the center hole
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

        <!-- Add a canvas element for the chart -->
        <canvas id="userChart" width="200" height="200"></canvas>
    </div>
</body>
</html>
