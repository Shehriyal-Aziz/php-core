<?php
ob_start();
include '../includes/header.php';
include 'sidebar.php';
include('../connect.php');

// fetch all uploaded files from database
$result = mysqli_query($connection, "SELECT * FROM uploads ORDER BY id DESC");
?>
<div class="ml-64">
  <div class="p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">
    
<section class="min-h-screen flex items-center justify-center bg-[#0B0D17] pt-24">
  <div class="w-full max-w-2xl bg-[#12141C] border border-white/10 rounded-2xl shadow-lg p-8 text-white">
    
    <h2 class="text-3xl font-bold mb-6 text-center">
      Uploaded <span class="text-crypto-purple">Files</span>
    </h2>

    <table class="w-full border-collapse border border-gray-700 text-sm">
      <thead>
        <tr class="bg-[#0B0D17] text-gray-300">
          <th class="border border-gray-700 px-4 py-3 text-left">File Name</th>
          <th class="border border-gray-700 px-4 py-3 text-left">View / Download</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $file_name = htmlspecialchars($row['file_name']); // prevent XSS
                echo "
                <tr class='border-t border-gray-700 hover:bg-[#1a1c25]'>
                    <td class='px-4 py-3'>$file_name</td>
                    <td class='px-4 py-3'>
                        <a href='uploads/$file_name' target='_blank' class='text-crypto-purple hover:underline'>View</a>
                        <span class='mx-2 text-gray-500'>|</span>
                        <a href='uploads/$file_name' download class='text-crypto-purple hover:underline'>Download</a>
                    </td>
                </tr>
                ";
            }
        } else {
            echo "
            <tr>
                <td colspan='2' class='text-center text-gray-400 py-4'>No files uploaded yet.</td>
            </tr>";
        }
        ?>
      </tbody>
    </table>

  </div>
</section>

</div>
<?php include '../includes/footer.php'; ?>
</div>