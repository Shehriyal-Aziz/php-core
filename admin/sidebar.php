<?php
ob_start();
include '../session.php';
?>

<aside class="fixed top-0 left-0 h-full w-64 bg-[#12141C] border-r border-white/10 flex flex-col">
  <!-- Logo / Brand -->
  <div class="h-16 flex items-center justify-center border-b border-white/10 relative">
    <h1 class="absolute top-2 left-8 text-xl font-bold text-white">
      Admin<span class="text-crypto-purple">Panel</span>
    </h1>

  </div>


  <!-- Navigation -->
  <!-- Sidebar Navigation -->
  <nav class="flex-1 p-4 space-y-2">
    <a href="/php-core/admin/index.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard-icon lucide-layout-dashboard">
        <rect width="7" height="9" x="3" y="3" rx="1" />
        <rect width="7" height="5" x="14" y="3" rx="1" />
        <rect width="7" height="9" x="14" y="12" rx="1" />
        <rect width="7" height="5" x="3" y="16" rx="1" />
      </svg><span class="ml-3">Dashboard</span>
    </a>
    <a href="/php-core/index.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house-icon lucide-house">
        <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
        <path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
      </svg> <span class="ml-3">Homepage</span>
    </a>
    <a href="/php-core/admin/users.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
      👤 <span class="ml-3">Users</span>
    </a>
    <a href="/php-core/admin/orders.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
      👤 <span class="ml-3">Orders</span>
    </a>
    <a href="/php-core/admin/feedback_report.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square-icon lucide-message-square">
        <path d="M22 17a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 21.286V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2z" />
      </svg><span class="ml-3">Feedback</span>
    </a>
    <a href="/php-core/admin/contact_report.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-inbox-icon lucide-inbox">
        <polyline points="22 12 16 12 14 15 10 15 8 12 2 12" />
        <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
      </svg> <span class="ml-3">Contact</span>
    </a>

    <!-- Normal Upload Link -->
    <a href="/php-core/admin/viewupload.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-up-icon lucide-folder-up">
        <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z" />
        <path d="M12 10v6" />
        <path d="m9 13 3-3 3 3" />
      </svg> <span class="ml-3">Uploads</span>
    </a>

    <!-- Components Dropdown -->
    <div class=" space-y-1">
      <button onclick="toggleDropdown('componentsDropdown')"
        class="w-full flex items-center justify-between px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">

        <span class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-component-icon lucide-component">
            <path d="M15.536 11.293a1 1 0 0 0 0 1.414l2.376 2.377a1 1 0 0 0 1.414 0l2.377-2.377a1 1 0 0 0 0-1.414l-2.377-2.377a1 1 0 0 0-1.414 0z" />
            <path d="M2.297 11.293a1 1 0 0 0 0 1.414l2.377 2.377a1 1 0 0 0 1.414 0l2.377-2.377a1 1 0 0 0 0-1.414L6.088 8.916a1 1 0 0 0-1.414 0z" />
            <path d="M8.916 17.912a1 1 0 0 0 0 1.415l2.377 2.376a1 1 0 0 0 1.414 0l2.377-2.376a1 1 0 0 0 0-1.415l-2.377-2.376a1 1 0 0 0-1.414 0z" />
            <path d="M8.916 4.674a1 1 0 0 0 0 1.414l2.377 2.376a1 1 0 0 0 1.414 0l2.377-2.376a1 1 0 0 0 0-1.414l-2.377-2.377a1 1 0 0 0-1.414 0z" />
          </svg> <span class="ml-1">Components</span>
        </span>

        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" id="componentsArrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="m6 9 6 6 6-6" />
        </svg>
      </button>


      <div id="componentsDropdown" class="hidden ml-4 space-y-1">
        <!-- Home Dropdown -->
        <button onclick="toggleDropdown('homeDropdown')"
          class="w-full flex items-center justify-between px-4 py-2 text-sm text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
          <span class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house-icon lucide-house">
              <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
              <path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
            </svg> <span class="ml-1">Home</span>
          </span>


          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" id="homeArrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="m6 9 6 6 6-6" />
          </svg>
        </button>

        <div id="homeDropdown" class="hidden ml-6 space-y-1">
          <a href="/php-core/admin/home_card.php" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hammer-icon lucide-hammer">
              <path d="m15 12-9.373 9.373a1 1 0 0 1-3.001-3L12 9" />
              <path d="m18 15 4-4" />
              <path d="m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172v-.344a2 2 0 0 0-.586-1.414l-1.657-1.657A6 6 0 0 0 12.516 3H9l1.243 1.243A6 6 0 0 1 12 8.485V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5" />
            </svg> <span>Card</span>
          </a>

        </div>

        <!-- Product Dropdown -->
        <button onclick="toggleDropdown('productDropdown')"
          class="w-full flex items-center justify-between px-4 py-2 text-sm text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
          <span class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-box-icon lucide-box"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg> <span class="ml-1">Product</span>
          </span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" id="productArrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="m6 9 6 6 6-6" />
          </svg>
        </button>

        <div id="productDropdown" class="hidden ml-6 space-y-1">
          <a href="/php-core/admin/product_card.php" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hammer-icon lucide-hammer">
              <path d="m15 12-9.373 9.373a1 1 0 0 1-3.001-3L12 9" />
              <path d="m18 15 4-4" />
              <path d="m21.5 11.5-1.914-1.914A2 2 0 0 1 19 8.172v-.344a2 2 0 0 0-.586-1.414l-1.657-1.657A6 6 0 0 0 12.516 3H9l1.243 1.243A6 6 0 0 1 12 8.485V10l2 2h1.172a2 2 0 0 1 1.414.586L18.5 14.5" />
            </svg> <span>Card</span>
          </a>
        </div>
      </div>
    </div>
  </nav>


  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();

    function toggleDropdown(id) {
      const dropdown = document.getElementById(id);
      const arrow = dropdown.previousElementSibling.querySelector("svg");
      dropdown.classList.toggle("hidden");
      arrow.classList.toggle("rotate-180");
    }
    // simple click toggles (mobile-friendly)
    document.addEventListener('DOMContentLoaded', () => {
      const compToggle = document.getElementById('components-toggle');
      const compMenu = document.getElementById('components-menu');

      compToggle.addEventListener('click', () => {
        compMenu.classList.toggle('hidden');
        const expanded = (!compMenu.classList.contains('hidden')).toString();
        compToggle.setAttribute('aria-expanded', expanded);
        compToggle.querySelector('svg')?.classList.toggle('rotate-180');
      });

      document.querySelectorAll('[data-toggle]').forEach(btn => {
        btn.addEventListener('click', () => {
          const id = btn.getAttribute('data-toggle');
          const el = document.getElementById(id);
          if (!el) return;
          const isNowHidden = el.classList.toggle('hidden'); // returns true if class is now present
          btn.setAttribute('aria-expanded', (!isNowHidden).toString());
          btn.querySelector('svg')?.classList.toggle('rotate-180');
        });
      });
    });
  </script>

  <!-- Logout -->
  <div class="p-4 border-t border-white/10">
    <form method="post">
      <button type="submit" name="logoutbtn" class="w-full flex items-center justify-center px-4 py-2 bg-crypto-purple hover:bg-crypto-dark-purple text-white rounded-lg font-medium">
        🚪 Logout
      </button>
    </form>
    <?php

    if (isset($_POST['logoutbtn'])) {
      session_destroy();
      header("location:/php-core/index.php");
      exit;
    }
    ?>
  </div>
</aside>