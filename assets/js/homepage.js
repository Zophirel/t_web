let isLoggingIn = true; 
$('#signupLink').on('click', ()=>{ 
  if(isLoggingIn){
        $('#cardHeader').text('Iscriviti');
        $('#loginBtn').text('Iscriviti');
        $('#signupHint').text("Hai gia' un account?");
        $('#signupLink').text('Accedi');
        
        $('#loginCard').attr("id", 'signupCard');
        $('#nomeCtn').css("display", "inherit");
        $('#nomeCtn').css("opacity", "1");
        $('#cognomeCtn').css("display", "inherit");
        $('#cognomeCtn').css("opacity", "1");
        
        isLoggingIn = false;
    }else{
        $('#cardHeader').text('Accedi');
        $('#loginBtn').text('Accedi');
        $('#signupHint').text("Non hai ancora un account?");
        $('#signupLink').text('Iscriviti');
        
        $('#signupCard').attr("id", 'loginCard');
        $('#nomeCtn').css("display", "none");
        $('#nomeCtn').css("opacity", "0");
        $('#cognomeCtn').css("display", "none");
        $('#cognomeCtn').css("opacity", "0");
        isLoggingIn = true;
    }
});

$('#loginForm').submit((e) => { 
  e.preventDefault();
  if(isLoggingIn){
    user = {
      "email": $('#email').val(),
      "pass":  $('#password').val(),
    }
    
    $.ajax({
      url: '../../php/login.php',
      type: 'post',
      dataType: 'json',
      contentType: 'application/json',
      data: JSON.stringify(user),
      success: function(response) {
        sessionStorage.setItem('nome', response['nome']);
        sessionStorage.setItem('cognome', response['cognome']);
        sessionStorage.setItem('id', response['id']);
        window.location.href='../../php/app.php';
      },
      error: function (response) {  
        console.log(response);
      }
    });
  }else{
    let user = {
      "nome":  $('#nome').val(),
      "cognome":  $('#cognome').val(),
      "email": $('#email').val(),
      "pass": $('#password').val()
    }
    $.ajax({
      url: '../../php/signup.php',
      type: 'post',
      dataType: 'json',
      contentType: 'application/json',
      data: JSON.stringify(user)
    });
  }
});



(function () {
    'use strict'
    const forms = document.querySelectorAll('.requires-validation')
    Array.from(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
    
          form.classList.add('was-validated')
        }, false)
      })
    })()
    