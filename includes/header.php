<!-- includes/header.php -->
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
    /* Custom colors */
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

    /* .bg-crypto-blue\/80 { background-color: rgba(37, 99, 235, 0.8); }
    .bg-crypto-blue\/95 { background-color: rgba(37, 99, 235, 0.95); } */
  </style>
</head>

<body class="bg-[#0B0D17] text-white">

  <!-- Navbar -->
  <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 py-6">
    <div class="container mx-auto px-4 flex justify-between items-center">
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
        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Pricing</a></li>
        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">FAQ</a></li>
      </ul>

      <!-- Desktop Buttons -->
      <div class="hidden lg:flex items-center space-x-4">
        <a href="/php-core/login.php" class="text-gray-300 hover:text-white transition-colors">Login</a>
        <a href="/php-core/admin/index.php"
          class=" hover:text-purple-500 p-2 rounded-lg flex items-center justify-center">
          <i data-lucide="User" class="w-5 h-5"></i>
        </a>
      </div>

      <!-- Mobile Menu Button -->
      <button id="mobileMenuBtn" class="lg:hidden text-white">
        <i data-lucide="menu" class="w-6 h-6"></i>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden lg:hidden bg-crypto-blue/95 backdrop-blur-lg absolute top-full left-0 w-full py-4 shadow-lg">
      <div class="container mx-auto px-4">
        <ul class="flex flex-col space-y-4">
          <li><a href="#" class="text-gray-300 hover:text-white transition-colors block py-2">Features</a></li>
          <li><a href="/php-core/feedback.php" class="text-gray-300 hover:text-white transition-colors block py-2">Feedback</a></li>
          <li><a href="/php-core/contact.php" class="text-gray-300 hover:text-white transition-colors block py-2">Contact</a></li>
          <li><a href="#" class="text-gray-300 hover:text-white transition-colors block py-2">Pricing</a></li>
          <li><a href="#" class="text-gray-300 hover:text-white transition-colors block py-2">FAQ</a></li>
          <li class="pt-4 flex flex-col space-y-3">
            <a href="/php-core/login.php" class="text-gray-300 hover:text-white transition-colors block">Login</a>
            <a href="/php-core/register.php" class="text-gray-300 hover:text-white transition-colors">Register</a>
            <a href="/php-core/admin/index.php" class="bg-crypto-purple hover:bg-crypto-dark-purple text-white px-4 py-2 rounded-lg text-center"> Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>