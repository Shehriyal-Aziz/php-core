<?php include '../includes/header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php include('../connect.php'); ?>

<!-- Main Content -->
 <div class="ml-64">
<div class=" p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">

  <!-- Page Title -->
  <h2 class="text-3xl font-bold mb-8">User Feedback Report</h2>

  <!-- Feedback Table -->
  <div class="bg-[#12141C] rounded-xl shadow-lg border border-white/10 overflow-hidden">
    <table class="min-w-full table-auto">
      <thead class="bg-[#1A1C23]">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">Name</th>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">Email</th>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">Rating</th>
          <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">Feedback</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-800">
        <?php
        $box = mysqli_query($connection, 'SELECT * FROM feedback');
        while ($feed = mysqli_fetch_array($box)) {
        ?>
          <tr class="hover:bg-[#1F2230] transition-colors">
            <td class="px-6 py-4 text-gray-200"><?php echo $feed['f_name'] ?></td>
            <td class="px-6 py-4 text-gray-200"><?php echo $feed['f_email'] ?></td>
            <td class="px-6 py-4 text-gray-200"><?php echo $feed['rating'] ?></td>
            <td class="px-6 py-4 text-gray-300"><?php echo $feed['f_message'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
 </div>