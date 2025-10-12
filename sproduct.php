<?php
ob_start();
session_start();
include 'connect.php';
include 'includes/header.php';

// Get product ID from URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details
$query = mysqli_query($connection, "SELECT * FROM product_card WHERE p_id = $product_id");
$product = mysqli_fetch_array($query);

// If product not found, redirect
if (!$product) {
  header('Location: product.php');
  exit();
}
?>

<section class="min-h-screen bg-[#0B0D17] pt-28 pb-16 px-4">
  <div class="max-w-7xl mx-auto">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center space-x-2 text-sm text-gray-400 mb-8">
      <a href="index.php" class="hover:text-white transition">Home</a>
      <span>/</span>
      <a href="product.php" class="hover:text-white transition">Products</a>
      <span>/</span>
      <span class="text-white"><?php echo htmlspecialchars($product['p_name']); ?></span>
    </nav>

    <!-- Product Details Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      
      <!-- Product Image -->
      <div class="bg-[#12141C] border border-gray-800 rounded-2xl p-8 flex items-center justify-center">
        <img 
          src="product_card/<?php echo htmlspecialchars($product['p_img']); ?>" 
          alt="<?php echo htmlspecialchars($product['p_name']); ?>"
          class="w-full max-w-md h-auto object-contain rounded-xl"
        >
      </div>

      <!-- Product Info -->
      <div class="flex flex-col justify-center space-y-6">
        
        <h1 class="text-4xl font-bold text-white">
          <?php echo htmlspecialchars($product['p_name']); ?>
        </h1>

        <div class="flex items-center space-x-4">
          <span class="text-4xl font-bold text-purple-500">
            $<?php echo htmlspecialchars($product['p_price']); ?>
          </span>
          <span class="text-sm text-green-400 bg-green-400/10 px-3 py-1 rounded-full">
            In Stock
          </span>
        </div>

        <div class="border-t border-b border-gray-800 py-6">
          <h3 class="text-lg font-semibold text-white mb-3">Description</h3>
          <p class="text-gray-400 leading-relaxed">
            <?php echo htmlspecialchars($product['p_desc']); ?>
          </p>
        </div>

        <!-- Quantity Selector & Add to Cart -->
        <div class="flex items-center space-x-4">
          <div class="flex items-center space-x-3 bg-[#12141C] border border-gray-800 rounded-lg px-4 py-3">
            <button 
              onclick="changeQuantity('dec')" 
              class="text-white hover:text-purple-500 text-xl font-bold w-8 h-8 flex items-center justify-center">
              −
            </button>
            <input 
              type="number" 
              id="quantity" 
              value="1" 
              min="1"
              class="w-16 text-center bg-transparent text-white font-semibold focus:outline-none"
              readonly
            >
            <button 
              onclick="changeQuantity('inc')" 
              class="text-white hover:text-purple-500 text-xl font-bold w-8 h-8 flex items-center justify-center">
              +
            </button>
          </div>

          <button 
            onclick="addSingleProductToCart()"
            class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 flex items-center justify-center space-x-2"
          >
            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' class='w-5 h-5'>
              <path stroke-linecap='round' stroke-linejoin='round' d='M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437m0 0L6.75 13.5h10.5l2.25-8.228H5.106m0 0L4.5 4.5m2.25 15a.75.75 0 100-1.5.75.75 0 000 1.5zm9 0a.75.75 0 100-1.5.75.75 0 000 1.5z' />
            </svg>
            <span>Add to Cart</span>
          </button>
        </div>

        <!-- Product Features -->
        <div class="grid grid-cols-2 gap-4 pt-4">
          <div class="bg-[#12141C] border border-gray-800 rounded-lg p-4">
            <div class="flex items-center space-x-3">
              <div class="w-10 h-10 bg-purple-600/20 rounded-lg flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-purple-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                </svg>
              </div>
              <div>
                <p class="text-xs text-gray-400">Free Shipping</p>
                <p class="text-sm text-white font-semibold">On orders $50+</p>
              </div>
            </div>
          </div>

          <div class="bg-[#12141C] border border-gray-800 rounded-lg p-4">
            <div class="flex items-center space-x-3">
              <div class="w-10 h-10 bg-purple-600/20 rounded-lg flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-purple-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                </svg>
              </div>
              <div>
                <p class="text-xs text-gray-400">Secure Payment</p>
                <p class="text-sm text-white font-semibold">100% Protected</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Related Products (Optional) -->
    <div class="mt-20">
      <h2 class="text-3xl font-bold text-white mb-8">Related Products</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        
        <?php
        // Fetch 4 random related products (excluding current product)
        $related = mysqli_query($connection, "SELECT * FROM product_card WHERE p_id != $product_id ORDER BY RAND() LIMIT 4");
        while ($item = mysqli_fetch_array($related)) {
        ?>
          <div
            class="bg-[#12141C] border border-gray-800 rounded-2xl shadow-md hover:shadow-purple-500/20 
                  transition duration-300 p-5 hover:scale-[1.02] cursor-pointer"
            onclick="window.location.href='sproduct.php?id=<?php echo $item['p_id']; ?>'"
          >
            <img 
              src="product_card/<?php echo htmlspecialchars($item['p_img']); ?>"
              alt="<?php echo htmlspecialchars($item['p_name']); ?>"
              class="w-full h-48 object-cover rounded-xl mb-4"
            >
            <h3 class="text-lg font-semibold text-white mb-1 truncate">
              <?php echo htmlspecialchars($item['p_name']); ?>
            </h3>
            <p class="text-gray-400 text-sm mb-4 line-clamp-2">
              <?php echo htmlspecialchars($item['p_desc']); ?>
            </p>
            <div class="flex items-center justify-between">
              <span class="text-lg font-bold text-purple-500">
                $<?php echo htmlspecialchars($item['p_price']); ?>
              </span>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>

  </div>
</section>

<script>
  // Store product data
  const productData = {
    id: <?php echo $product['p_id']; ?>,
    name: '<?php echo addslashes($product['p_name']); ?>',
    price: <?php echo $product['p_price']; ?>,
    img: 'product_card/<?php echo addslashes($product['p_img']); ?>'
  };

  // Change quantity
  function changeQuantity(action) {
    const quantityInput = document.getElementById('quantity');
    let currentQty = parseInt(quantityInput.value);
    
    if (action === 'inc') {
      quantityInput.value = currentQty + 1;
    } else if (action === 'dec' && currentQty > 1) {
      quantityInput.value = currentQty - 1;
    }
  }

  // Add to cart with quantity
  function addSingleProductToCart() {
    const quantity = parseInt(document.getElementById('quantity').value);
    
    // Add items based on quantity
    const promises = [];
    for (let i = 0; i < quantity; i++) {
      const formData = new URLSearchParams({
        id: productData.id,
        name: productData.name,
        price: productData.price,
        img: productData.img
      });
      
      promises.push(
        fetch('add_to_cart.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: formData
        })
      );
    }

    // Wait for all requests to complete
    Promise.all(promises)
      .then(() => fetch('load_cart.php'))
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          document.getElementById("cartItems").innerHTML = data.cartHTML;
          
          const badge = document.getElementById('cartCount');
          if (badge) {
            badge.textContent = data.cartCount;
            badge.style.display = data.cartCount > 0 ? 'flex' : 'none';
          }
          
          // Show success message
          showNotification(`${quantity} item(s) added to cart!`);
          
          // Reset quantity
          document.getElementById('quantity').value = 1;
          
          // Open cart
          openCart();
        }
      })
      .catch(err => console.error('Error adding to cart:', err));
  }

  // Show notification
  function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'fixed top-24 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-[9999] animate-fade-in';
    notification.textContent = message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
      notification.style.opacity = '0';
      notification.style.transition = 'opacity 0.3s';
      setTimeout(() => notification.remove(), 300);
    }, 3000);
  }
</script>

<style>
  @keyframes fade-in {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in {
    animation: fade-in 0.3s ease-out;
  }
</style>

<?php
include 'includes/footer.php';
?>