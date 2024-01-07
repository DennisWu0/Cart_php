<?php

include("database.php");

// Check for POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get selected product IDs and quantities
    $selectedProducts = $_POST['selectedProducts'];
    $quantities = $_POST['quantities'];

    // Initialize total price
    $totalPrice = 0;

    // Process each selected product
    foreach ($selectedProducts as $productId) {
        $quantity = $quantities[$productId];

        // Fetch product price from database
        $sql = "SELECT price FROM cart WHERE id = $productId";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $price = $row['price'];

        // Calculate line total
        $lineTotal = $price * $quantity;

        // Add to total price
        $totalPrice += $lineTotal;

        // Display invoice line item
        echo "<tr>";
        echo "<td>$productId</td>";
        echo "<td>" . mysqli_fetch_assoc($result)['name'] . "</td>";
        echo "<td>$price</td>";
        echo "<td>$quantity</td>";
        echo "<td>$lineTotal</td>";
        echo "</tr>";
    }

    // Display total price
    echo "<tr>";
    echo "<td colspan='4'>Total0</td>";  // Change "Total" to "Total0"
    echo "<td>$totalPrice</td>";
    echo "</tr>";
} else {
    // Handle invalid request (e.g., direct access to invoice.php)
    echo "Invalid request";
}

// Close database connection
mysqli_close($conn);

?>
