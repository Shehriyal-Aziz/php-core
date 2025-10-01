<!-- includes/footer.php -->
<footer class="bg-[#12141C] pt-16 pb-8 mt-20">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 pb-8">
      <!-- Brand -->
      <div class="lg:col-span-2">
        <h2 class="text-2xl font-bold text-white mb-4">
          Crypto<span class="text-crypto-purple">Flow</span>
        </h2>
        <p class="text-gray-400 mb-6 max-w-xs">
          The most trusted cryptocurrency platform, empowering traders with innovative tools and unparalleled security.
        </p>
        <div class="flex space-x-4">
          <a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors"><i data-lucide="facebook" class="h-5 w-5"></i></a>
          <a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors"><i data-lucide="twitter" class="h-5 w-5"></i></a>
          <a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors"><i data-lucide="instagram" class="h-5 w-5"></i></a>
          <a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors"><i data-lucide="linkedin" class="h-5 w-5"></i></a>
          <a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors"><i data-lucide="github" class="h-5 w-5"></i></a>
        </div>
      </div>

      <!-- Products -->
      <div>
        <h3 class="text-white font-medium mb-4">Products</h3>
        <ul class="space-y-2">
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Exchange</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Wallet</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">API</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Institutional</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">DeFi Platform</a></li>
        </ul>
      </div>

      <!-- Resources -->
      <div>
        <h3 class="text-white font-medium mb-4">Resources</h3>
        <ul class="space-y-2">
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Blog</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Tutorials</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Market Data</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Documentation</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Help Center</a></li>
        </ul>
      </div>

      <!-- Company -->
      <div>
        <h3 class="text-white font-medium mb-4">Company</h3>
        <ul class="space-y-2">
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">About</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Careers</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Press</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Legal & Privacy</a></li>
          <li><a href="#!" class="text-gray-400 hover:text-crypto-purple transition-colors">Contact Us</a></li>
        </ul>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-white/10 pt-8">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400 text-sm mb-4 md:mb-0">
          &copy; <span id="year"></span> CryptoFlow. All rights reserved.
          ~ Distributed By <a href="https://themewagon.com/" target="_blank" class="text-crypto-purple hover:underline">ThemeWagon</a>
        </p>
        <div class="flex space-x-6">
          <a href="#!" class="text-gray-400 hover:text-crypto-purple text-sm transition-colors">Terms of Service</a>
          <a href="#!" class="text-gray-400 hover:text-crypto-purple text-sm transition-colors">Privacy Policy</a>
          <a href="#!" class="text-gray-400 hover:text-crypto-purple text-sm transition-colors">Cookie Policy</a>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Init Lucide + Year + Navbar Scroll + Mobile Menu -->
<script>
  lucide.createIcons();
  document.getElementById("year").textContent = new Date().getFullYear();

  const navbar = document.getElementById("navbar");
  window.addEventListener("scroll", () => {
    if (window.scrollY > 10) {
      navbar.classList.add("bg-crypto-blue/80", "backdrop-blur-md", "py-3", "shadow-lg");
      navbar.classList.remove("py-6");
    } else {
      navbar.classList.remove("bg-crypto-blue/80", "backdrop-blur-md", "py-3", "shadow-lg");
      navbar.classList.add("py-6");
    }
  });

  const mobileBtn = document.getElementById("mobileMenuBtn");
  const mobileMenu = document.getElementById("mobileMenu");
  let menuOpen = false;

  mobileBtn.addEventListener("click", () => {
    menuOpen = !menuOpen;
    mobileMenu.classList.toggle("hidden", !menuOpen);
    mobileBtn.innerHTML = menuOpen
      ? '<i data-lucide="x" class="w-6 h-6"></i>'
      : '<i data-lucide="menu" class="w-6 h-6"></i>';
    lucide.createIcons();
  });
</script>
</body>
</html>
