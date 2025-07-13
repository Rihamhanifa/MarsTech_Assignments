<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Residents</title>
<style>
    :root {
        --primary: #3498db;
        --secondary: #2ecc71;
        --danger: #e74c3c;
        --light: #f8f9fa;
        --dark: #2c3e50;
        --border-radius: 8px;
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
        color: var(--dark);
    }

    .container {
        background: white;
        width: 100%;
        max-width: 600px;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-top: 5px solid var(--primary);
    }

    h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 30px;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 800;
    }

    .search-box {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    label {
        font-weight: 600;
        font-size: 14px;
        color: var(--dark);
    }

    input[type="text"] {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ccc;
        border-radius: var(--border-radius);
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    }

    .search-button {
        display: block;
        width: 100%;
        margin-top: 20px;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        color: white;
        border: none;
        padding: 14px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 30px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .search-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .search-button:active {
        transform: translateY(1px);
    }

    a {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        border-bottom: 1px solid transparent;
        transition: all 0.3s ease;
    }

    a:hover {
        color: var(--secondary);
        border-bottom: 1px solid var(--secondary);
    }

    @media (max-width: 600px) {
        .container {
            padding: 30px 20px;
        }
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Search Residents</h1>
        
        <form method="POST" action="search_results.php">
            <div class="search-container">
                <div class="search-box">
                    <input type="text" name="fullname" id="searchInput" placeholder="Search by Full Name">
                    <input type="text" name="nic" id="searchInput" placeholder="Search by NIC Number">
                    <input type="text" name="address" id="searchInput" placeholder="Search by Address">
                    <button type="submit" class="search-button" name="submit">Search</button>
                </div>
            </div>
            <a href="index.php">Go to Home</a>
        </form>
    </div>
</body>
</html>