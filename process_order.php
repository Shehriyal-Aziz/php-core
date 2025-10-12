<?php
session_start();
include('connect.php'); // make sure this points correctly to your DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic validation
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "<script>alert('Your cart is empty.'); window.location.href='product.php';</script>";
        exit;
    }

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);

    // Calculate total
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Insert into orders
    $query = "INSERT INTO orders (name, email, phone, address, total) VALUES ('$name', '$email', '$phone', '$address', '$total')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $order_id = mysqli_insert_id($connection);

        // Insert order items
        foreach ($_SESSION['cart'] as $item) {
            $pname = mysqli_real_escape_string($connection, $item['name']);
            $qty = $item['quantity'];
            $price = $item['price'];

            $q2 = "INSERT INTO order_items (order_id, product_name, quantity, price)
                   VALUES ('$order_id', '$pname', '$qty', '$price')";
            mysqli_query($connection, $q2);
        }

        // Clear cart after success
        unset($_SESSION['cart']);

        // Redirect to success page
        header("Location: order_success.php?id=" . $order_id);
        exit;
    } else {
        echo "<script>alert('Something went wrong while placing your order.'); window.history.back();</script>";
    }
} else {
    header("Location: checkout.php");
    exit;
}
?>
