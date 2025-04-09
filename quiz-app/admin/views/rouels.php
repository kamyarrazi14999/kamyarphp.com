<?php
// Start session
include '../controllers/checklogin.php';
include '../../config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

 $query = 'SELECT * FROM results WHERE user_id = :user_id';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['user_id' => $_SESSION['user_id']]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($stmt->errorCode()!== '00000') {
        echo 'Error fetching results: '. implode(', ', $stmt->errorInfo());
        exit;
    }







// Fetch roles from the database
$query = "SELECT * FROM results WHERE user_id = :user_id ";
$stmt = $pdo->prepare($query);
$stmt->execute(['user_id' => $_SESSION['user_id']]);
// Fetch all results
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if the query was successful
if ($stmt->errorCode() !== '00000') {
    echo 'Error fetching roles: ' . implode(', ', $stmt->errorInfo());
    exit;
}

// Check if there are any roles in the database
if (empty($result)) {
    echo 'No roles found.';
    exit;
}
?>
s

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles Management</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
      <?php include 'sidebar.php'; ?>
     <div class="main-content">
        <a href="/quiz-app/admin/views/add-role.php" class="btn btn-primary">Add New Role</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['	result_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                        <td>
                            <a href="/quiz-app/admin/views/edit-role.php?id=<?php echo $row['result_id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="/quiz-app/admin/actions/delete-role.php?id=<?php echo $row['result_id  ']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
```
<?php
// Start session
include '../controllers/checklogin.php';
include '../../config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: /quiz-app/admin/views/login.php');
    exit;
}

// Include database connection
try {
    $dns = "mysql:host=$host;port=$port;dbname=$database;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $pdo = new PDO($dns, $username, $password, $options);
} catch (PDOException $e) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Connection Error: ' . $e->getMessage()]);
    exit;
}

// Define permissions
$permissions = ['view_roles', 'add_roles', 'edit_roles'];

// Check if the user has the required permissions
if (!isset($_SESSION['permissions']) || !array_intersect($_SESSION['permissions'], $permissions) === $permissions) {
    echo 'You do not have the required permissions.';
    exit;
}

// Fetch roles from the database
$query = "SELECT * FROM roles";
$stmt = $pdo->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if the query was successful
if ($stmt->errorCode() !== '00000') {
    echo 'Error fetching roles: ' . implode(', ', $stmt->errorInfo());
    exit;
}

// Check if there are any roles in the database
if (empty($result)) {
    echo 'No roles found.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

       .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            position: fixed;
            height: 100%;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .main-content {
            margin-left: 260px; /* Adjusted for sidebar width */
            padding: 20px;
            flex-grow: 1;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
        }
        .table tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-warning {
            background-color: #ffc107;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn:hover {
            opacity: 0.8;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rouels</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <!-- sidebar -->
     <?php include 'sidebar.php'; ?>
     <div class="main-content">
        <h1>Rouels</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['result_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                        <td>
                            <a href="/quiz-app/admin/views/edit-role.php?id=<?php echo $row['result_id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="/quiz-app/admin/actions/delete-role.php?id=<?php echo $row['result_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
     </div>
</body>
</html>