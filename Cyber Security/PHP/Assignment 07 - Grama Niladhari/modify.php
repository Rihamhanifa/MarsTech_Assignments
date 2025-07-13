<?php
session_start();
if (isset($_SESSION['row_data'])) {
    $row = $_SESSION['row_data']; // get the row data from session
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify</title>
 <style>
    :root {
        --primary: #3498db;
        --secondary: #2ecc71;
        --accent: #f39c12;
        --light: #f8f9fa;
        --dark: #2c3e50;
        --border-radius: 12px;
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

    .registration-container {
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
        font-size: 22px;
        margin-bottom: 10px;
        color: var(--dark);
    }

    h3 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 20px;
        color: var(--primary);
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: 600;
        font-size: 14px;
        color: var(--dark);
    }

    input,
    select {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ccc;
        border-radius: var(--border-radius);
        font-size: 1rem;
        transition: all 0.3s ease;
        margin-top: 5px;
    }

    input:focus,
    select:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    }

    .submit-btn {
        display: block;
        width: 100%;
        margin-top: 25px;
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

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .submit-btn:active {
        transform: translateY(1px);
    }

    .home-link {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 25px;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        color: white;
        text-decoration: none;
        font-weight: bold;
        border-radius: 30px;
        text-align: center;
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

    @media (max-width: 600px) {
        .registration-container {
            padding: 30px 20px;
        }
    }
 </style>
</head>
<body>
    <div class="registration-container">
        <h1 style="text-align:center;">Grama Niladhari Residents Management System</h1>
        <form method="POST" action="modify_process.php">
            <h3>Modify Details</h3>

            <label>Full Name
                <input type="text" name="fullname" id="fullname" value="<?php echo ($row['full_name']); ?>">
            </label>

            <label>Date Of Birth
                <input type="date" name="dob" id="dob" value="<?php echo ($row['dob']); ?>">
            </label>

            <label>NIC
                <input type="text" name="nic" id="nic" value="<?php echo ($row['nic']); ?>">
            </label>

            <label>Address
                <input type="text" name="address" id="address" value="<?php echo ($row['address']); ?>">
            </label>

            <label>Phone
                <input type="tel" name="phone" id="phone" value="<?php echo ($row['phone']) ; ?>">
            </label>

            <label>Email
                <input type="email" name="email" id="email" value="<?php echo($row['email']) ; ?>">
            </label>

            <label>Occupation
                <input type="text" name="occupation" id="occupation" value="<?php echo ($row['occupation']); ?>">
            </label>

            <label>Gender
                <select name="gender" id="gender">
                    <option value="">Select gender</option>
                    <option value="male" <?php if (isset($row['gender']) && $row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                    <option value="female" <?php if (isset($row['gender']) && $row['gender'] == 'female') echo 'selected'; ?>>Female</option>
                    <option value="other" <?php if (isset($row['gender']) && $row['gender'] == 'other') echo 'selected'; ?>>Other</option>
                </select>
            </label>

            <button type="submit" name="submit" class="submit-btn">Modify</button>

            <a href="index.php" class="home-link">Go to Home</a>
        </form>
    </div>
</body>
</html>
