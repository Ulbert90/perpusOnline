<?php
session_start();
session_unset();
session_destroy();

header("Location: index.php");
exit();
?>











<?php
// Assuming you have a database connection
$koneksi = mysqli_connect("localhost", "username", "password", "database");

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Your SQL query with INNER JOIN
$query = "SELECT orders.order_id, customers.customer_name, orders.order_date
          FROM orders
          INNER JOIN customers ON orders.customer_id = customers.customer_id";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($koneksi));
}

// Process the result set
while ($row = mysqli_fetch_assoc($result)) {
    // Access the columns using $row['column_name']
    echo "Order ID: " . $row['order_id'] . "<br>";
    echo "Customer Name: " . $row['customer_name'] . "<br>";
    echo "Order Date: " . $row['order_date'] . "<br>";
    echo "<hr>";
}

// Close the connection
mysqli_close($koneksi);
?>