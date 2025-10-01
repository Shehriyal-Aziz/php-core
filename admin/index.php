<?php include '../includes/header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Dashboard Content -->
<div class="ml-64">

    <main class="p-8 pt-20 bg-[#0B0D17] min-h-screen text-white">
        <!-- Page Title -->
        <h2 class="text-3xl font-bold mb-8">Dashboard</h2>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Users -->
            <div class="bg-[#12141C] rounded-xl p-6 border border-white/10 shadow-lg">
                <h3 class="text-gray-400 text-sm">Total Users</h3>
                <p class="text-2xl font-bold mt-2">1,245</p>
            </div>

            <!-- Feedback -->
            <div class="bg-[#12141C] rounded-xl p-6 border border-white/10 shadow-lg">
                <h3 class="text-gray-400 text-sm">Feedback Received</h3>
                <p class="text-2xl font-bold mt-2">320</p>
            </div>

            <!-- Messages -->
            <div class="bg-[#12141C] rounded-xl p-6 border border-white/10 shadow-lg">
                <h3 class="text-gray-400 text-sm">New Messages</h3>
                <p class="text-2xl font-bold mt-2">58</p>
            </div>

            <!-- Revenue -->
            <div class="bg-[#12141C] rounded-xl p-6 border border-white/10 shadow-lg">
                <h3 class="text-gray-400 text-sm">Monthly Revenue</h3>
                <p class="text-2xl font-bold mt-2">$12,500</p>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-[#12141C] rounded-xl p-6 border border-white/10 shadow-lg">
            <h3 class="text-xl font-semibold mb-4">Recent Activity</h3>
            <ul class="space-y-3 text-gray-300 text-sm">
                <li>👤 New user <span class="text-white font-medium">John Doe</span> registered.</li>
                <li>💬 Feedback received from <span class="text-white font-medium">Sarah</span>.</li>
                <li>✉️ New contact message from <span class="text-white font-medium">Ali</span>.</li>
                <li>⚙️ Settings updated by <span class="text-white font-medium">Admin</span>.</li>
            </ul>
        </div>

    </main>

    <?php include '../includes/footer.php'; ?>
</div>