<?php
ob_start();
include '../includes/header.php';
include 'sidebar.php';
include('../connect.php');

$id = $_GET['id'];
$q = mysqli_query($connection, "SELECT * FROM users WHERE id = '$id'");
$r = mysqli_fetch_array($q);
?>

<!-- MAIN CONTENT -->
<div class="ml-64">
  <div class="p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">
    
    <!-- Page Title -->
    <h1 class="text-3xl font-bold mb-2">User Details</h1>
    <p class="text-gray-400 mb-8"><?php echo $r['u_name']; ?>’s profile information</p>

    <!-- User Details Table -->
    <div class="bg-[#12141C] rounded-xl shadow-lg border border-white/10 overflow-hidden">
      <table class="min-w-full table-auto">
        <thead class="bg-[#1A1C23]">
          <tr>
            <th class="px-6 py-4 text-lg font-semibold text-gray-200 w-1/2">User</th>
            <th class="px-6 py-4 text-lg font-semibold text-gray-200 w-1/2">Details</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
          <tr>
            <td class="px-6 py-4 font-medium text-gray-300">First Name</td>
            <td class="px-6 py-4 text-gray-200"><?php echo $r['f_name']; ?></td>
          </tr>
          <tr>
            <td class="px-6 py-4 font-medium text-gray-300">Last Name</td>
            <td class="px-6 py-4 text-gray-200"><?php echo $r['l_name']; ?></td>
          </tr>
          <tr>
            <td class="px-6 py-4 font-medium text-gray-300">Username</td>
            <td class="px-6 py-4 text-gray-200"><?php echo $r['u_name']; ?></td>
          </tr>
          <tr>
            <td class="px-6 py-4 font-medium text-gray-300">Email</td>
            <td class="px-6 py-4 text-gray-200"><?php echo $r['email']; ?></td>
          </tr>
          <tr>
            <td class="px-6 py-4 font-medium text-gray-300">Age</td>
            <td class="px-6 py-4 text-gray-200"><?php echo $r['age']; ?></td>
          </tr>
          <tr>
            <td class="px-6 py-4 font-medium text-gray-300">Gender</td>
            <td class="px-6 py-4 text-gray-200"><?php echo ucfirst($r['gender']); ?></td>
          </tr>
          <tr>
            <td class="px-6 py-4 font-medium text-gray-300">Password</td>
            <td class="px-6 py-4 text-gray-200"><?php echo $r['u_password']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Back Button -->
    <div class="pt-6">
      <a href="users.php" 
        class="inline-block bg-crypto-purple hover:bg-crypto-dark-purple text-white px-6 py-3 rounded-lg font-medium transition">
        Back to Users Page
      </a>
    </div>

  </div>
  <?php include '../includes/footer.php'; ?>
</div>

