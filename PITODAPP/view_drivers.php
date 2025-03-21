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

        <h1 class="title">Total Numbers Of Drivers</h1>