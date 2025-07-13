<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Resident</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary: #3498db;
            --secondary: #2ecc71;
            --danger: #e74c3c;
            --light: #f8f9fa;
            --dark: #2c3e50;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: white;
            width: 100%;
            max-width: 500px;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-top: 5px solid var(--primary);
            text-align: center;
        }

        h1 {
            color: var(--dark);
            font-size: 24px;
            margin-bottom: 30px;
        }

        .success-message,
        .error-message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            animation: fadeIn 0.5s ease-in-out;
        }

        .success-message {
            background-color: rgba(46, 204, 113, 0.1);
            color: var(--secondary);
            border-left: 5px solid var(--secondary);
        }

        .error-message {
            background-color: rgba(231, 76, 60, 0.1);
            color: var(--danger);
            border-left: 5px solid var(--danger);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .home-link {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 25px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .home-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            background: linear-gradient(to right, var(--secondary), var(--primary));
        }

        .home-link:active {
            transform: translateY(1px);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Delete Resident</h1>

    <?php
    include("config.php");
    session_start();

    if (isset($_SESSION['row_data'])) {
        $row = $_SESSION['row_data']; // get the row data from session
        $id = $row['id'];

        $result = mysqli_query($mysqli, "DELETE FROM residents WHERE id=$id");

        if ($result) {
            echo "<div class='success-message'>✅ Resident deleted successfully!</div>";
        } else {
            echo "<div class='error-message'>❌ Could not delete resident. Please try again.</div>";
        }
    } 
    ?>

    <a href="index.php" class="home-link">← Go to Home</a>
</div>

</body>
</html>