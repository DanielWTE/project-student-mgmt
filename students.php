<?php require 'static/auth.php' ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8">
    <title>Educdia - Students</title>
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
          <a href="?act=create"><button id="addStudent" class="dash-btn add-btn">Schüler Hinzufügen</button></a>
          <a href="?act=edit"><button id="editStudent" class="dash-btn edit-btn">Schüler Bearbeiten</button></a>
          <a href="?act=delete"><button id="deleteStudent" class="dash-btn delete-btn">Schüler Löschen</button></a>
        <?php
          if(isset($_GET['act'])){
            $act = $_GET['act'];
          if($act == 'create'){
            echo '<div class="form-form-container">
            <h1 class="form-title">Schüler Hinzufügen</h1>
            <p class="form-description" for="name">Fügen Sie neue Schüler in das System ein.</p>
            <form class="form-form" action="../backend/createStudent.php" method="post">
                <input class="form-input" type="text" id="name" name="name" placeholder="Vollständiger Name" required>
                <input class="form-input" type="text" id="company" name="company" placeholder="Lehrbetrieb">
                <input class="form-input" type="text" id="year" name="year" placeholder="Jahrgang (YY/YY)" required pattern="\d{2}/\d{2}">
                <select id="listClasses" class="form-input js-data-example-ajax"></select>
                <input class="form-input" type="text" name="birthday" id="birthday" onfocus="(this.type=\'date\')"onblur="(this.type=\'text\')" placeholder="Geburtsdatum">
                <input class="form-input" type="email" name="email" id="email" placeholder="E-Mail">
                <button class="form-btn" type="submit" id="submit">Hinzufügen</button>
            </form> 
            <a href="students"><button class="form-btn" style="width:100%;">Zurück</button></a>
        </div>';
          }else if($act == 'edit'){
              echo '<div class="form-form-container">
              <h1 class="form-title">Schüler Editieren</h1>
              <form class="form-form" action="../backend/editStudent.php" method="post">
                  <select id="listStudents" class="form-input js-data-example-ajax"></select>
                  <input class="form-input" type="text" id="name" name="name" placeholder="Vollständiger Name" required>
                  <input class="form-input" type="text" id="company" name="company" placeholder="Lehrbetrieb">
                  <input class="form-input" type="text" id="year" name="year" placeholder="Jahrgang (YY/YY)" required pattern="\d{2}/\d{2}">
                  <input class="form-input" type="text" name="class" id="class" placeholder="Klasse (1Ia)" required pattern="\d[A-Za-z]{2}">
                  <input class="form-input" type="text" name="birthday" id="birthday" onfocus="(this.type=\'date\')"onblur="(this.type=\'text\')" placeholder="Geburtsdatum">
                  <input class="form-input" type="email" name="email" id="email" placeholder="E-Mail">
                  <button class="form-btn" type="submit" id="submit">Aktualisieren</button>
              </form> 
              <a href="students"><button class="form-btn" style="width:100%;">Zurück</button></a>
          </div>';
            }
            else if($act == 'delete'){
              echo '<div class="form-form-container">
              <h1 class="form-title">Schüler Löschen</h1>
              <form class="form-form" action="../backend/deleteStudent.php" method="post">
                  <select id="listStudents" class="form-input js-data-example-ajax"></select>
                  <input class="form-input" type="text" id="name" name="name" placeholder="Vollständigen Namen Bestätigen" required>
                  <button class="form-btn" type="submit" id="submit">Unwiderruflich Löschen</button>
              </form> 
              <a href="students"><button class="form-btn" style="width:100%;">Zurück</button></a>
          </div>';
            } else {
              header('Location: students');
            }
          } else {
            echo '
              </div>
              <table id="tableStudents" class="ui celled table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Firma</th>
                        <th>Jahrgang</th>
                        <th>Klasse</th>
                        <th>Telefonnummer</th>
                        <th>Geburtsdatum</th>
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

<script>
  $('.js-data-example-ajax').select2({
  placeholder: "Wähle einen Schüler",
  ajax: {
    url: 'https://api.github.com/search/repositories',
    dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});
</script>

</body>
</html>