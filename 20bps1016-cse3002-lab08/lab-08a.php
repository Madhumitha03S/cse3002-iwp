<!DOCTYPE html>
<html>
  <head>
    <title>Price Analysis</title>
  </head>
  <body>
    <h1>Price Analysis</h1>
    <form method="post" action="">
      <label for="price">Enter the price:</label>
      <input type="number" name="price" step="0.01" required>
      <button type="submit" name="submit">Add</button>
    </form>

    <?php
      // Initialize the counters and totals
      $integerCount = 0;
      $integerTotal = 0;
      $floatCount = 0;
      $floatTotal = 0;

      // Check if the form has been submitted
      if (isset($_POST['submit'])) {
        // Get the price from the form and round to 2 decimal places
        $price = round(floatval($_POST['price']), 2);

        // Check if the price is an integer or a float
        if (is_int($price)) {
          $integerCount++;
          $integerTotal += $price;
        } else {
          $floatCount++;
          $floatTotal += $price;
        }
      }

      // Display the results
      echo "<h2>Price Summary</h2>";
      echo "<p>Number of integer amounts: $integerCount</p>";
      echo "<p>Total integer amount: $integerTotal</p>";
      echo "<p>Number of floating point amounts: $floatCount</p>";
      echo "<p>Total floating point amount: $floatTotal</p>";
    ?>
  </body>
</html>
