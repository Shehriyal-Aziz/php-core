<?php
// admin/order_details.php
include('../connect.php');
include '../includes/header.php';
include 'sidebar.php';

// Try to get the order id from GET (and fallback to REQUEST if necessary)
$order_id = null;
if (isset($_GET['id']) && trim($_GET['id']) !== '') {
    $order_id = (int) $_GET['id'];
} elseif (isset($_REQUEST['id']) && trim($_REQUEST['id']) !== '') {
    $order_id = (int) $_REQUEST['id'];
}

// Friendly fallback if no id provided
if (!$order_id) {
    ?>
    
    <div class="ml-64 p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">
      <div class="bg-[#141824] p-6 rounded-2xl border border-gray-800 max-w-2xl">
        <h2 class="text-xl font-semibold text-red-400 mb-4">Invalid order ID</h2>
        <p class="text-gray-300 mb-4">No <code>id</code> was passed to this page. Make sure you opened the order from the orders list.</p>
        <p class="text-gray-400 mb-4">Quick checks:</p>
        <ul class="list-disc ml-6 text-gray-400">
          <li>Open the orders list: <a href="orders.php" class="text-purple-400 hover:underline">orders.php</a></li>
          <li>Make sure the "View Details" link is <code>order_details.php?id=ORDER_ID</code></li>
        </ul>
        <div class="mt-6">
          <a href="orders.php" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-lg text-white font-semibold">Back to Orders</a>
        </div>
      </div>
    </div>
    <?php
    include '../includes/footer.php';
    exit;
}

// Fetch order safely
$order_q = mysqli_query($connection, "SELECT * FROM orders WHERE id = {$order_id} LIMIT 1");
if (!$order_q || mysqli_num_rows($order_q) === 0) {
    ?>
    <div class="ml-64 p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">
      <div class="bg-[#141824] p-6 rounded-2xl border border-gray-800 max-w-2xl">
        <h2 class="text-xl font-semibold text-red-400 mb-4">Order not found</h2>
        <p class="text-gray-300 mb-4">There is no order with ID <span class="text-white font-semibold">#<?php echo htmlspecialchars($order_id); ?></span>.</p>
        <div class="mt-6">
          <a href="orders.php" class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-lg text-white font-semibold">Back to Orders</a>
        </div>
      </div>
    </div>
    <?php
    include '../includes/footer.php';
    exit;
}

$order = mysqli_fetch_assoc($order_q);

// Fetch items
$items_q = mysqli_query($connection, "SELECT * FROM order_items WHERE order_id = {$order_id}");
?>

<div class="ml-64" >  
<div class=" p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">
  <h1 class="text-3xl font-bold text-purple-400 mb-6">Order #<?php echo $order['id']; ?></h1>

  <!-- Order Info -->
  <div class="bg-[#141824] rounded-2xl p-6 border border-gray-800 mb-8">
    <h2 class="text-xl font-semibold mb-4 text-purple-300">Customer Details</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-300">
      <p><span class="font-semibold text-white">Name:</span> <?php echo htmlspecialchars($order['name']); ?></p>
      <p><span class="font-semibold text-white">Email:</span> <?php echo htmlspecialchars($order['email']); ?></p>
      <p><span class="font-semibold text-white">Phone:</span> <?php echo htmlspecialchars($order['phone']); ?></p>
      <div class="sm:col-span-2">
        <p class="font-semibold text-white">Address:</p>
        <p class="text-gray-300"><?php echo nl2br(htmlspecialchars($order['address'])); ?></p>
      </div>
    </div>
    <div class="mt-4 text-gray-400 text-sm">
      <p><span class="font-semibold text-white">Order Date:</span> <?php echo date('M d, Y h:i A', strtotime($order['created_at'])); ?></p>
      <p><span class="font-semibold text-white">Payment Method:</span> Cash on Delivery</p>
    </div>
  </div>

  <!-- Order Items -->
  <div class="bg-[#141824] rounded-2xl p-6 border border-gray-800">
    <h2 class="text-xl font-semibold mb-4 text-purple-300">Ordered Products</h2>
    <table class="w-full text-left border-collapse text-sm">
      <thead>
        <tr class="border-b border-gray-700 text-gray-400">
          <th class="py-2">Product Name</th>
          <th class="py-2">Quantity</th>
          <th class="py-2">Price</th>
          <th class="py-2">Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $grand_total = 0;
        while ($item = mysqli_fetch_assoc($items_q)) {
          $subtotal = $item['price'] * $item['quantity'];
          $grand_total += $subtotal;
        ?>
        <tr class="border-b border-gray-800 hover:bg-[#1a1e2a]">
          <td class="py-2"><?php echo htmlspecialchars($item['product_name']); ?></td>
          <td class="py-2"><?php echo (int)$item['quantity']; ?></td>
          <td class="py-2">$<?php echo number_format($item['price'], 2); ?></td>
          <td class="py-2">$<?php echo number_format($subtotal, 2); ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

    <div class="text-right mt-6">
      <h3 class="text-lg font-semibold text-purple-400">
        Total: $<?php echo number_format($grand_total, 2); ?>
      </h3>
    </div>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
</div>
 </div>