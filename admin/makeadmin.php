<?php include '../includes/header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php include('../connect.php'); ?>

<!-- MAIN CONTENT -->
 <div class="ml-64">
<div class=" p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">
    <!-- Page Title -->
    <h1 class="text-3xl font-bold mb-8">confidenfial page</h1>

    <!-- Users Table -->
    <div class="bg-[#12141C] rounded-xl shadow-lg border border-white/10 overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-[#1A1C23]">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">Email</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-300">Operations</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                <?php
                $store = mysqli_query($connection, "select * from users");
                while ($main = mysqli_fetch_array($store)) {
                ?>
                    <tr class="hover:bg-[#1F2230] transition-colors">
                        <td class="px-6 py-4 text-gray-200"><?php echo $main['f_name'] ?></td>
                        <td class="px-6 py-4 text-gray-200"><?php echo $main['email'] ?></td>
                        <td class="px-6 py-4 text-center">
                            <div class="inline-flex space-x-2">
                                <form method="post">
                                    <input name="id" type="hidden" value="<?php echo $main['id'] ?>">
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-sm" name="btnadmin">
                                        make admin
                                    </button>
                                </form>

                                <form method="post">
                                    <input type="hidden" name="id" value="<?php echo $main['id'] ?>">
                                    <button type="submit" name="btnuser" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-sm">
                                        make user
                                    </button>
                                </form>

                                <form method="post">
                                    <input type="hidden" name="id" value="<?php echo $main['id'] ?>">
                                    <button type="submit" name="btndelete" onclick="return confirm('Are you sure you want to delete this user?');" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
if (isset($_POST['btnadmin'])) {
    $id = $_POST['id'];
    mysqli_query($connection, "update users set role='admin' where id=" . $id);
   
}

if (isset($_POST['btnuser'])) {
    $id = $_POST['id'];
    mysqli_query($connection, "update users set role='user' where id=" . $id);
    
    
}

if (isset($_POST['btndelete'])) {
    $id = $_POST['id'];
    $delete = mysqli_query($connection, 'delete from users where id =' . $id);
}
?>

<?php include '../includes/footer.php'; ?>
</div>
</div>