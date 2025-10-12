<?php
session_start();

// If cart empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
  echo "
  <div class='min-h-screen flex items-center justify-center bg-[#0B0D17] text-gray-400'>
    <p>Your cart is empty. <a href='product.php' class='text-purple-500 hover:underline'>Shop now</a></p>
  </div>";
  exit;
}

// Calculate totals
$total = 0;
foreach ($_SESSION['cart'] as $item) {
  $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout | CryptoFlow</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg-crypto-purple { background-color: #9b5cff; }
    .hover\:bg-crypto-dark-purple:hover { background-color: #7c47cc; }
  </style>
</head>

<body class="bg-[#0B0D17] text-white min-h-screen">

  <div class="container mx-auto px-4 py-16 max-w-5xl">
    <h1 class="text-3xl font-bold mb-10 text-center text-purple-400">Checkout</h1>

    <div class="grid md:grid-cols-2 gap-10">
      <!-- Left Side: Customer Info -->
      <div class="bg-[#141824] p-6 rounded-2xl shadow-lg border border-gray-800">
        <h2 class="text-xl font-semibold mb-4">Billing Details</h2>
        <form id="checkoutForm" action="process_order.php" method="POST" class="space-y-4">
          <div>
            <label class="block mb-1 text-gray-300">Full Name</label>
            <input name="name" required class="w-full p-3 rounded-lg bg-gray-800 border border-gray-700 text-white" placeholder="John Doe">
          </div>

          <div>
            <label class="block mb-1 text-gray-300">Email</label>
            <input type="email" name="email" required class="w-full p-3 rounded-lg bg-gray-800 border border-gray-700 text-white" placeholder="john@example.com">
          </div>

          <div>
            <label class="block mb-1 text-gray-300">Phone Number</label>
            <input type="text" name="phone" required class="w-full p-3 rounded-lg bg-gray-800 border border-gray-700 text-white" placeholder="+92 300 1234567">
          </div>

          <div>
            <label class="block mb-1 text-gray-300">Shipping Address</label>
            <textarea name="address" required rows="3" class="w-full p-3 rounded-lg bg-gray-800 border border-gray-700 text-white" placeholder="Street, City, Country"></textarea>
          </div>

          <button type="submit" class="w-full bg-crypto-purple hover:bg-crypto-dark-purple text-white py-3 rounded-lg font-semibold transition-all">
            Place Order
          </button>
        </form>
      </div>

      <!-- Right Side: Order Summary -->
      <div class="bg-[#141824] p-6 rounded-2xl shadow-lg border border-gray-800">
        <h2 class="text-xl font-semibold mb-4">Your Order</h2>

        <div class="space-y-4 mb-6 max-h-80 overflow-y-auto">
          <?php foreach ($_SESSION['cart'] as $item): ?>
            <div class="flex justify-between items-center border-b border-gray-700 pb-3">
              <div>
                <p class="font-semibold text-sm"><?php echo htmlspecialchars($item['name']); ?></p>
                <p class="text-gray-400 text-xs">Qty: <?php echo $item['quantity']; ?></p>
              </div>
              <p class="text-purple-400 font-semibold">$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></p>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="flex justify-between items-center pt-4 border-t border-gray-700">
          <span class="font-semibold text-gray-300">Total:</span>
          <span class="text-2xl font-bold text-white">$<?php echo number_format($total, 2); ?></span>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
