<?php include 'includes/header.php'; ?>

<section class="min-h-screen flex items-center justify-center bg-[#0B0D17] pt-24">
  <div class="w-full max-w-2xl bg-[#12141C] border border-white/10 rounded-2xl shadow-lg p-8">

    <!-- Title -->
    <h2 class="text-3xl font-bold text-center mb-4">
      Contact <span class="text-crypto-purple">Us</span>
    </h2>
    <p class="text-gray-400 text-center mb-8">We’d love to hear from you! Fill out the form below.</p>


      <?php
            include('connect.php');


            if (isset($_POST['csubmit'])) {
              $name = $_POST['name'];
              $email = $_POST['email'];
              $subject = $_POST['subject'];
              $message = $_POST['message'];

              if ($name == '' || $email == '' || $message == '') {
                echo 'plz fill all feids';
              } else {
                $query = "INSERT INTO `contact` (c_name, c_email, c_subject ,c_message) 
                  VALUES ('$name', '$email', '$subject' ,'$message')";
                $q = mysqli_query($connection, $query);

                if ($q) {
                   echo "<div class='mt-6 p-4 bg-green-500/20 border border-green-500/30 rounded-lg text-green-400 text-center'>
                Thank you, <b>$name</b>! Your feedback has been submitted.
              </div>";
                } else {
                  echo "<div class='mt-6 p-4 bg-red-500/20 border border-red-500/30 rounded-lg text-red-400 text-center'>
                Error Occure, <b>$name</b>! Try Again.
              </div>";
                }
              }
            }
            ?>

    <!-- Contact Form -->
    <form action="contact.php" method="POST" class="space-y-5">
      
      <!-- Name -->
      <div>
        <label for="name" class="block text-sm text-gray-300 mb-2">Your Name</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          required
          class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                 focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
          placeholder="John Doe">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm text-gray-300 mb-2">Email Address</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          required
          class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                 focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
          placeholder="you@example.com">
      </div>

      <!-- Subject -->
      <div>
        <label for="subject" class="block text-sm text-gray-300 mb-2">Subject</label>
        <input 
          type="text" 
          id="subject" 
          name="subject" 
          required
          class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                 focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
          placeholder="Enter subject">
      </div>

      <!-- Message -->
      <div>
        <label for="message" class="block text-sm text-gray-300 mb-2">Message</label>
        <textarea 
          id="message" 
          name="message" 
          rows="5"
          required
          class="w-full px-4 py-3 rounded-lg bg-[#0B0D17] border border-gray-700 
                 focus:outline-none focus:ring-2 focus:ring-crypto-purple text-white"
          placeholder="Write your message here..."></textarea>
      </div>

      <!-- Submit -->
      <button type="submit" 
              name="csubmit"
        class="w-full bg-crypto-purple hover:bg-crypto-dark-purple text-white py-3 
               rounded-lg font-medium flex items-center justify-center">
        Send Message
      </button>
    </form>

    <!-- Success / Error Messages -->
    <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        // For now, just show success message (later connect to DB or email)
        echo "<div class='mt-6 p-4 bg-green-500/20 border border-green-500/30 rounded-lg text-green-400 text-center'>
                Thank you, <b>$name</b>! Your message has been received.
              </div>";
      }
    ?>

  </div>
</section>

<?php include 'includes/footer.php'; ?>
