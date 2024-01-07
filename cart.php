<?php

include("database.php");

// Fetch products from the database
$sql = "SELECT * FROM cart";
$result = mysqli_query($conn, $sql);

// Start the HTML table
echo "<table>";
echo "<tr><th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Buy</th>
</tr>";

// Loop through each product
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['name'];
    $price = $row['price'];

    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "<td>$price</td>";

    // Quantity buttons
    echo "<td>";
   
    echo "<input name='quantities' type='number' value='0' class='quantity' data-id='$id'>";
    
    echo "</td>";

    // Buy button
    echo "<td>";
    echo "<input type='checkbox' name='selectedProducts'' class='buy-checkbox' data-id='$id'>";
    echo "<label for='buy-checkbox-$id'></label>";
    echo "</td>";
}

// End the table
echo "</table>";




// Close database connection
mysqli_close($conn);

?>
<form action="invoice.php" method="POST"> <table>
    </table>
<button id="payment" onclick="redirectToInvoice()">Payment</button>
</form>

<script>
const quantityInputs = document.querySelectorAll('.quantity'); quantityInputs.forEach(input => {
    function redirectToInvoice() {
    window.location.href = 'invoice.php';
}
});
</script>