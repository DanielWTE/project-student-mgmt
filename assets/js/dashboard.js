let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

$(document).ready(function () {
  $('#tableStudents').DataTable({
    select: true,
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/de-DE.json'
    }
  });

  $('#tableTeacher').DataTable({
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/de-DE.json'
    }
  });

  $('#tableClasses').DataTable({
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/de-DE.json'
    }
  });

  $('#tableSubjects').DataTable({
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/de-DE.json'
    }
  });

  $('#tableScores').DataTable({
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/de-DE.json'
    }
  });
});

$('#open1').click(function(event) {
  event.preventDefault();
  this.blur();
  $.get(this.href, function(html) {
    $(html).appendTo('body').modal({
      fadeDuration: 150,
      closeClass: 'icon-remove',
      closeText: 'x'
    });
  });
});

$(document).ready(function () {
$('#listStudents').select2({
  placeholder: "Auswahl an Schülern",
  ajax: {
    url: 'https://api.github.com/search/repositories',
    dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});

$('#listTeachers').select2({
  placeholder: "Auswahl an Lehrpersonen",
  ajax: {
    url: 'backend/lists/listTeacher.php',
    dataType: 'json',
    delay: 250,
    data: function (data) {
        return {
            searchTerm: data.term // search term
        };
    },
    processResults: function (response) {
        return {
            results:response
        };
    },
    cache: true
}
});

$('#listClasses').select2({
  placeholder: "Auswahl an Klassen",
  ajax: {
    url: 'https://api.github.com/search/repositories',
    dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});

$('#listSubjects').select2({
  placeholder: "Auswahl an Fächern",
  ajax: {
    url: 'https://api.github.com/search/repositories',
    dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});

$('#listScores').select2({
  placeholder: "Auswahl an Noten",
  ajax: {
    url: 'https://api.github.com/search/repositories',
    dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});
});


function fetchTeacherData(){
  let username = $('#listTeachers').text();
  $.ajax({
    url:'backend/teacher/fetchTeacherData.php',
    method:'POST',
    data:{
      username:username,
    },
    success:function(data){
      const obj = JSON.parse(data);
      let username = document.getElementById('username');
      let name = document.getElementById('name');
      let role = document.getElementById('role');
      let room = document.getElementById('room');
      let email = document.getElementById('email');
      
      username.value = "";
      username.value = obj['username'];
      name.value = "";
      name.value = obj['name'];
      role.value = "";
      role.value = obj['role'];
      room.value = "";
      room.value = obj['room'];
      email.value = "";
      email.value = obj['email'];

    }
  });
}


/* Requests */

function submitCreateTeacher(){
  let form = $('#createTeacher');
  // Hier gibt es ggf. Probleme / Also mal deaktiviert lol
  // if(form.valid()){
    formData = form.serialize();
    formParams = new URLSearchParams(formData);
    console.log(formParams);
    let name = formParams.get('name');
    let role = formParams.get('role');
    let subjects = formParams.get('subjects');
    let room = formParams.get('room');
    let birthdate = formParams.get('birthdate');
    let email = formParams.get('email');
    let password = formParams.get('password');
    let password2 = formParams.get('password2');

    $.ajax({
      url:'../../backend/teacher/createTeacher.php',
      method:'POST',
      data:{
        name:name,
        role:role,
        subjects:subjects,
        room:room,
        birthdate:birthdate,
        email:email,
        password:password,
        password2:password2
      },
      success:function(data){
      if(data == "success"){
                      window.location.href = "/teacher.php";
                  } else {
                      alert("Etwas ist Schief gegangen. Versuch es erneut!");
                  }
      }
    });
  }
// }