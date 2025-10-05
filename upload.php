<?php
ob_start();
session_start();
include 'includes/header.php';
include "connect.php";
?>

<?php
$message = "";
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $file_name = $_FILES['file']['name'];
    $file_temp_name = $_FILES['file']['tmp_name'];
    $target = "uploads/" . basename($file_name);


    if (move_uploaded_file($file_temp_name, $target)) {
        mysqli_query($connection, "INSERT INTO `uploads` (file_name) VALUES ('$file_name')");
        $message = "<div class='mt-6 p-4 bg-green-500/20 border border-green-500/30 rounded-lg text-green-400 text-center'>
                        File uploaded successfully.
                    </div>";
    } else {
        $message = "<div class='mt-6 p-4 bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 text-center'>
                        Error: There was a problem uploading your file.
                    </div>";
    }
}
?>

<section class="min-h-screen flex items-center justify-center bg-[#0B0D17] pt-24">
    <div class="w-full max-w-md bg-[#12141C] border border-white/10 rounded-2xl shadow-lg p-8">

        <!-- Title -->
        <h2 class="text-3xl font-bold text-center mb-6">
            Welcome Back to <span class="text-crypto-purple">CryptoFlow</span>
        </h2>
        <p class="text-gray-400 text-center mb-8">upload any file</p>




        <form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="space-y-5">

            <div>
                <label for="file" class="block text-sm text-gray-300 mb-2">Choose File</label>
                <input
                    type="file"
                    id="file"
                    name="file"
                    required
                    class="w-full px-4 py-3 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-crypto-purple text-gray-300
                   bg-[#0B0D17] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold
                   file:bg-crypto-purple file:text-white hover:file:bg-crypto-dark-purple"
                    style="color-scheme: dark; color: #d1d5db;">
            </div>

            <button
                type="submit"
                name="submit"
                class="w-full bg-crypto-purple hover:bg-crypto-dark-purple text-white py-3 rounded-lg font-medium flex items-center justify-center">
                Upload File
            </button>
            <?php echo $message; ?>

        </form>

    </div>
</section>

<?php

include 'includes/footer.php';
?>
</body>

</html>