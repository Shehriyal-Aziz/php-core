<?php
session_start();

$id = $_POST['id'];

if (isset($_SESSION['cart'][$id])) {
  unset($_SESSION['cart'][$id]);
}

// Calculate total
$total = 0;
$itemCount = 0;
foreach ($_SESSION['cart'] as $item) {
  $total += $item['price'] * $item['quantity'];
  $itemCount += $item['quantity'];
}

// Show updated cart items
if (empty($_SESSION['cart'])) {
  echo "<div class='text-center text-gray-400 py-8'>Your cart is empty</div>";
} else {
  foreach ($_SESSION['cart'] as $item) {
    echo "
      <div class='flex items-start space-x-3 border-b border-gray-800 pb-4'>
        <img src='{$item['img']}' class='w-16 h-16 rounded-lg object-cover'>
        <div class='flex-1'>
          <h4 class='text-sm font-semibold text-white mb-1'>{$item['name']}</h4>
          <p class='text-purple-500 font-bold text-sm'>\${$item['price']}</p>
          
          <!-- Quantity Controls -->
          <div class='flex items-center space-x-2 mt-2'>
            <button onclick='updateCart({$item['id']}, \"dec\")' 
              class='w-7 h-7 rounded bg-gray-700 hover:bg-gray-600 text-white flex items-center justify-center text-lg'>
              −
            </button>
            <span class='text-white font-semibold px-3'>{$item['quantity']}</span>
            <button onclick='updateCart({$item['id']}, \"inc\")' 
              class='w-7 h-7 rounded bg-gray-700 hover:bg-gray-600 text-white flex items-center justify-center text-lg'>
              +
            </button>
          </div>
        </div>
        
        <!-- Remove Button -->
        <button onclick='removeFromCart({$item['id']})' 
          class='text-red-400 hover:text-red-300 p-1' title='Remove'>
          <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12' />
          </svg>
        </button>
      </div>
    ";
  }
  
  // Show total
  echo "
    <div class='mt-4 pt-4 border-t border-gray-700'>
      <div class='flex justify-between items-center'>
        <span class='text-gray-400 font-semibold'>Total:</span>
        <span class='text-white font-bold text-xl'>\$" . number_format($total, 2) . "</span>
      </div>
    </div>
  ";
}

// Return item count for badge update
echo "<span id='cartCount' style='display:none;'>$itemCount</span>";