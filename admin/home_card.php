    <?php
    include '../includes/header.php';
    include 'sidebar.php';
    include('../connect.php');
    ?>

    <div class="ml-64">
        <div class="p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">

            <!-- Page Title -->
            <h1 class="text-3xl font-bold mb-2">Add Product</h1>
            <p class="text-gray-400 mb-8">Card will be added to home page</p>



            <!-- Add Product Button -->
            <button id="openModalBtn"
                class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-semibold transition">
                + Add Product
            </button>

<hr class="m-2 mt-20">
            <!-- part 2 -->
            <h1 class="text-3xl font-bold my-2">Added Product</h1>
            <p class="text-gray-400 mb-8"> All Cards you have added till now display blow</p>





        </div>
        <?php include '../includes/footer.php'; ?>
    </div>

    <!-- Modal Background -->
    <!-- Modal -->
    <div style="display:none" id="productModal"
        class="fixed inset-0 hidden bg-black/60 flex items-center justify-center z-50 overflow-y-auto">
        <div class="bg-[#12141C] text-white rounded-xl w-full max-w-lg mx-4 my-10 p-8 relative overflow-y-auto max-h-[90vh]">

            <!-- Close Button -->
            <button id="closeModal"
                class="absolute top-3 right-3 text-gray-400 hover:text-white text-2xl font-bold">
                &times;
            </button>

            <h2 class="text-2xl font-bold mb-6 text-center">Add Product</h2>

            <!-- Form -->
            <form action="contact.php" method="POST" class="space-y-5">

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm text-gray-300 mb-2">Your Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                            focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                        placeholder="John Doe">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm text-gray-300 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                            focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                        placeholder="you@example.com">
                </div>

                <!-- Subject -->
                <div>
                    <label for="subject" class="block text-sm text-gray-300 mb-2">Subject</label>
                    <input type="text" id="subject" name="subject" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                            focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                        placeholder="Enter subject">
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-sm text-gray-300 mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                            focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                        placeholder="Write your message here..."></textarea>
                </div>

                <!-- Submit -->
                <button type="submit" name="csubmit"
                    class="w-full bg-crypto-purple hover:bg-crypto-dark-purple text-white py-3 
                        rounded-lg font-medium flex items-center justify-center">
                    Send Message
                </button>
            </form>

        </div>
    </div>


    <!-- Script -->
    <script>
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModal');
        const modal = document.getElementById('productModal');

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });



        // close modal when clicking outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });
    </script>