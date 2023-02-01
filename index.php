<?php require 'static/auth.php' ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <title>Educdia - Dashboard</title>
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
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Schüler</div>
            <div class="number">0</div>
          </div>
          <i class='bx bx-group icon'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Lehrer</div>
            <div class="number">0</div>
          </div>
          <i class='bx bxs-graduation icon'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Klassen</div>
            <div class="number">0</div>
          </div>
          <i class='bx bx-door-open icon'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Notenschnitt</div>
            <div class="number">0</div>
          </div>
          <i class='bx bx-notepad icon'></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Schüler</div>
          <div class="sales-details">
            <ul class="details">
                <li class="topic">ID</li>
                <li>1</li>
            </ul>
            <ul class="details">
              <li class="topic">Name</li>
              <li>Alex Doe</li>
            </ul>
          <ul class="details">
            <li class="topic">Jahrgang</li>
            <li>22/23</li>
          </ul>
          <ul class="details">
            <li class="topic">Klasse</li>
            <li>3Ia</li>
          </ul>
          </div>
          <div class="button">
            <a href="students">Mehr Anzeigen</a>
          </div>
        </div>
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