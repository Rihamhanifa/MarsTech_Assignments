<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grama Niladhari Residential Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #3498db;
            --secondary: #2ecc71;
            --light: #f8f9fa;
            --dark: #2c3e50;
            --border-radius: 12px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .container {
            text-align: center;
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 320px;
            border-top: 5px solid var(--primary);
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02);
        }

        h1 {
            color: var(--dark);
            margin-bottom: 5px;
            font-size: 26px;
            font-weight: 800;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        h2 {
            color: #7f8c8d;
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 1px;
        }

        .button {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px;
            margin: 15px auto;
            border-radius: 30px;
            width: 80%;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .register-btn {
            background: linear-gradient(to right, var(--primary), var(--secondary));
        }

        .search-btn {
            background: linear-gradient(to right, var(--secondary), var(--primary));
        }

        .button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .button:active {
            transform: translateY(1px);
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: radial-gradient(circle at 30% 30%, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="logo">GN</div>
        <h1>Grama Niladhari Residential</h1>
        <h2>Management System</h2>
        <a href="register.php" class="button register-btn">Register</a>
        <a href="search.php" class="button search-btn">Search</a>
    </div>
</body>
</html>