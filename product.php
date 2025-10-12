 <?php
  ob_start();
  session_start();
  include 'connect.php';
  include 'includes/header.php'; ?>

 
<section class="min-h-screen bg-[#0B0D17] flex flex-col items-center pt-28 pb-16">

  <div class="w-full max-w-7xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 px-6">

    <?php
    $store = mysqli_query($connection, "SELECT * FROM product_card");
    while ($main = mysqli_fetch_array($store)) {
    ?>
      <div
        class="bg-[#12141C] border border-gray-800 rounded-2xl shadow-md hover:shadow-purple-500/20 
              transition duration-300 p-5 w-full hover:scale-[1.02] relative cursor-pointer"
        onclick="openProduct(<?php echo $main['p_id']; ?>)"
        data-id="<?php echo $main['p_id']; ?>"
        data-name="<?php echo htmlspecialchars($main['p_name']); ?>"
        data-price="<?php echo htmlspecialchars($main['p_price']); ?>"
        data-img="product_card/<?php echo htmlspecialchars($main['p_img']); ?>"
      >

        <img src="product_card/<?php echo htmlspecialchars($main['p_img']); ?>"
          alt="<?php echo htmlspecialchars($main['p_name']); ?>"
          class="w-full h-48 sm:h-52 md:h-56 lg:h-60 object-cover rounded-xl mb-4">

        <h3 class="text-lg font-semibold text-white mb-1 truncate">
          <?php echo htmlspecialchars($main['p_name']); ?>
        </h3>

        <p class="text-gray-400 text-sm mb-4 line-clamp-2">
          <?php echo htmlspecialchars($main['p_desc']); ?>
        </p>

        <div class="flex items-center justify-between">
          <span class="text-lg font-bold text-purple-500">
            $<?php echo htmlspecialchars($main['p_price']); ?>
          </span>

          <!-- 🛒 Cart Icon -->
          <button
            onclick="event.stopPropagation(); addToCart(this)"
            class="p-2 rounded-full border-2 border-purple-600 text-purple-600 
                    hover:bg-purple-600 hover:text-white transition-all duration-200
                    flex items-center justify-center"
            title="Add to Cart"
          >
            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'
              stroke-width='1.8' stroke='currentColor' class='w-5 h-5'>
              <path stroke-linecap='round' stroke-linejoin='round'
                d='M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437m0 0L6.75 13.5h10.5l2.25-8.228H5.106m0 0L4.5 4.5m2.25 15a.75.75 0 100-1.5.75.75 0 000 1.5zm9 0a.75.75 0 100-1.5.75.75 0 000 1.5z' />
            </svg>
          </button>
        </div>
      </div>
    <?php } ?>
  </div>
</section>




 <?php

  include 'includes/footer.php';
  ?>