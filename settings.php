<?php require 'static/auth.php' ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <title>Educdia - Settings</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/jquery.modal.min.css" />
    <link rel="stylesheet" href="assets/css/modal.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php require 'static/sidebar.php' ?>
  <section class="home-section">
    <?php require 'static/topbar.php' ?>

    <div id="content" class="home-content">
        <div class="form-form-container">
              <h1 class="form-title">Account Einstellungen</h1>
              <p class="form-description" for="name">Ändern Sie hier ihr Passwort, ihren Namen o.Ä.</p>
              <form class="form-form" action="../backend/updateAccount.php" method="post">
                  <input class="form-input" type="text" id="username" name="username" placeholder="<?php echo $username ?>">
                  <input class="form-input" type="text" id="name" name="name" placeholder="<?php echo $name ?>">
                  <input class="form-input" type="email" name="email" id="email" placeholder="<?php echo $email ?>">
                  <input class="form-input" type="password" name="password" id="password" placeholder="***************">
                  <input class="form-input" type="password" name="oldPassword" id="oldPassword" placeholder="Derzeitiges Passwort" required>
                  <button class="form-btn" type="submit" id="submit">Aktualisieren</button>
              </form>
          </div>
    </div>
  </section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="assets/js/dashboard.js"></script>

</body>
</html>