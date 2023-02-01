<?php require 'static/auth.php' ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <title>Educdia - Teacher</title>
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
          <a href="?act=create"><button id="addTeacher" class="dash-btn add-btn">Lehrperson Hinzufügen</button></a>
          <a href="?act=edit"><button id="editTeacher" class="dash-btn edit-btn">Lehrperson Bearbeiten</button></a>
          <a href="?act=delete"><button id="deleteTeacher" class="dash-btn delete-btn">Lehrperson Löschen</button></a>
        </div>
        <?php
          if(isset($_GET['act'])){
            $act = $_GET['act'];
            if($act == 'create'){
              echo '<div class="form-form-container">
              <h1 class="form-title">Lehrperson Hinzufügen</h1>
              <p class="form-description" for="name">Fügen Sie eine neue Lehrperson hinzu, diese auch Zugriff auf dieses Dashboard hat.</p>
              <form id="createTeacher" name="createTeacher" class="form-form" action="" method="post">
                  <input class="form-input" type="text" id="name" name="name" placeholder="Vollständiger Name" required>
                  <select class="form-input" name="role" id="role" placeholder="Wähle Rang" required>
                      <option hidden selected value="undefined">Wähle Rang</option>
                      <option value="admin">Administrator</option>
                      <option value="teacher">Lehrpersonal</option>
                  </select>
                  <select id="listSubjects" name="subjects" class="form-input js-data-example-ajax js-select2-multi" multiple="multiple"></select>
                  <input class="form-input" type="number" name="room" id="room" placeholder="Lehrerzimmer">
                  <input class="form-input" type="text" name="birthdate" id="birthdate" onfocus="(this.type=\'date\')"onblur="(this.type=\'text\')" placeholder="Geburtsdatum">
                  <input class="form-input" type="email" name="email" id="email" placeholder="E-Mail">
                  <input class="form-input" type="password" name="password" id="password" placeholder="Passwort" required>
                  <input class="form-input" type="password" name="password2" id="password2" placeholder="Passwort Wiederholen" required>
                  <button class="form-btn" onclick="submitCreateTeacher();" id="submit">Hinzufügen</button>
              </form>
              <a href="teacher"><button class="form-btn" style="width:100%;">Zurück</button></a>
          </div>';
          } else if($act == 'edit'){
              echo '<div class="form-form-container">
              <h1 class="form-title">Lehrperson Editieren</h1>
              <form class="form-form" action="../backend/editTeacher.php" method="post">
                  <select id="listTeachers" class="form-input js-data-example-ajax"></select>
                  <input class="form-input" type="text" id="username" name="username" placeholder="Nutzername" required>
                  <input class="form-input" type="text" id="name" name="name" placeholder="Vollständiger Name" required>
                  <select class="form-input" name="role" id="role" placeholder="Wähle Rang" required>
                      <option hidden selected value="undefined">Wähle Rang</option>
                      <option value="admin">Administrator</option>
                      <option value="teacher">Lehrpersonal</option>
                  </select>
                  <select id="listSubjects" class="form-input js-data-example-ajax js-select2-multi" multiple="multiple"></select>
                  <input class="form-input" type="number" name="room" id="room" placeholder="Lehrerzimmer">
                  <input class="form-input" type="text" name="birthday" id="birthday" onfocus="(this.type=\'date\')"onblur="(this.type=\'text\')" placeholder="Geburtsdatum">
                  <input class="form-input" type="email" name="email" id="email" placeholder="E-Mail">
                  <input class="form-input" type="password" name="password" id="password" placeholder="Passwort" required>
                  <button class="form-btn" type="submit" id="submit">Aktualisieren</button>
              </form> 
              <a href="teacher"><button class="form-btn" style="width:100%;">Zurück</button></a>
          </div>';
            }
            else if($act == 'delete'){
              echo '<div class="form-form-container">
              <h1 class="form-title">Lehrperson Löschen</h1>
              <form class="form-form" action="../backend/deleteTeacher.php" method="post">
                <select id="listTeachers" class="form-input js-data-example-ajax"></select>
                  <input class="form-input" type="text" id="name" name="name" placeholder="Vollständigen Namen Bestätigen" required>
                  <button class="form-btn" type="submit" id="submit">Unwiderruflich Löschen</button>
              </form> 
              <a href="teacher"><button class="form-btn" style="width:100%;">Zurück</button></a>
          </div>';
            } else {
              header('Location: teacher');
            }
          } else {
            echo '
              <table id="tableTeacher" class="ui celled table">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nutzername</th>
                      <th>Name</th>
                      <th>Rang</th>
                      <th>Lehrerzimmer</th>
                      <th>Fächer</th>
                      <th>Geburtsdatum</th>
                      <th>E-Mail</th>
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