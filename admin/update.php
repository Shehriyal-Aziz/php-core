<?php
ob_start();
include '../includes/header.php';
include 'sidebar.php';
include('../connect.php');

$id = $_GET['id'];
$q = mysqli_query($connection, "SELECT * FROM users WHERE id = '$id'");
$r = mysqli_fetch_array($q);

// Handle Update
if (isset($_POST['update_user'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $password = $_POST['u_password'];

    $update = mysqli_query($connection, "UPDATE users SET 
        f_name='$fname',
        l_name='$lname',
        u_name='$uname',
        email='$email',
        age='$age',
        gender='$gender',
        u_password='$password'
        WHERE id='$id'
    ");

    if ($update) {
        header("Location: users.php");
        exit;
    } else {
        echo "<div class='text-red-500 text-center'>Update failed. Try again.</div>";
    }
}
?>

<!-- MAIN CONTENT -->
<div class="ml-64">
  <div class="p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">
    <!-- Page Title -->
    <h1 class="text-3xl font-bold mb-8">Update User</h1>

    <!-- Update Form -->
    <div class="w-full max-w-2xl bg-[#12141C] border border-white/10 rounded-2xl shadow-lg p-8">
      <form method="POST" class="space-y-5">
        
        <!-- First Name -->
        <div>
          <label class="block text-sm text-gray-300 mb-2">First Name</label>
          <input type="text" name="fname" value="<?php echo $r['f_name']; ?>"
            class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:ring-2 focus:ring-crypto-purple">
        </div>

        <!-- Last Name -->
        <div>
          <label class="block text-sm text-gray-300 mb-2">Last Name</label>
          <input type="text" name="lname" value="<?php echo $r['l_name']; ?>"
            class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:ring-2 focus:ring-crypto-purple">
        </div>

        <!-- Username -->
        <div>
          <label class="block text-sm text-gray-300 mb-2">Username</label>
          <input type="text" name="uname" value="<?php echo $r['u_name']; ?>"
            class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:ring-2 focus:ring-crypto-purple">
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm text-gray-300 mb-2">Email</label>
          <input type="email" name="email" value="<?php echo $r['email']; ?>"
            class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:ring-2 focus:ring-crypto-purple">
        </div>

        <!-- Age -->
        <div>
          <label class="block text-sm text-gray-300 mb-2">Age</label>
          <input type="number" name="age" value="<?php echo $r['age']; ?>"
            class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:ring-2 focus:ring-crypto-purple">
        </div>

        <!-- Gender -->
        <div>
          <label class="block text-sm text-gray-300 mb-2">Gender</label>
          <select name="gender"
            class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:ring-2 focus:ring-crypto-purple">
            <option value="male"   <?php if($r['gender']=="male") echo "selected"; ?>>Male</option>
            <option value="female" <?php if($r['gender']=="female") echo "selected"; ?>>Female</option>
            <option value="other"  <?php if($r['gender']=="other") echo "selected"; ?>>Other</option>
          </select>
        </div>

        <!-- Password -->
        <div>
          <label class="block text-sm text-gray-300 mb-2">Password</label>
          <input type="password" name="u_password" value="<?php echo $r['u_password']; ?>"
            class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 text-white focus:ring-2 focus:ring-crypto-purple">
        </div>

        <!-- Submit Button -->
        <div class="pt-6 flex space-x-3">
          <button type="submit" name="update_user"
            class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-lg font-medium transition">
            Update User
          </button>
          <a href="users.php" 
            class="flex-1 text-center bg-gray-700 hover:bg-gray-800 text-white py-3 rounded-lg font-medium transition">
            Cancel
          </a>
        </div>

      </form>
    </div>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
