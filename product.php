 <?php
    ob_start();
    session_start();
    include 'includes/header.php'; ?>

 <section class="min-h-screen bg-[#0B0D17] flex flex-col items-center pt-28 pb-16">
  <h1 class="text-3xl font-bold text-white mb-10">Our Products</h1>

  <div
    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 
           gap-6 sm:gap-8 xl:gap-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full">

    <!-- product card -->
    <div
      class="bg-[#12141C] border border-gray-800 rounded-2xl shadow-md hover:shadow-purple-500/20 
             transition duration-300 p-5 w-full hover:scale-[1.02]">

      <img src="https://images.unsplash.com/photo-1752610877644-c83e616d9fd3?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0"
           alt="Soft Cotton Bedsheet"
           class="w-full h-48 sm:h-52 md:h-56 lg:h-60 object-cover rounded-xl mb-4">

      <h3 class="text-lg font-semibold text-white mb-1 truncate">Soft Cotton Bedsheet</h3>
      <p class="text-gray-400 text-sm mb-4 line-clamp-2">
        Luxurious soft-touch cotton with elegant design — perfect for every bedroom.
      </p>

      <div class="flex items-center justify-between">
        <span class="text-lg font-bold text-purple-500">$45.00</span>

        <!-- Outlined Cart Button -->
        <button
          class="p-2 rounded-full border-2 border-purple-600 text-purple-600 
                 hover:bg-purple-600 hover:text-white transition-all duration-200
                 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
               stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437m0 0L6.75 13.5h10.5l2.25-8.228H5.106m0 0L4.5 4.5m2.25 15a.75.75 0 100-1.5.75.75 0 000 1.5zm9 0a.75.75 0 100-1.5.75.75 0 000 1.5z" />
          </svg>
        </button>
      </div>
    </div>

  </div>
</section>


 <?php

    include 'includes/footer.php';
    ?>