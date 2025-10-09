 <?php
  ob_start();
  session_start();
  include 'connect.php';
  include 'includes/header.php'; ?>

 <!-- Hero Section -->
 <section class="relative min-h-screen flex flex-col justify-center overflow-hidden bg-gradient-to-br from-[#0B0D17] to-[#111827]">
   <!-- Background circles -->
   <div class="absolute inset-0 overflow-hidden">
     <div class="absolute top-1/4 left-10 w-72 h-72 bg-crypto-purple/10 rounded-full blur-3xl animate-pulse"></div>
     <div class="absolute bottom-1/4 right-10 w-96 h-96 bg-purple-400/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>
   </div>

   <div class="container mx-auto px-4 py-20 relative z-10">
     <div class="flex flex-col lg:flex-row items-center">
       <!-- Left Content -->
       <div class="lg:w-1/2">
         <div class="inline-flex items-center bg-white/5 border border-white/10 rounded-full px-4 py-1.5 mb-6">
           <span class="text-xs font-medium text-crypto-purple mr-2">New Feature</span>
           <span class="text-xs text-gray-300">AI-Powered Trading Signals</span>
           <i data-lucide="chevron-right" class="h-4 w-4 text-gray-400 ml-1"></i>
         </div>

         <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
           <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Trade Crypto</span>
           with Confidence & Clarity
         </h1>

         <p class="text-lg text-gray-300 mb-8 max-w-lg">
           Experience seamless cryptocurrency trading with real-time analytics, AI-powered insights, and zero commission fees.
         </p>

         <div class="flex flex-col sm:flex-row gap-4">
           <a href="#!" class="flex items-center justify-center bg-crypto-purple hover:bg-crypto-dark-purple text-white px-8 py-4 rounded-lg">
             Start Trading <i data-lucide="arrow-right" class="ml-2 h-5 w-5"></i>
           </a>
           <a href="#!" class="flex items-center justify-center border border-gray-700 text-white hover:bg-white/5 px-8 py-4 rounded-lg">
             View Demo <i data-lucide="arrow-up-right" class="ml-2 h-5 w-5"></i>
           </a>
         </div>
       </div>

       <!-- Right Content (Image + Floating cards) -->
       <div class="lg:w-1/2 mt-12 lg:mt-0 relative">
         <div class="relative max-w-md mx-auto">
           <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?auto=format&fit=crop&h=800"
             alt="Trading dashboard"
             class="rounded-xl shadow-2xl border border-white/10" />
         </div>
       </div>
     </div>
   </div>
 </section>

 <!-- featured product -->

 <section>
   <section class="min-h-screen bg-[#0B0D17] flex flex-col items-center pt-28 pb-16">

     <div class="w-full max-w-7xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 px-6">

       <?php

        $store = mysqli_query($connection, "SELECT * FROM home_card");

        while ($main = mysqli_fetch_array($store)) {
        ?>

         <div
           class="bg-[#12141C] border border-gray-800 rounded-2xl shadow-md hover:shadow-purple-500/20 
              transition duration-300 p-5 w-full hover:scale-[1.02]">

           <img src="home_card/<?php echo htmlspecialchars($main['h_img']); ?>"
             alt="<?php echo htmlspecialchars($main['h_name']); ?>"
             class="w-full h-48 sm:h-52 md:h-56 lg:h-60 object-cover rounded-xl mb-4">

           <h3 class="text-lg font-semibold text-white mb-1 truncate">
             <?php echo htmlspecialchars($main['h_name']); ?>
           </h3>

           <p class="text-gray-400 text-sm mb-4 line-clamp-2">
             <?php echo htmlspecialchars($main['h_desc']); ?>
           </p>

           <div class="flex items-center justify-between">
             <span class="text-lg font-bold text-purple-500">
               $<?php echo htmlspecialchars($main['h_price']); ?>
             </span>
             <!-- cart take to sproduct.php -->
             <a href="sproduct.php?id=<?php echo $main['h_id']; ?>"
               class="p-2 rounded-full border-2 border-purple-600 text-purple-600 
                  hover:bg-purple-600 hover:text-white transition-all duration-200
                  flex items-center justify-center"
               title="View Product">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                 <path stroke-linecap="round" stroke-linejoin="round"
                   d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437m0 0L6.75 13.5h10.5l2.25-8.228H5.106m0 0L4.5 4.5m2.25 15a.75.75 0 100-1.5.75.75 0 000 1.5zm9 0a.75.75 0 100-1.5.75.75 0 000 1.5z" />
               </svg>
             </a>
           </div>
         </div>

       <?php } ?>

     </div>

   </section>
 </section>

 <?php
  include 'includes/footer.php';
  ?>