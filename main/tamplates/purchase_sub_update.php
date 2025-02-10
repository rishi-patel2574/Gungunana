<?php
    session_start();
    include '../partials/dbconnect.php';

    if (isset($_GET['changeid'])) {
        $sub = $_GET['changeid'];
    }
    
    $id = $_SESSION['chid'];

    $query = "SELECT username, email FROM u_info WHERE sn = '$id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $bank_name = $_POST['bank_name'];
        $account_number = $_POST['account_number'];
        $ifsc_code = $_POST['ifsc_code'];
        if ($sub == 1)
        {
            $amount=149;
        }
        elseif($sub == 6)
        {
            $amount=799;
        }
        elseif($sub == 12)
        {
            $amount=1599;
        }
        
        $insert_query = "INSERT INTO subscriptions (user_id, bank_name, account_number, ifsc_code, duration, amount) VALUES ($id, '$bank_name', $account_number, $ifsc_code, $sub, $amount)";
        $up = "UPDATE `u_info` SET `subscription` = 'YES' WHERE `sn`= $id";
        $res = mysqli_query($conn, $up);
        $_SESSION['sub'] = "YES";
        if (mysqli_query($conn, $insert_query)) {
            echo "<script>alert('Subscription request submitted successfully!'); window.location.href='../profile.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Subscription</title>
    <link rel="stylesheet" href="..\..\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\..\css\style.css">
    <script type="text/javascript" src="..\..\js\bootstrap.min.js"></script>
    <script>
        function confirmSubscription() {
            let sub = "<?php echo $sub; ?>"; 
            let amount = 0;
            if( sub == 1)
            {
                amount = 149; 
            }
            else if(sub == 6)
            {
                amount = 799;
            }
            else if(sub == 12)
            {
                amount = 1599;
            }

            let confirmation = confirm("You will subscribe to: " + sub + " months \nThe total amount to be deducted is: " + amount + "\nDo you want to proceed?");
            if (confirmation) {
                document.getElementById("subscriptionForm").submit();
            }
        }
    </script>
</head>
<body class="signup-body a-body">
    <div class="signup-container">
        <h1>Enter Bank Details</h1>
        <form id="subscriptionForm" action="#" method="POST" enctype="multipart/form-data">
            <!-- Email -->
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" readonly>
            </div>

            <!-- Username -->
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $user['username']; ?>" readonly>
            </div>

            <!-- Bank Name -->
            <div class="input-group">
                <label for="bank_name">Bank Name:</label>
                <input type="text" id="bank_name" name="bank_name" required>
            </div>

            <!-- Account Number -->
            <div class="input-group">
                <label for="account_number">Account Number:</label>
                <input type="text" id="account_number" name="account_number" required>
            </div>

            <!-- IFSC Code -->
            <div class="input-group">
                <label for="ifsc_code">IFSC Code:</label>
                <input type="text" id="ifsc_code" name="ifsc_code" required>
            </div>

            <button type="button" class="signup-btn" onclick="confirmSubscription()">Subscribe</button>
        </form>
    </div>
</body>
</html>
