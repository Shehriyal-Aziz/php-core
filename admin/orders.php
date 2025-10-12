<?php
include('../connect.php');
include '../includes/header.php';
include 'sidebar.php';
?>
<div class="ml-64" >
<div class=" p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">
    <h1 class="text-3xl font-bold text-purple-400 mb-8">All Orders</h1>

    <?php
    $orders = mysqli_query($connection, "SELECT * FROM orders ORDER BY id DESC");

    if (mysqli_num_rows($orders) == 0) {
        echo "<div class='text-gray-400'>No orders yet.</div>";
    } else {
        while ($order = mysqli_fetch_assoc($orders)) {
            $order_id = $order['id'];
            $items = mysqli_query($connection, "SELECT * FROM order_items WHERE order_id = $order_id");
            $total_items = mysqli_num_rows($items);
    ?>

            <div class="bg-[#141824] rounded-2xl shadow-lg mb-6 overflow-hidden border border-gray-800">
                <div class="p-5 flex justify-between items-center cursor-pointer" onclick="toggleItems(<?php echo $order_id; ?>)">
                    <div>
                        <h2 class="text-lg font-semibold text-white">Order #<?php echo $order['id']; ?></h2>
                        <p class="text-gray-400 text-sm">
                            <?php echo htmlspecialchars($order['name']); ?> |
                            <?php echo htmlspecialchars($order['email']); ?> |
                            <?php echo htmlspecialchars($order['phone']); ?>
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-purple-400 font-bold text-lg">$<?php echo number_format($order['total'], 2); ?></p>
                        <p class="text-gray-400 text-sm"><?php echo date('M d, Y h:i A', strtotime($order['created_at'])); ?></p>
                    </div>
                </div>

                <div id="items-<?php echo $order_id; ?>" class="hidden border-t border-gray-700 bg-[#0F111A]">
                    <div class="p-4">
                        <h3 class="text-purple-400 font-semibold mb-3">Items (<?php echo $total_items; ?>)</h3>
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="border-b border-gray-700 text-gray-400">
                                    <th class="py-2">Product Name</th>
                                    <th class="py-2">Quantity</th>
                                    <th class="py-2">Price</th>
                                    <th class="py-2">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($item = mysqli_fetch_assoc($items)) { ?>
                                    <tr class="border-b border-gray-800 hover:bg-[#1a1e2a]">
                                        <td class="py-2"><?php echo htmlspecialchars($item['product_name']); ?></td>
                                        <td class="py-2"><?php echo $item['quantity']; ?></td>
                                        <td class="py-2">$<?php echo number_format($item['price'], 2); ?></td>
                                        <td class="py-2">$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="flex justify-end mt-4">
                            <a href="order_details.php?id=<?php echo $order_id; ?>"
                                class="bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-lg text-white font-semibold text-sm">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        }
    }
    ?>

</div>
<?php include '../includes/footer.php'; ?>

</div>

<script>
    function toggleItems(orderId) {
        const section = document.getElementById(`items-${orderId}`);
        section.classList.toggle('hidden');
    }
</script>
