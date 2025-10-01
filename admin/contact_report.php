<?php include '../includes/header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php include('../connect.php'); ?>

<!-- Main Content -->
 <div class="ml-64">
<div class=" p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">

  <!-- Page Title -->
  <h2 class="text-3xl font-bold mb-8">Contacted Users</h2>

  <!-- Contact Table -->
  <div class="bg-[#12141C] rounded-xl shadow-lg border border-white/10 overflow-hidden">
    <table class="min-w-full table-auto">
      <thead class="bg-[#1A1C23]">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">User Name</th>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">User Email</th>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">Message</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-800">
        <?php
        $tank = mysqli_query($connection, 'SELECT * FROM contact');
        while ($row = mysqli_fetch_array($tank)) {
        ?>
          <tr class="hover:bg-[#1F2230] transition-colors">
            <td class="px-6 py-4 text-gray-200"><?php echo $row['c_name'] ?></td>
            <td class="px-6 py-4 text-gray-200"><?php echo $row['c_email'] ?></td>
            <td class="px-6 py-4 text-gray-300"><?php echo $row['c_message'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
 </div>