<?php require 'static/auth.php' ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <title>Educdia - Subjects</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.semanticui.min.css"/>
    <link rel="stylesheet" href="assets/css/jquery.modal.min.css" />
    <link rel="stylesheet" href="assets/css/modal.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php require 'static/sidebar.php' ?>
  <section class="home-section">
    <?php require 'static/topbar.php' ?>

    <div class="home-content">
      <div class="table-container">
      <div class="btn-bar">
          <a href="?act=create"><button id="addScore" class="dash-btn add-btn">Note Eintragen</button></a>
          <a href="?act=edit"><button id="editScore" class="dash-btn edit-btn">Note Bearbeiten</button></a>
          <a href="?act=delete"><button id="deleteScore" class="dash-btn delete-btn">Note Löschen</button></a>
        </div>
        <?php
          if(isset($_GET['act'])){
            $act = $_GET['act'];
            if($act == 'create'){
            echo '<div class="form-form-container">
              <h1 class="form-title">Note Eintragen</h1>
              <p class="form-description">Tragen Sie für den jeweilligen Schüler eine Note ein.</p>
              <form class="form-form" action="../backend/createScore.php" method="post">
                <select id="listStudents" name="studentID" class="form-input js-data-example-ajax" required></select>
                <select id="listSubjects" name="subjectID" class="form-input js-data-example-ajax" required></select>
                <input class="modal-input" type="int" name="score" id="score" placeholder="Note z.B. 60" min="1" max="100" required>
                <button class="form-btn" type="int" id="submit">Hinzufügen</button>
                </form> 
              <a href="scores"><button class="form-btn" style="width:100%;">Zurück</button></a>
            </div>';
            } else if ($act == 'edit'){
                echo '<div class="form-form-container">
                <h1 class="form-title">Note Bearbeiten</h1>
                <form class="form-form" action="../backend/editScore.php" method="post">
                  <select id="listScores" name="scoreID" class="form-input js-data-example-ajax" required></select>
                  <input class="modal-input" type="int" name="score" id="score" placeholder="Neue Note z.B. 60" min="1" max="100" required>
                  <button class="form-btn" type="int" id="submit">Aktualisieren</button>
                  </form> 
                <a href="scores"><button class="form-btn" style="width:100%;">Zurück</button></a>
              </div>';
            } else if ($act == 'delete'){
                echo '<div class="form-form-container">
                <h1 class="form-title">Note Entfernen</h1>
                <form class="form-form" action="../backend/deleteScore.php" method="post">
                  <select id="listScores" name="scoreID" class="form-input js-data-example-ajax" required></select>
                  <button class="form-btn" type="int" id="submit">Unwiderruflich Löschen</button>
                  </form> 
                <a href="scores"><button class="form-btn" style="width:100%;">Zurück</button></a>
              </div>';
            } else {
              header('Location: scores');
            }
          } else {
            echo '
              <table id="tableScores" class="ui celled table">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Schüler ID</th>
                      <th>Schüler Namen</th>
                      <th>Fachname</th>
                      <th>Note in %</th>
                    </tr>
                </thead>
            </table>';
          }
        ?>
      </div>
    </div>
  </section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="assets/js/dashboard.js"></script>

</body>
</html>