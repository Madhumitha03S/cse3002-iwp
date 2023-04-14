<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Title -->
    <title>Form Validation</title>
    <!-- CSS -->
    <style>
    form {
        margin: 20px;
        background-color: #b6b6b6;
        width: 40%;
    }

    .form-section {
        padding: 10px;
        display: grid;
        grid-template-columns: 200px 240px;
    }

    label {
        margin-bottom: 10px;
        text-align: right;
        padding-right: 10px;
    }

    input,
    select {
        margin-bottom: 10px;
        background-color: #e9ddda;
    }

    input[type="submit"] {
        margin-left: 50%;
    }

    .weight-section {
        display: inline;
    }
    </style>
    <!-- Javascript -->
    <script src="js/home.js"></script>
</head>

<body>
    <form action="form-validation.php" method="post">
        <section class="form-section">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first-name" />
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" />

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" length="10" />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" />

            <label for="verify-password">Verify Password</label>
            <input type="password" id="verify-password" name="verify-password" />

            <label for="dob-day">Date of Birth</label>
            <section class="dob-section">
                <select id="dob-day" name="dob-day">
                    <option value="">DD</option>
                    <?php for ($day = 1; $day <= 31; $day++) { ?>
                    <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                    <?php } ?>
                </select>
                <select id="dob-month" name="dob-month">
                    <option value="">MM</option>
                    <?php for ($month = 1; $month <= 12; $month++) { ?>
                    <option value="<?php echo $month; ?>">
                        <?php echo substr(date("F", mktime(0, 0, 0, $month, 10)), 0, 3); ?></option>
                    <?php } ?>

                </select>
                <select id="dob-year" name="dob-year">
                    <option value="">YYYY</option>
                    <?php for ($year = date("Y"); $year >= 1900; $year--) { ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php } ?>
                </select>
            </section>

            <label for="weight-value">Weight</label>
            <section class="weight-section">
                <input type="number" id="weight-value" name="weight-value" min="0" step="0.1" maxlength="2" />
                <select id=" weight-unit" name="weight-unit">
                    <option value="kg">kg</option>
                    <option value="lb">lb</option>
                </select>
            </section>
        </section>

        <input type="submit" value="Submit" />
    </form>
</body>

</html>


<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $first_name = $_POST['first-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $verify_password = $_POST['verify-password'];
    $dob_day = $_POST['dob-day'];
    $dob_month = $_POST['dob-month'];
    $dob_year = $_POST['dob-year'];
    $weight_value = $_POST['weight-value'];
    $weight_unit = $_POST['weight-unit'];

    // Initialize error message array
    $errors = [];

    // Validate First Name
    if (empty($first_name)) {
        $errors[] = 'First Name is required.';
    } else if (!preg_match('/^[a-zA-Z\s]+$/', $first_name)) {
        $errors[] = 'First Name can only contain letters and spaces.';
    }

    // Validate Email
    if (empty($email)) {
        $errors[] = 'Email Address is required.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email Address is not valid.';
    }

    // Validate Phone Number
    if (empty($phone)) {
        $errors[] = 'Phone Number is required.';
    } else if (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = 'Phone Number must be 10 digits and can only contain numbers (no dashes or spaces).';
    }

    // Validate Password
    if (empty($password)) {
        $errors[] = 'Password is required.';
    } else if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errors[] = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.';
    }

    // Validate Verify Password
    if (empty($verify_password)) {
        $errors[] = 'Verify Password is required.';
    } else if ($verify_password !== $password) {
        $errors[] = 'Verify Password must match Password.';
    }

    // Validate Date of Birth
    if (empty($dob_day) || empty($dob_month) || empty($dob_year)) {
        $errors[] = 'Date of Birth is required.';
    } else if (!checkdate($dob_month, $dob_day, $dob_year)) {
        $errors[] = 'Date of Birth is not valid.';
    }

    // Validate Weight
    if (empty($weight_value)) {
        $errors[] = 'Weight is required.';
    } else if (!is_numeric($weight_value) || $weight_value <= 0) {
        $errors[] = 'Weight must be a number greater than 0.';
    } else if ($weight_unit !== 'kg' && $weight_unit !== 'lb') {
        $errors[] = 'Weight unit is not valid.';
    }

    // Display error messages if any
    if (!empty($errors)) {
        echo '<h3>Errors:</h3><ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    } else {
        // Process form data if validation passed
        // Display the validated form data as a table if validation passed
        echo '<style>.display-info {border: 1px solid #ff0000; border-radius: 5px; padding: 2px; border-spacing: 1px; background-color: #caffff} display-info th, td {border: 1px solid #ff0000; border-radius: 5px; padding: 2px; border-spacing: 1px;}</style>';
        echo '<h3>Submitted Information:</h3>';
        echo '<table class="display-info">';
        echo '<tr><td>First Name</td><td>' . $first_name . '</td></tr>';
        echo '<tr><td>Email Address</td><td>' . $email . '</td></tr>';
        echo '<tr><td>Phone Number</td><td>' . $phone . '</td></tr>';
        echo '<tr><td>Date of Birth</td><td>' . $dob_day . '/' . $dob_month . '/' . $dob_year . '</td></tr>';
        echo '<tr><td>Weight</td><td>' . $weight_value . ' ' . $weight_unit . '</td></tr>';
        echo '</table>';
    }
}
