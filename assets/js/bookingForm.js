$('#bookingForm').hide();
$('#bookingFormBg').hide();

$('#bfMeno').prop('disabled', true);
$('#bfMeno').on('click', () => {
    $('#bfPiu').prop('disabled', false);
    n = parseInt($("#bfSdraioVal").text());
    $("#bfSdraioVal").text(--n);

    currPrice = $("#bfPriceVal").text().split(' ');
    p = parseInt(currPrice[1]);
    p -= 5;
    $("#bfPriceVal").text(`${currPrice[0]} ${p.toString()}`);
    
    if($("#bfSdraioVal").text() == "2"){
        $('#bfMeno').prop('disabled', true);
    }
})

let n = 0;
$('#bfPiu').on('click', () => {
    $('#bfMeno').prop('disabled', false);
    n = parseInt($("#bfSdraioVal").text());
    
    $("#bfSdraioVal").text(++n);
    currPrice = $("#bfPriceVal").text().split(' ');
    p = parseInt(currPrice[1]);
    p += 5;
    $("#bfPriceVal").text(`${currPrice[0]} ${p.toString()}`);

    if($("#bfSdraioVal").text() == "4"){
        $('#bfPiu').prop('disabled', true);
    }
});

$('#bfConfirmBtn').on('click', () => {
    let date = $('#bfDateVal').text().split(' / ');
    dbDate = `${date[2]}-${date[1]}-${date[0]}`; 

    let reservation_data = {
        "user_id" : sessionStorage.getItem("id"),
        "ombr_id" : $('#bfOmbrVal').text(),
        "data_prenotazione" : dbDate,
    }
    
    $.ajax({
        type: "POST",
        url: "../../php/reservation.php",
        data: JSON.stringify(reservation_data),
        dataType: "json",
        success: function (response) {
            let ombr_id = parseInt($('#bfOmbrVal').text());
            addDate(ombrelloni[ombr_id-1], date);
            $("#bfClose").click();
            $("#alert-s").css('opacity', '1');
            $("#alert-s").css('top', '0');

            setTimeout(() => {
                $("#alert-s").css('opacity', '0');
                $("#alert-s").css('top', '-60');
              }, "1000")
              
        },
        error: function(response){
            console.log('error');
        }
    });
});

$('#bfClose').on('click', () => {
    $('#bookingForm').hide();
    $('#bookingFormBg').hide();
});

let showResume = (ombrellone) =>{
    $('#bookingForm').show();
    $('#bookingFormBg').show();
    
    $('#bfNameVal').text(sessionStorage.getItem('nome'));
    $('#bfSurnameVal').text(sessionStorage.getItem('cognome'));
    $('#bfDateVal').text($('#calendarDate').text());
    $('#bfOmbrVal').text(ombrellone.id);
}

