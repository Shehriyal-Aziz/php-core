    <?php
    include '../includes/header.php';
    include 'sidebar.php';
    include('../connect.php');
    ?>

    <div class="ml-64">
        <div class="p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">

            <!-- Page Title -->
            <h1 class="text-3xl font-bold mb-2">Add Product</h1>
            <p class="text-gray-400 mb-8">Card will be added to product page</p>



            <!-- Add Product Button -->
            <button id="openModalBtn"
                class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-semibold transition">
                + Add Product
            </button>



            <hr class="m-2 mt-20">

            <!-- part 2 -->
            <h1 class="text-3xl font-bold my-2">Added Product</h1>
            <p class="text-gray-400 mb-8"> All Cards you have added till now display blow</p>

            <!-- Users Table -->
            <div class="bg-[#12141C] rounded-xl shadow-lg border border-white/10 overflow-hidden">
                <table class="min-w-full table-auto">
                    <thead class="bg-[#1A1C23]">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">Desc</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-300">Price</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold text-gray-300">Operations</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800">
                        <!-- delete -->
                        <?php
                        if (isset($_POST['btndelete'])) {
                            $id = $_POST['id'];
                            $delete = mysqli_query($connection, 'delete from product_card where p_id =' . $id);
                        }
                        ?>

                        <!-- loop  -->
                        <?php
                        $store = mysqli_query($connection, "select * from product_card");
                        while ($main = mysqli_fetch_array($store)) {
                        ?>
                            <tr class="hover:bg-[#1F2230] transition-colors">
                                <td class="px-6 py-4 text-gray-200"><?php echo $main['p_name'] ?></td>
                                <td class="px-6 py-4 text-gray-200"><?php echo $main['p_desc'] ?></td>
                                <td class="px-6 py-4 text-gray-200"><?php echo $main['p_price'] ?></td>
                                <td class="px-6 py-4 text-center">
                                    <div class="inline-flex space-x-2">




                                        <form method="post">
                                            <input type="hidden" name="id" value="<?php echo $main['p_id'] ?>">
                                            <button type="submit" name="btndelete" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
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





    </div>
    <?php include '../includes/footer.php'; ?>
    </div>

    <!-- Modal php -->

    <?php
    if (isset($_POST['psubmit'])) {
        $name = $_POST['pname'];
        $desc = $_POST['pdesc'];
        $price = $_POST['pprice'];

        $imgName = $_FILES['pimg']['name'];
        $imgTmp = $_FILES['pimg']['tmp_name'];
        $folder = "../product_card/" . $imgName;

        if (!empty($imgName) && !empty($name) && !empty($price)) {
            if (move_uploaded_file($imgTmp, $folder)) {
                $query = "INSERT INTO `product_card`(`p_img`, `p_name`, `p_desc`, `p_price`) 
                      VALUES ('$imgName', '$name', '$desc', '$price')";
                $q = mysqli_query($connection, $query);

                if ($q) {
                    echo "<script>window.location.href = 'product_card.php';</script>";
                } else {
                    echo "<script>alert('Database insert fail')</script>";
                }
            } else {
                echo "<script>alert('Image upload failed!');</script>";
            }
        } else {
            echo "<script>alert('Please fill all fields.');</script>";
        }
    }
    ?>

    <!-- Modal -->
    <div id="productModal"
        class="fixed inset-0 hidden bg-black/60 flex items-center justify-center z-50 overflow-y-auto">
        <div class="bg-[#12141C] text-white rounded-xl w-full max-w-lg mx-4 my-10 p-8 relative overflow-y-auto max-h-[90vh]">

            <!-- Close Button -->
            <button id="closeModal"
                class="absolute top-3 right-3 text-gray-400 hover:text-white text-2xl font-bold">
                &times;
            </button>

            <h2 class="text-2xl font-bold mb-6 text-center">Add Product</h2>

            <!-- Form -->
            <form method="POST" enctype="multipart/form-data" class="space-y-5">

                <!-- product image -->
                <div>
                    <label for="pimg" class="block text-sm text-gray-300 mb-2">Product image</label>
                    <input type="file" id="pimg" name="pimg" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                            focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                        placeholder="Product image">
                </div>
                <!-- product Name -->
                <div>
                    <label for="pname" class="block text-sm text-gray-300 mb-2">Product Name</label>
                    <input type="text" id="pname" name="pname" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                            focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                        placeholder="Product Name">
                </div>
                <!-- product decs -->
                <div>
                    <label for="pdesc" class="block text-sm text-gray-300 mb-2">Product Description</label>
                    <input type="text" id="pdesc" name="pdesc" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                            focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                        placeholder="Product Desc">
                </div>
                <!-- price -->
                <div>
                    <label for="pprice" class="block text-sm text-gray-300 mb-2">Product price</label>
                    <input type="text" id="pprice" name="pprice" required
                        class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                            focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
                        placeholder="Product price">
                </div>





                <!-- Submit -->
                <button type="submit" name="psubmit"
                    class="w-full bg-crypto-purple hover:bg-crypto-dark-purple text-white py-3 
                        rounded-lg font-medium flex items-center justify-center">
                    Add
                </button>
            </form>

        </div>
    </div>


    <!-- Script -->
    <script>
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModal');
        const modal = document.getElementById('productModal');

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });



        // close modal when clicking outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });
    </script>