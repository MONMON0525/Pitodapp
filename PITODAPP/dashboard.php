<?php
include 'db.php';

$sql = "SELECT COUNT(*) AS total FROM drivers_tbl";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_drivers = $row['total'];

$sql = "SELECT COUNT(*) AS total FROM passengers_tbl";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_passengers = $row['total'];

$sql = "SELECT COUNT(*) AS total FROM operator_tbl";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_operators = $row['total'];

$sql = "SELECT COUNT(*) AS total FROM staffs_tbl";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_staffs = $row['total'];

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
    <script defer src="dashboard.js"></script> 
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

        <h1 class="title">DASHBOARD</h1>

        <!-- Dashboard Cards -->
        <div class="cards">
    <div class="card red-card">
        <h3>Total Drivers</h3>
        <p class="count"><?php echo $total_drivers; ?></p>
        <a href="view_drivers.php" class="view-details">View Details</a>
    </div>
    
    <div class="card red-card">
        <h3>Total Passengers</h3>
        <p class="count"><?php echo $total_passengers; ?></p>
        <a href="view_passengers.php" class="view-details">View Details</a>
    </div>
    
    <div class="card red-card">
        <h3>Total Operators</h3>
        <p class="count"><?php echo $total_operators; ?></p>
        <a href="view_operators.php" class="view-details">View Details</a>
    </div>

    <div class="card red-card">
        <h3>Total Staff</h3>
        <p class="count"><?php echo $total_staffs ?></p>
        <a href="view_staffs.php" class="view-details">View Details</a>
    </div>
</div>


        <!-- Analytics and Complaints Section -->
        <div class="analytics-section">
            <div class="analytics">
                <h2>Analytics</h2>
                <canvas id="chart"></canvas> 
            </div>

            
            <div class="recent-complaints">
                <h2>Recent Complaints</h2>
                <div class="complaint">
                    <img src="user1.png" alt="User">
                    <p>Bad service experience <span>⭐⭐⭐☆☆</span></p>
                </div>
                <div class="complaint">
                    <img src="user2.png" alt="User">
                    <p>Driver was late <span>⭐⭐☆☆☆</span></p>
                </div>
            </div>
        </div>

        <!-- Lost & Found -->
        <div class="lost-found">Lost & Found</div>
    </div>
</body>
</html>
