<?php
// 1. Create a database 
// store the user's login credentials, item details, and cart details 

// 2. Login page
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>VMART</title>
    <style>
        #login-form {
            margin: 60px;
        }

        .login {
            display: grid;
            grid-template-columns: 120px 200px;
            grid-template-rows: 50px 50px 50px;
        }

        label {
            margin: 10px;
        }

        input {
            margin: 10px;
        }
    </style>
</head>

<body>

    <form method="post" id="login-form">
        <h2>LOGIN PAGE</h2>
        <div class="login">
            <label name="username">Username</label>
            <input type="text" maxlength="10" name="username">
            <label name="email">Email</label>
            <input type="email" maxlength="30" name="email">
            <label name="password">Password</label>
            <input type="password" maxlength="8" name="password">
        </div>
    </form>
</body>

</html>

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "iwp_lab10";
$conn = mysqli_connect($host, $username, $password, $database) or die("Connect failed: %s\n" . $conn->error);
$sql = "SELECT * FROM items";
$result = mysqli_query($conn, $sql);

// if the credentials are valid, start the session and redirect the user to the catalog page
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$login_sql = "SELECT users.username FROM users WHERE ($username = users.username AND $email = users.email AND $password = users.password)";
$login_result = $conn->query($sql);
if ($result->num_rows == 1) {
    session_start();
} else {
}

// 3. Catalog page
// use PHP to dynamically generate the HTML code for the catalog page
// based on the items available in the database

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>VMART</title>
    <style>
        #catalog-form {
            margin: 60px;
        }

        .catalog {
            display: grid;
            grid-template-columns: 120px 100px;
            grid-template-rows: 50px 50px 50px;
        }

        label {
            margin: 10px;
        }

        input {
            margin: 10px;
        }
    </style>
</head>

<body>

    <form method="post" id="catalog-form">
        <h2>CATALOG PAGE</h2>
        <div class="catalog">
            <label name="ebook">Notebook</label>
            <input type="number" maxlength="2" name="notebook" id="1">
            <label name="chips">Chips</label>
            <input type="number" maxlength="2" name="chips" id="2">
            <label name="soda">Soda</label>
            <input type="number" maxlength="2" name="soda" id="3">
        </div>
    </form>
</body>

</html>

<?php
// 4. Cart page
// display the list of items selected by the user along with their quantities and the total cost
// use PHP sessions to store the cart details and update them
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>VMART</title>
</head>

<body>
    <h2>CART PAGE</h2>
</body>

</html>

<?php
// add item
$_SESSION['cart'][$item_id] = array(
    'name' => $item_name,
    'quantity' => $item_quantity,
    'price' => $item_price
);

// update item quantity
$_SESSION['cart'][$item_id]['quantity'] = $new_quantity;

// remove item
unset($_SESSION['cart'][$item_id]);

// sign-out link on the cart page that terminates the session
session_destroy();

// 5. Session management
// manage the user's session and keep track of the cart details
if (!isset($_SESSION['username'])) {
    // redirect the user to the login page
}

// check if an item is already in the cart or not
if (isset($_SESSION['cart'][$item_id])) {
    // update the quantity of the item
} else {
    // add the item to the cart
}

// calculate the total cost of the items in the cart
$total = 0;

foreach ($_SESSION['cart'] as $item) {
    $total += $item['quantity'] * $item['price'];
}

?>
