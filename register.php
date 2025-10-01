<?php
error_reporting(0);
ob_start();
include 'includes/header.php'; ?>

<section class="min-h-screen flex items-center justify-center bg-[#0B0D17] pt-24">
    <div class="w-full max-w-lg bg-[#12141C] border border-white/10 rounded-2xl shadow-lg p-8">

        <!-- Title -->
        <h2 class="text-3xl font-bold text-center mb-4">
            Create Your <span class="text-crypto-purple">CryptoFlow</span> Account
        </h2>
        <p class="text-gray-400 text-center mb-8">Sign up to get started</p>

        <?php
        include 'connect.php';

        if (isset($_POST['btn'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['uname'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password) {
                echo "<div class='p-4 mb-4 bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 text-center'>Passwords do not match!</div>";
                exit;
            }

            if ($fname == '' || $lname == '' || $uname == '' || $email == '' || $age == '' || $gender == '' || $password == '' || $confirm_password == '') {
                echo "<div class='p-4 mb-4 bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 text-center'>All fields are required!</div>";
            } else {
                $q = "INSERT INTO users (f_name, l_name, u_name, gender, email, age, u_password)
                  VALUES ('$fname', '$lname', '$uname', '$gender', '$email', $age, '$password')";

                $done = mysqli_query($connection, $q);

                if ($done) {
                    header("Location: /php-core/login.php");
                    exit;
                } else {
                    echo "<div class='p-4 mb-4 bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 text-center'>Error occurred while registering!</div>";
                }
            }
        }
        ?>

        <!-- Registration Form -->
        <form method="post" class="space-y-5">

            <div class="flex space-x-4">
                <div class="flex-1">
                    <label class="block text-sm text-gray-300 mb-1" for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-crypto-purple">
                </div>

                <div class="flex-1">
                    <label class="block text-sm text-gray-300 mb-1" for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-crypto-purple">
                </div>
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-1" for="uname">Username</label>
                <input type="text" id="uname" name="uname" required
                    class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-crypto-purple">
            </div>

            <div class="flex space-x-4">
                <div class="flex-1">
                    <label class="block text-sm text-gray-300 mb-1" for="gender">Gender</label>
                    <select name="gender" id="gender" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-crypto-purple">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="flex-1">
                    <label class="block text-sm text-gray-300 mb-1" for="age">Age</label>
                    <input type="number" id="age" name="age" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-crypto-purple">
                </div>
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-1" for="email">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-crypto-purple">
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-1" for="password">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-crypto-purple">
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-1" for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required
                    class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-crypto-purple">
            </div>

            <div class="flex items-center space-x-2 text-sm text-gray-400">
                <input type="checkbox" id="terms" required
                    class="w-4 h-4 rounded border-gray-600 bg-[#0B0D17] text-crypto-purple focus:ring-crypto-purple">
                <label for="terms">I agree to the <a href="terms.php" class="text-crypto-purple hover:underline">Terms & Conditions</a></label>
            </div>

            <button type="submit" name="btn"
                class="w-full bg-crypto-purple hover:bg-crypto-dark-purple text-white py-3 rounded-lg font-medium flex items-center justify-center">
                Create Account
            </button>

        </form>

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="flex-grow h-px bg-gray-700"></div>
            <span class="px-3 text-sm text-gray-400">or</span>
            <div class="flex-grow h-px bg-gray-700"></div>
        </div>

        <!-- Social Signup -->
        <div class="space-y-3">
            <button class="w-full flex items-center justify-center bg-white text-black py-2 rounded-lg hover:bg-gray-200">
                <i data-lucide="github" class="mr-2"></i> Sign up with GitHub
            </button>
            <button class="w-full flex items-center justify-center bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                <i data-lucide="facebook" class="mr-2"></i> Sign up with Facebook
            </button>
        </div>

        <p class="text-gray-400 text-sm text-center mt-6">
            Already have an account? <a href="login.php" class="text-crypto-purple hover:underline">Login</a>
        </p>

    </div>
</section>

<?php include 'includes/footer.php'; ?>