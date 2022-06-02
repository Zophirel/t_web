let isLoggingIn = true;

$(document).ready(() =>{
    
    $('#signupLink').on('click', ()=>{
        if(isLoggingIn){
            $('#cardHeader').text('Sign Up');
            $('#signupHint').text("Already have an account?");
            $('#signupLink').text('Sign In');
            isLoggingIn = false;
        }else{
            $('#cardHeader').text('Sign In');
            $('#signupHint').text("Don't have an account yet?");
            $('#signupLink').text('Sign Up');
            isLoggingIn = true;
        }
    });

    $('#loginBtn').on('click', () => {
        let email =  $('#email').val();
        let pass  =  $('#password').val();
    });

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
    