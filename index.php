

<?php include 'includes/header.php'; ?>

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

<section>
  
</section>
<?php include 'includes/footer.php'; ?>



