<?php
ob_start();
session_start();
include 'includes/header.php'; ?>

<section class="min-h-screen flex items-center justify-center bg-[#0B0D17] pt-24">
    <div class="w-full max-w-md bg-[#12141C] border border-white/10 rounded-2xl shadow-lg p-8">

        <!-- Title -->
        <h2 class="text-3xl font-bold text-center mb-6">
            Welcome Back to <span class="text-crypto-purple">CryptoFlow</span>
        </h2>
        <p class="text-gray-400 text-center mb-8">Login to your account</p>


        <?php

        include "connect.php";

        if (isset($_POST['loginbtn'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $q = mysqli_query($connection, "SELECT * FROM `users` WHERE (email = '$login' OR u_name = '$login') AND u_password = '$password'");
            $check = mysqli_fetch_array($q);
            if ($check) {
                if ($check['role'] == 'admin') {
                    $_SESSION['admin'] = $login;
                    header("Location: admin/index.php");
                    exit;
                } else if ($check['role'] == 'user') {
                    $_SESSION['user'] = $login;
                    header("Location: index.php");
                    exit;
                }
            } else {
                echo "<div class='mt-6 p-4 bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 text-center'>
                Error: Email/Username or password is incorrect or you are not registered.
              </div>";
            }
        }
        ?>


        <!-- Login Form -->
        <form method="post" class="space-y-5">
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm text-gray-300 mb-2">Email Address or UserName</label>
                <input
                    type="text"
                    id="email"
                    name="login"
                    required
                    class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                    placeholder="you@example.com">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm text-gray-300 mb-2">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                    placeholder="********">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between text-sm text-gray-400">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="w-4 h-4 rounded border-gray-600 bg-[#0B0D17] text-crypto-purple focus:ring-crypto-purple">
                    <span>Remember me</span>
                </label>
                <a href="#" class="text-crypto-purple hover:underline">Forgot password?</a>
            </div>

            <!-- Submit -->
            <button type="submit"
                name="loginbtn"
                class="w-full bg-crypto-purple hover:bg-crypto-dark-purple text-white py-3 rounded-lg font-medium flex items-center justify-center">
                Login
            </button>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="flex-grow h-px bg-gray-700"></div>
            <span class="px-3 text-sm text-gray-400">or</span>
            <div class="flex-grow h-px bg-gray-700"></div>
        </div>

        <!-- Social Login (optional) -->
        <div class="space-y-3">
            <button class="w-full flex items-center justify-center bg-white text-black py-2 rounded-lg hover:bg-gray-200">
                <i data-lucide="github" class="mr-2"></i> Continue with GitHub
            </button>
            <button class="w-full flex items-center justify-center bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                <i data-lucide="facebook" class="mr-2"></i> Continue with Facebook
            </button>
        </div>

        <!-- Signup Link -->
        <p class="text-gray-400 text-sm text-center mt-6">
            Don’t have an account?
            <a href="register.php" class="text-crypto-purple hover:underline">Sign up</a>
        </p>
    </div>
</section>

<?php

include 'includes/footer.php';
?>