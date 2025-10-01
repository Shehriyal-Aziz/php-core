<?php include 'includes/header.php'; ?>

<section class="min-h-screen flex items-center justify-center bg-[#0B0D17] pt-24">
    <div class="w-full max-w-lg bg-[#12141C] border border-white/10 rounded-2xl shadow-lg p-8">

        <!-- Title -->
        <h2 class="text-3xl font-bold text-center mb-4">
            Share Your <span class="text-crypto-purple">Feedback</span>
        </h2>
        <p class="text-gray-400 text-center mb-8">We’d love to hear your thoughts</p>

        <!-- Feedback Form -->
        <form action="feedback.php" method="POST" class="space-y-5">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm text-gray-300 mb-2">Your Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    required
                    class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                    placeholder="John Doe">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm text-gray-300 mb-2">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                    placeholder="you@example.com">
            </div>

            <!-- Rating -->
            <div>
                <label for="rating" class="block text-sm text-gray-300 mb-2">Rating</label>
                <select
                    id="rating"
                    name="rating"
                    required
                    class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white">
                    <option value="">Select...</option>
                    <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                    <option value="4">⭐⭐⭐⭐ Good</option>
                    <option value="3">⭐⭐⭐ Average</option>
                    <option value="2">⭐⭐ Poor</option>
                    <option value="1">⭐ Very Bad</option>
                </select>
            </div>


            <!-- Feedback -->
            <div>
                <label for="message" class="block text-sm text-gray-300 mb-2">Your Feedback</label>
                <textarea
                    id="message"
                    name="message"
                    rows="4"
                    required
                    class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                    placeholder="Write your feedback here..."></textarea>
            </div>

            <!-- Submit -->
            <button type="submit"
                name="fsubmit"
                class="w-full bg-crypto-purple hover:bg-crypto-dark-purple text-white py-3 rounded-lg font-medium flex items-center justify-center">
                Submit Feedback
            </button>
        </form>

        <?php
        include('connect.php');


        if (isset($_POST['fsubmit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $rating = $_POST['rating'];
            $message = $_POST['message'];

            if ($name == '' || $email == '' || $rating == '' || $message == '') {
                echo 'plz fill all feids';
            } else {
                $query = "INSERT INTO `feedback` (f_name, f_email, rating, f_message) 
                  VALUES ('$name', '$email', '$rating', '$message')";
                $q = mysqli_query($connection, $query);

                if ($q) {
                    echo "<div class='mt-6 p-4 bg-green-500/20 border border-green-500/30 rounded-lg text-green-400 text-center'>
                Thank you, <b>$name</b>! Your feedback has been submitted.
              </div>";
                } else {
                    echo "<div class='mt-6 p-4 bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 text-center'>
                Error Occure, <b>$name</b>! Try Again.
              </div>";
                }
            }
        }




        ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>