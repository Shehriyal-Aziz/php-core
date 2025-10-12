<?php
include('connect.php');
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$order_id = (int)$_GET['id'];
$order = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM orders WHERE id=$order_id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Success | CryptoFlow</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0B0D17] text-white min-h-screen flex items-center justify-center">

  <div class="bg-[#141824] p-8 rounded-2xl shadow-lg text-center max-w-md w-full">
    <h1 class="text-3xl font-bold text-purple-400 mb-4">Order Placed Successfully!</h1>
    <p class="text-gray-300 mb-6">Thank you, <span class="text-white font-semibold"><?php echo htmlspecialchars($order['name']); ?></span>.</p>
    <p class="text-gray-400 mb-2">Order ID: <span class="text-purple-400 font-medium">#<?php echo $order['id']; ?></span></p>
    <p class="text-gray-400 mb-6">Total: <span class="text-white font-semibold">$<?php echo number_format($order['total'], 2); ?></span></p>

    <a href="product.php" class="bg-purple-600 hover:bg-purple-700 px-6 py-3 rounded-lg text-white font-semibold transition-all">Continue Shopping</a>
  </div>

</body>
</html>
