<?php
session_start();

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$img = $_POST['img'];

if (empty($id) || empty($name) || empty($price) || empty($img)) {
  http_response_code(400);
  header('Content-Type: application/json');
  echo json_encode(['success' => false, 'error' => 'Invalid product data']);
  exit();
}

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$id])) {
  $_SESSION['cart'][$id]['quantity']++;
} else {
  $_SESSION['cart'][$id] = [
    'id' => $id,
    'name' => $name,
    'price' => $price,
    'img' => $img,
    'quantity' => 1
  ];
}

// Calculate total items and price
$totalItems = 0;
$total = 0;
foreach ($_SESSION['cart'] as $item) {
  $totalItems += $item['quantity'];
  $total += $item['price'] * $item['quantity'];
}

// Build cart HTML
$cartHTML = '';

// Show updated cart items
foreach ($_SESSION['cart'] as $item) {
  $cartHTML .= "
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
$cartHTML .= "
  <div class='mt-4 pt-4 border-t border-gray-700'>
    <div class='flex justify-between items-center'>
      <span class='text-gray-400 font-semibold'>Total:</span>
      <span class='text-white font-bold text-xl'>\$" . number_format($total, 2) . "</span>
    </div>
  </div>
";

// Return JSON response
header('Content-Type: application/json');
echo json_encode([
  'success' => true,
  'cartHTML' => $cartHTML,
  'cartCount' => $totalItems
]);