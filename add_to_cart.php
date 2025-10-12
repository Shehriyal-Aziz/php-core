<?php
session_start();

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$img = $_POST['img'];

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

// show updated cart items
foreach ($_SESSION['cart'] as $item) {
  echo "
    <div class='flex items-center space-x-4 border-b border-gray-800 pb-3'>
      <img src='{$item['img']}' class='w-14 h-14 rounded object-cover'>
      <div class='flex-1'>
        <h4 class='text-sm font-semibold text-white'>{$item['name']}</h4>
        <p class='text-gray-400 text-sm'>\${$item['price']} × {$item['quantity']}</p>
      </div>
    </div>
  ";
}
