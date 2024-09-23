<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Styling the background image */
        body {
            background: url('https://t3.ftcdn.net/jpg/02/97/91/38/360_F_297913876_pxLCVBrLEyznyqdHvNpKmNRPvYWoqlEW.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            color: white;
            position: relative;
        }

        /* Dark overlay to enhance text visibility */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        /* Custom CSS for styling the welcome message */
        .welcome-message {
            font-size: 4rem;
            font-weight: bold;
            color: #f7f7f7;
            text-align: center;
            margin-top: 20%;
            z-index: 1;
            position: relative;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #3498db; /* Blue background for navbar */
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: white !important; /* Make navbar text white */
        }

        /* Profile section styling */
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow */
            z-index: 1;
        }

        .card h3 {
            color: #2c3e50; /* Darker color for headings */
        }

        .list-group-item {
            background-color: #f1f1f1; /* Light background for profile items */
            color: #2c3e50;
        }

        /* Button Styling */
        .btn-primary {
            background-color: #e74c3c; /* Red button for profile */
            border-color: #e74c3c;
        }

        .btn-primary:hover {
            background-color: #b03a2e; /* Darker shade on hover */
            border-color: #b03a2e;
        }

        /* Logout Button Color (Black) */
        .btn-danger {
            background-color: black; /* Set logout button to black */
            border-color: black;
        }

        .btn-danger:hover {
            background-color: #333; /* Darker gray on hover */
            border-color: #333;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">MyWebsite</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user'])): ?>
                    <!-- Profile Button (Collapsible Trigger) -->
                    <li class="nav-item">
                        <button class="btn btn-primary mr-2" type="button" data-toggle="collapse" data-target="#profileInfo" aria-expanded="false" aria-controls="profileInfo">
                            Profile
                        </button>
                    </li>
                    <!-- Logout Button -->
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </li>
                <?php else: ?>
                    <!-- Login Button if not logged in -->
                    <li class="nav-item">
                        <a href="login.php" class="btn btn-primary">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- Centered Welcome Message -->
    <div class="welcome-message">
        Welcome, <?php echo htmlspecialchars($user['username']); ?>!
    </div>

    <div class="container mt-5">
        <!-- Profile Info Collapsible Section -->
        <div class="collapse" id="profileInfo">
            <div class="card card-body">
                <h3>Your Profile</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></li>
                    <li class="list-group-item"><strong>Birthday:</strong> <?php echo htmlspecialchars($user['birthday']); ?></li>
                    <li class="list-group-item"><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></li>
                    <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></li>
                    <li class="list-group-item"><strong>Phone Number:</strong> <?php echo htmlspecialchars($user['phone_number']); ?></li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
