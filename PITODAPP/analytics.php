<?php
include 'db.php';

// Get current year
$current_year = date('Y');

// Fetch analytics data from the database
$sql = "SELECT month, activity_count FROM analytics_tbl WHERE year = 2024 ORDER BY FIELD(month, 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC')";
$result = $conn->query($sql);

// Prepare arrays for labels and data
$months = [];
$activity_counts = [];

while ($row = $result->fetch_assoc()) {
    $months[] = $row['month'];
    $activity_counts[] = (int) $row['activity_count'];
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiTODAPP Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script defer src="script.js"></script> 
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="logo">PiTODAPP</h2>
        <ul class="menu">
        <li><a href="dashboard.php" class="menu-item">Dashboard</a></li>
            <li><a href="view_drivers.php" class="menu-item">Drivers</a></li>
            <li><a href="view_passengers.php" class="menu-item">Passengers</a></li>
            <li><a href="view_operators.php" class="menu-item">Operators</a></li>
            <li><a href="view_staffs.php" class="menu-item">Staff</a></li>
            <li><a href="scheduling.php" class="menu-item">Scheduling</a></li>
            <li><a href="lost_found.php" class="menu-item">Lost & Found</a></li>
            <li><a href="notifications.php" class="menu-item">Notifications</a></li>
            <li><a href="analytics.php" class="menu-item">Analytics</a></li>
            <li><a href="complaints.php" class="menu-item">Complaints</a></li>
            <li><a href="settings.php" class="menu-item">Settings</a></li>
        </ul>
        <button class="logout">LOG OUT</button>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <input type="text" class="search" placeholder="Search">
            <div class="header-icons">
                <div class="bell-icon"></div>
                <div class="profile">
                    <span>Arc Raphael</span>
                    <div class="profile-icon"></div>
                </div>
            </div>
        </div>

        <h1 class="title">Analytics</h1>
    <div class="analytics-container">

        <canvas id="analyticsChart"></canvas>
    </div>

    <script>
        // Pass PHP data to JavaScript
        const months = <?php echo json_encode($months); ?>;
        const activityCounts = <?php echo json_encode($activity_counts); ?>;

        // Generate the chart
        const ctx = document.getElementById('analyticsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Activity',
                    data: activityCounts,
                    backgroundColor: 'rgba(160, 0, 0, 0.7)', // Dark red
                    borderColor: 'rgba(160, 0, 0, 1)',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#ddd' }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    </script>

</body>
</html>
