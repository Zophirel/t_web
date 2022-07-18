<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="assets/js/ombrellone.js"></script>
</head>

<body>


    <div id="bookingFormBg"></div>
        <div id="bookingForm">
        <p id="bookingHeader">Prenotazione</p>
        
        <div id="bfName">
            <p class="bfLabel">Nome</p>
            <p id="bfNameVal">ok</p>
        </div>

        <div id="bfSurname">
            <p class="bfLabel">Cognome</p>
            <p id="bfSurnameVal"></p>
        </div>

        <div id="bfDate">
            <p class="bfLabel">Data prenotazione</p>
            <p id="bfDateVal"></p>
        </div>

        <div id="bfOmbr">
            <p class="bfLabel">Ombrellone</p>
            <p id="bfOmbrVal"></p>
        </div>

        <div id="bfSdraio">
            <p>Sdraio</p>
        </div>

        <div id="bfSdraioCounter">
            <button id="bfMeno">-</button>
            <p id="bfSdraioVal">2</p>
            <button id="bfPiu">+</button>
        </div>

        <div id="bfPrice">
            <p>Totale</p>
           
        </div>
        <p id="bfPriceVal">€ 10</p>
        <div id="bfConfirm"> 
            <button id="bfConfirmBtn">Conferma</button>    
        </div>

        <div id="bfClose"> 
            <button id="bfCloseBtn">Annulla</button>    
        </div>
            
    </div>
    
    <div id="hompageLayout">
        <div class="alert alert-success" id="alert-s" role="alert">Prenotazione effettuata!</div>

        <div id="calendarCtn">
            <svg xmlns="http://www.w3.org/2000/svg" id="calendarIcon" width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <rect x="4" y="5" width="16" height="16" rx="2" />
                <line x1="16" y1="3" x2="16" y2="7" />
                <line x1="8" y1="3" x2="8" y2="7" />
                <line x1="4" y1="11" x2="20" y2="11" />
                <line x1="10" y1="16" x2="14" y2="16" />
                <line x1="12" y1="14" x2="12" y2="18" />
            </svg>
        </div>

        <div id="userBtn">
            <svg xmlns="http://www.w3.org/2000/svg" id="userIcon" width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="7" r="4" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
            </svg>
        </div>

        <div id="calendarCard">
            <div id="calendarMonthCtn">
                <div id="backArrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                </div>

                <div id="nextArrow"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </div>
            </div>

            <div class="calendarDays"></div>
        </div>

        <div id="gridCtn">
            <div id="container"></div>
        </div>
        <div id="foam"></div>
        <div id="sea"></div>
    </div>


    <script src="assets/js/app.js"></script>
</body>
<script src="assets/js/bookingForm.js"></script>
</html>