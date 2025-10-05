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
  <nav class="flex-1 p-4 space-y-2">
    <a href="/php-core/admin/index.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
      📊 <span class="ml-3">Dashboard</span>
    </a>
    <a href="/php-core/admin/users.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
      👤 <span class="ml-3">Users</span>
    </a>
    <a href="/php-core/admin/feedback_report.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
      💬 <span class="ml-3">Feedback</span>
    </a>
    <a href="/php-core/admin/contact_report.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
      ✉️ <span class="ml-3">Contact</span>
    </a>
    <a href="/php-core/admin/viewupload.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-[#1A1D29] hover:text-white rounded-lg">
        📁 <span class="ml-3">Uploads</span>
    </a>
  </nav>

  <!-- Logout -->
  <div class="p-4 border-t border-white/10">
    <form method="post">
        <button type="submit" name="logoutbtn" class="w-full flex items-center justify-center px-4 py-2 bg-crypto-purple hover:bg-crypto-dark-purple text-white rounded-lg font-medium">
            🚪 Logout
        </button>
    </form>
    <?php

    if(isset($_POST['logoutbtn'])){
        session_destroy();
        header("location:/php-core/index.php");
        exit;
    }
    ?>
</div>
</aside>
