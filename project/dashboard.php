<?php
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Handle logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}

// Database connection
$mysqli = new mysqli('localhost', 'Admin@gmail.com', 'Admin@123', 'quotation_db');

// Check connection
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

// Fetch quotations
$result = $mysqli->query("SELECT * FROM Admin");

// Handle any query errors
if (!$result) {
    die('Query failed: ' . $mysqli->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: white;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard-container {
            width: 100%;
            max-width: 1000px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }
        .dashboard-container h1 {
            text-align: center;
            color: #28a745;
            margin-bottom: 20px;
        }
        .dashboard-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .dashboard-container table, th, td {
            border: 1px solid #ddd;
        }
        .dashboard-container th, td {
            padding: 15px;
            text-align: left;
        }
        .dashboard-container th {
            background-color: #28a745;
            color: white;
        }
        .dashboard-container td a {
            color: #28a745;
            text-decoration: none;
        }
        .dashboard-container td a:hover {
            text-decoration: underline;
        }
        .dashboard-container .logout-button {
            width: 100%;
            padding: 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 20px;
        }
        .dashboard-container .logout-button:hover {
            background-color: #218838;
            transform: scale(1.02);
        }
        .dashboard-container .add-button {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-bottom: 20px;
        }
        .dashboard-container .add-button:hover {
            background-color: #0056b3;
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Quotation Management Dashboard</h1>
        
        <!-- Add New Quotation Button -->
        <a href="add_quotation.php">
            <button class="add-button">Add New Quotation</button>
        </a>

        <!-- Quotations Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Quotation No</th>
                    <th>Quotation To</th>
                    <th>Amount</th>
                    <th>Subtotal</th>
                    <th>Profit</th>
                    <th>Loss</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td><?php echo htmlspecialchars($row['quotation No']); ?></td>
                        <td><?php echo htmlspecialchars($row['quotation To']); ?></td>
                        <td><?php echo htmlspecialchars($row['quotation Amount']); ?></td>
                        <td><?php echo htmlspecialchars($row['subtotal']); ?></td>
                        <td><?php echo htmlspecialchars($row['profit']); ?></td>
                        <td><?php echo htmlspecialchars($row['loss']); ?></td>
                        <td>
                            <a href="view_quotation.php?id=<?php echo htmlspecialchars($row['id']); ?>">View</a> |
                            <a href="edit_quotation.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a> |
                            <a href="delete_quotation.php?id=<?php echo htmlspecialchars($row['id']); ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Logout Button -->
        <form method="post">
            <button class="logout-button" type="submit" name="logout">Logout</button>
        </form>
    </div>
</body>
</html>
