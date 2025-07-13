<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

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

    .registration-container {
        background: white;
        width: 100%;
        max-width: 600px;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-top: 5px solid var(--primary);
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-title {
        font-size: 24px;
        margin-bottom: 5px;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-weight: 800;
    }

    .form-subtitle {
        color: #7f8c8d;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 1px;
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: 600;
        font-size: 14px;
        color: var(--dark);
    }

    input, select, textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ccc;
        border-radius: var(--border-radius);
        font-size: 1rem;
        transition: all 0.3s ease;
        margin-top: 5px;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    }

    .error {
        color: var(--danger);
        font-size: 0.85rem;
        margin-top: 4px;
        display: block;
        animation: shake 0.5s;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20%, 60% { transform: translateX(-5px); }
        40%, 80% { transform: translateX(5px); }
    }

    button[type="submit"] {
        display: block;
        width: 100%;
        margin-top: 25px;
        background: linear-gradient(to right, var(--primary), var(--secondary));
        color: white;
        border: none;
        padding: 12px;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 30px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    button[type="submit"]:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    button[type="submit"]:active {
        transform: translateY(1px);
    }

    .success-message {
        padding: 12px;
        background-color: rgba(46, 204, 113, 0.1);
        color: var(--secondary);
        border: 1px solid var(--secondary);
        border-radius: var(--border-radius);
        margin-top: 20px;
        text-align: center;
        font-weight: 600;
    }

    a.home-link {
        display: inline-block;
        margin-top: 20px;
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        border-bottom: 1px solid transparent;
        transition: all 0.3s ease;
    }

    a.home-link:hover {
        border-bottom: 1px solid var(--primary);
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
    <div class="form-header">
        <h1 class="form-title">Register Resident</h1>
        <p class="form-subtitle">Please provide accurate information for registration.</p>
    </div>

    <?php
    // PHP Validation & DB Insert Code Here (Same as in your file)
    $fullnameerr = $doberr = $nicerr = $addresserr = $phoneerr = $emailerr = $gendererr = "";
    $fullname = $dob = $nic = $address = $phone = $email = $gender = $occupation = "";

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    include("config.php");

    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Full name validation
        if (empty($_POST["fullname"])) {
            $fullnameerr = "Full Name is required";
        } else {
            $fullname = test_input($_POST["fullname"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $fullname)) {
                $fullnameerr = "Only letters and white space allowed";
            }
        }

        // Date of birth
        if (empty($_POST["dob"])) {
            $doberr = "Date of birth is required";
        } else {
            $dob = test_input($_POST["dob"]);
        }

        // NIC validation
        if (empty($_POST["nic"])) {
            $nicerr = "NIC is required";
        } else {
            $nic = test_input($_POST["nic"]);
            if (!preg_match("/^([0-9]{9}[VXvx]|[0-9]{12})$/", $nic)) {
                $nicerr = "Invalid NIC. Format must be 9 digits + V/X or 12 digits";
            }
        }

        // Address
        if (empty($_POST["address"])) {
            $addresserr = "Address is required";
        } else {
            $address = test_input($_POST["address"]);
        }

        // Phone validation
        if (empty($_POST["phone"])) {
            $phoneerr = "Phone number is required";
        } else {
            $phone = test_input($_POST["phone"]);
            if (!preg_match("/^[0-9]{10}$/", $phone)) {
                $phoneerr = "Invalid phone number. Only 10 digits allowed";
            }
        }

        // Email validation
        if (empty($_POST["email"])) {
            $emailerr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailerr = "Invalid email format";
            }
        }

        // Gender validation
        if (empty($_POST["gender"])) {
            $gendererr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        // Occupation (optional)
        if (!empty($_POST["occupation"])) {
            $occupation = test_input($_POST["occupation"]);
        }

        // Proceed only if all error variables are empty
        if (empty($fullnameerr) && empty($doberr) && empty($nicerr) && empty($addresserr) && empty($phoneerr) && empty($emailerr) && empty($gendererr)) {

            // Check for duplicate NIC
            $check_nic = mysqli_query($mysqli, "SELECT nic FROM residents WHERE nic = '$nic'");
            if (mysqli_num_rows($check_nic) > 0) {
                $nicerr = "NIC already exists in the system";
            } else {
                // Insert data
                $result = mysqli_query($mysqli, "INSERT INTO residents (full_name, dob, nic, address, phone, email, occupation, gender) 
                            VALUES ('$fullname', '$dob', '$nic', '$address', '$phone', '$email', '$occupation', '$gender')");

                if ($result) {
                    echo '<div style="padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin: 10px 0;">Data stored successfully</div>';
                    // Optionally reset form values
                    $fullname = $dob = $nic = $address = $phone = $email = $gender = $occupation = "";
                } else {
                    echo '<div style="color:red;">Data not stored: ' . mysqli_error($mysqli) . '</div>';
                }
            }
        }
    }
?>
   

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label>Full Name
            <input type="text" name="fullname" id="fullname" value="<?php echo $fullname; ?>">
        </label>
        <span class="error"><?php echo $fullnameerr;?></span>

        <label>Date Of Birth
            <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>">
        </label>
        <span class="error"><?php echo $doberr;?></span>

        <label>NIC
            <input type="text" name="nic" id="nic" value="<?php echo $nic; ?>">
        </label>
        <span class="error"><?php echo $nicerr;?></span>

        <label>Address
            <input type="text" name="address" id="address" value="<?php echo $address; ?>">
        </label>
        <span class="error"><?php echo $addresserr;?></span>

        <label>Phone
            <input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>">
        </label>
        <span class="error"><?php echo $phoneerr;?></span>

        <label>Email
            <input type="email" name="email" id="email" value="<?php echo $email; ?>">
        </label>
        <span class="error"><?php echo $emailerr;?></span>

        <label>Occupation
            <input type="text" name="occupation" id="occupation" value="<?php echo $occupation; ?>">
        </label>

        <label>Gender
            <select name="gender" id="gender">
                <option value="">Select gender</option>
                <option value="male" <?php if ($gender === "male") echo "selected"; ?>>Male</option>
                <option value="female" <?php if ($gender === "female") echo "selected"; ?>>Female</option>
                <option value="other" <?php if ($gender === "other") echo "selected"; ?>>Other</option>
            </select>
        </label>
        <span class="error"><?php echo $gendererr;?></span>

        <button type="submit" class="submit-btn">Register Resident</button>

        <?php if (!empty($success_msg)) echo "<div class='success-message'>$success_msg</div>"; ?>
    </form>

    <a href="index.php" class="home-link">← Go to Home</a>
</div>

</body>
</html>