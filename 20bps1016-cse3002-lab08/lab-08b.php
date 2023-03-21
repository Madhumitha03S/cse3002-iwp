<!DOCTYPE html>
<html>
  <head>
    <title>BSNL 4G Data Usage Charges</title>
  </head>
  <body>
    <h1>BSNL 4G Data Usage Charges</h1>
    <form method="post" action="">
      <label for="customer_number">Customer Number:</label>
      <input type="text" name="customer_number" required><br><br>
      <label for="data_usage">Data Usage in GBs:</label>
      <input type="number" name="data_usage" required><br><br>
      <button type="submit" name="submit">Calculate Charges</button>
    </form>

    <?php
      // Check if the form has been submitted
      if (isset($_POST['submit'])) {
        // Get the customer number and data usage from the form
        $customer_number = $_POST['customer_number'];
        $data_usage = floatval($_POST['data_usage']);

        // Calculate the charges based on the data usage
        if ($data_usage <= 200) {
          $charges = 350;
        } elseif ($data_usage <= 500) {
          $charges = 500 + (($data_usage - 200) * 0.3);
        } elseif ($data_usage <= 1000) {
          $charges = 750 + (($data_usage - 500) * 0.5);
        } else {
          $charges = 1000;
        }

        // Display the amount to be paid by the customer
        echo "<h2>Amount to be Paid</h2>";
        echo "<p>Customer Number: $customer_number</p>";
        echo "<p>Data Usage: $data_usage GBs</p>";
        echo "<p>Charges: Rs. $charges</p>";
      }
    ?>
  </body>
</html>
