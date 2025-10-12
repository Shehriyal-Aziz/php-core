<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CryptoFlow</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    .text-crypto-purple {
      color: #9b5cff;
    }

    .hover\:text-crypto-purple:hover {
      color: #9b5cff;
    }

    .bg-crypto-purple {
      background-color: #9b5cff;
    }

    .hover\:bg-crypto-dark-purple:hover {
      background-color: #7c47cc;
    }
  </style>
</head>

<body class="bg-[#0B0D17] text-white">

  <!-- Navbar -->
  <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 py-6 bg-[#0B0D17]/90 backdrop-blur-md">
    <div class="container mx-auto px-4 flex justify-between items-center">
      
      <!-- Logo -->
      <div class="flex items-center">
        <h1 class="text-2xl font-bold text-white">
          Crypto<span class="text-crypto-purple">Flow</span>
        </h1>
      </div>

      <!-- Desktop Menu -->
      <ul class="hidden lg:flex items-center space-x-8">
        <li><a href="/php-core/index.php" class="text-gray-300 hover:text-white transition-colors">Home</a></li>
        <li><a href="/php-core/feedback.php" class="text-gray-300 hover:text-white transition-colors">Feedback</a></li>
        <li><a href="/php-core/contact.php" class="text-gray-300 hover:text-white transition-colors">Contact</a></li>
        <li><a href="/php-core/upload.php" class="text-gray-300 hover:text-white transition-colors">Upload</a></li>
        <li><a href="/php-core/product.php" class="text-gray-300 hover:text-white transition-colors">Product</a></li>
      </ul>

      <!-- Right Side (Icons + Mobile Menu Button) -->
      <div class="flex items-center space-x-4">
        <!-- Cart Icon -->
        <button id="cartBtn" class="p-2 rounded-lg group relative">
          <i data-lucide="shopping-bag"
            class="w-5 h-5 text-white hover:text-purple-500 transition-all duration-300"></i>
          <span
            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
        </button>

        <!-- User Icon -->
        <a href="/php-core/admin/index.php"
          class="hover:text-purple-500 p-2 rounded-lg flex items-center justify-center">
          <i data-lucide="user" class="w-5 h-5"></i>
        </a>

        <!-- Mobile Menu Button -->
        <button id="mobileMenuBtn" class="lg:hidden text-white">
          <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
      class="hidden lg:hidden bg-[#141824]/95 backdrop-blur-md absolute top-full left-0 w-full py-4 shadow-lg rounded-b-xl">
      <div class="container mx-auto px-4">
        <ul class="flex flex-col space-y-4">
          <li><a href="/php-core/index.php" class="text-gray-300 hover:text-white transition-colors block py-2">Home</a></li>
          <li><a href="/php-core/feedback.php" class="text-gray-300 hover:text-white transition-colors block py-2">Feedback</a></li>
          <li><a href="/php-core/contact.php" class="text-gray-300 hover:text-white transition-colors block py-2">Contact</a></li>
          <li><a href="/php-core/upload.php" class="text-gray-300 hover:text-white transition-colors block py-2">Upload</a></li>
          <li><a href="/php-core/product.php" class="text-gray-300 hover:text-white transition-colors block py-2">Product</a></li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- 🛒 Cart Sidebar -->
<div id="cartSidebar"
  class="fixed top-0 right-0 w-80 sm:w-96 h-full bg-[#12141C] shadow-2xl border-l border-gray-800 transform translate-x-full transition-transform duration-300 z-[1000]">
  <div class="p-4 border-b border-gray-700 flex justify-between items-center">
    <h2 class="text-xl font-semibold text-white">Your Cart</h2>
    <button onclick="closeCart()" class="text-gray-400 hover:text-white">✕</button>
  </div>
  <div id="cartItems" class="p-4 space-y-4 overflow-y-auto max-h-[75vh]"></div>
  <div class="p-4 border-t border-gray-700">
    <a href="checkout.php"
      class="block w-full text-center bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg font-semibold">
      Checkout
    </a>
  </div>
</div>
<script>
  // redirect to single product page
  function openProduct(id) {
    window.location.href = `sproduct.php?id=${id}`;
  }

  // add to cart
  function addToCart(button) {
    const card = button.closest("[data-id]");
    const product = {
      id: card.dataset.id,
      name: card.dataset.name,
      price: card.dataset.price,
      img: card.dataset.img
    };

    // send product data to PHP using fetch
    fetch('add_to_cart.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams(product)
    })
      .then(res => res.text())
      .then(html => {
        document.getElementById("cartItems").innerHTML = html;
        openCart();
      });
  }

  function openCart() {
    document.getElementById("cartSidebar").classList.remove("translate-x-full");
  }

  function closeCart() {
    document.getElementById("cartSidebar").classList.add("translate-x-full");
  }
</script>

  <script>
  lucide.createIcons();

  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const mobileMenu = document.getElementById('mobileMenu');

  mobileMenu.style.transition = "all 0.3s ease";
  mobileMenu.style.transformOrigin = "top";

  let isOpen = false;

  mobileMenuBtn.addEventListener('click', () => {
    if (!isOpen) {
      // open animation
      mobileMenu.classList.remove('hidden');
      mobileMenu.style.opacity = "0";
      mobileMenu.style.transform = "scaleY(0)";
      setTimeout(() => {
        mobileMenu.style.opacity = "1";
        mobileMenu.style.transform = "scaleY(1)";
      }, 10);

      // change icon to 'X'
      mobileMenuBtn.innerHTML = `<i data-lucide="X" class="w-6 h-6"></i>`;
      lucide.createIcons();
    } else {
      // close animation
      mobileMenu.style.opacity = "0";
      mobileMenu.style.transform = "scaleY(0)";
      setTimeout(() => {
        mobileMenu.classList.add('hidden');
      }, 300);

      // change icon back to menu
      mobileMenuBtn.innerHTML = `<i data-lucide="menu" class="w-6 h-6"></i>`;
      lucide.createIcons();
    }

    isOpen = !isOpen;
  });
</script>

</body>
</html>
