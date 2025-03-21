<?php
include 'db.php';

// Fetch schedules from database
$sql = "SELECT s.schedule_id, d.name, d.email, d.username, s.operation, s.vehicle_id, s.status 
        FROM schedules_tbl s
        JOIN drivers_tbl d ON s.driver_id = d.driver_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling | PiTODAPP</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="logo">PiTODAPP</h2>
        <ul class="menu">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="view_drivers.php">Drivers</a></li>
            <li><a href="view_passengers.php">Passengers</a></li>
            <li><a href="view_operators.php">Operators</a></li>
            <li><a href="view_staff.php">Staff</a></li>
            <li><a href="scheduling.php" class="active">Scheduling</a></li>
            <li><a href="lost_found.php">Lost & Found</a></li>
            <li><a href="notifications.php">Notifications</a></li>
            <li><a href="analytics.php">Analytics</a></li>
            <li><a href="complaints.php">Complaints</a></li>
            <li><a href="settings.php">Settings</a></li>
        </ul>
        <button class="logout">LOG OUT</button>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="title">Scheduling</h1>

        <!-- Tabs -->
        <div class="tabs">
            <a href="#" class="tab active">Members</a>
            <a href="#" class="tab">Pending</a>
        </div>

        <!-- Search Bar -->
        <div class="search-container">
            <input type="text" id="search" placeholder="Search">
        </div>

        <!-- Schedule Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th></th> <!-- Checkbox column -->
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Operation</th>
                        <th>Vehicle ID</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['operation']; ?></td>
                        <td><?php echo $row['vehicle_id']; ?></td>
                        <td>
                            <span class="status <?php echo strtolower($row['status']); ?>">
                                <?php echo ucfirst($row['status']); ?>
                            </span>
                        </td>
                        <td>
                            <button class="edit-btn">✏️</button>
                            <button class="delete-btn">🗑️</button>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>