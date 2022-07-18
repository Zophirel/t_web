<?php
    if(isset($_COOKIE['PHPSESSID'])){
        header('Location: php/app.php');
        die();
    }
?>
<html> 
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
        <link rel="stylesheet" href="assets/css/home.css">
        <link rel="stylesheet" href="assets/css/home_form.css">        
    </head>
    <body>
        <div id="homePageLayout"> 
            <p class="slogan">Prenota il<br>tuo posto<br>a due passi<br>dal mare</p>
            <form id="loginForm" class="requires-validation" method="POST" action="" novalidate>

            <div class="card" id="loginCard">
                <p class="h1" id="cardHeader">Accedi</p>
                
                <div class="loginInput" id="nomeCtn">
                    <label class="form-label">Nome</label>
                    <input class="form-control" type="text" id="nome" required>
                </div>
                <div class="loginInput" id="cognomeCtn">
                    <label class="form-label">Cognome</label>
                    <input class="form-control" type="text" id="cognome" required>
                </div>
                <div class="loginInput" id="emailCtn">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" id="email" required>
                    
                    <div class="invalid-feedback">Email errata</div>
                </div>

                <div class="loginInput" id="passwordCtn">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" required>
                    
                    <div class="invalid-feedback">La password non puo essere vuota</div>
                </div>
                
                <div id="btnCtn">
                    <button type="submit" class="btn btn-primary" id="loginBtn" aria-describedby="signUpHelp">Accedi</button>
                    <div id="signupHelp" class="form-text">
                        <p id="signupHint">Non hai ancora un account?</p>
                        <a id="signupLink" href="#">Iscriviti</a>
                    </div>
                </div>
            </div>
        </form>
        </div>
    <script src="assets/js/homepage.js"></script>
    </body>
    
</html>