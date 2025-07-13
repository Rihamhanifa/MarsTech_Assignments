

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Search Results</title>
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
        color: var(--dark);
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px 30px;
        border-top: 5px solid var(--primary);
    }

    h1 {
        text-align: center;
        font-size: 26px;
        margin-bottom: 30px;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 800;
    }

    .message {
        padding: 15px;
        margin-bottom: 30px;
        font-weight: bold;
        border-radius: var(--border-radius);
        text-align: center;
    }

    .success {
        background-color: rgba(46, 204, 113, 0.1);
        color: var(--secondary);
        border-left: 5px solid var(--secondary);
    }

    .error {
        background-color: rgba(231, 76, 60, 0.1);
        color: var(--danger);
        border-left: 5px solid var(--danger);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fcfdff;
    }

    th, td {
        padding: 15px;
        border-bottom: 1px solid #eee;
        text-align: left;
    }

    th {
        background-color: var(--primary);
        color: white;
    }

    tr:hover {
        background-color: #f8f9fa;
    }

    .resident-details {
        margin-top: 30px;
    }

    .resident-details p {
        margin: 10px 0;
    }

    .buttons {
        margin-top: 30px;
        display: flex;
        gap: 15px;
    }

    .btn {
        padding: 12px 20px;
        border: none;
        border-radius: 30px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
        flex: 1;
    }

    .modify-btn {
        background: linear-gradient(to right, var(--secondary), #27ae60);
        color: white;
    }

    .delete-btn {
        background: linear-gradient(to right, var(--danger), #c0392b);
        color: white;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .search-again {
        display: inline-block;
        margin-top: 30px;
        padding: 12px 20px;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        color: white;
        border-radius: 30px;
        text-decoration: none;
        font-weight: bold;
        text-align: center;
        transition: all 0.3s ease;
    }

    .search-again:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 600px) {
        .buttons {
            flex-direction: column;
        }
        .btn {
            width: 100%;
        }
    }
</style>
</head>
<body>

    <?php
    session_start();
    include("config.php");

    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $nic = $_POST['nic'];
        $address = $_POST['address'];

        $result = mysqli_query($mysqli, "SELECT * FROM residents WHERE full_name LIKE '%$fullname%' AND nic LIKE '%$nic%'AND address LIKE '%$address%'");
    
                if($result) {
                    if(mysqli_num_rows($result) > 0) {
                        $massage = "Resident Found!";
                        $row = mysqli_fetch_assoc($result);
                        // Process resident data here
                    } else {
                    $massage =  "Resident not found!";
                    }
                } else {
                    echo "Error in query: " . mysqli_error($mysqli);
                }
    }

    ?>
<div class="container">
    <h1><?php echo $massage; ?></h1>

        <div class="resident-details">
            <h2>Resident Details</h2>
            <p><strong>Full Name:</strong> <?php echo $row['full_name']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $row['dob']; ?></p>
            <p><strong>NIC:</strong> <?php echo $row['nic']; ?></p>
            <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
            <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
            <p><strong>Occupation:</strong> <?php echo $row['occupation']; ?></p>
            <p><strong>Gender:</strong> <?php echo $row['gender']; ?></p>
            <p><strong>Registered Date:</strong> <?php echo $row['registered_date']; ?></p>
        </div>

        <div class="buttons">
            <?php
            $_SESSION['row_data'] = $row;
            ?>
            <a href="modify.php" class="btn modify-btn">Modify</a>
            <a href="delete.php" class="btn delete-btn">Delete</a>
        </div>
    

    <a href="search.php" class="search-again">Search Again</a>
</div>
</body>
</html>