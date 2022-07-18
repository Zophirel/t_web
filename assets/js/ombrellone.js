function createOmbrellone (id) {  
    const img = new Image();
    img.src = "assets/img/Vector.svg";
    img.className = "ombrellone";
    $(img).attr("id", id);
    return img;
}

let ombrelloni = [];

function fetchDates(ombr){
    if(ombr.dates.length > 0){
        let dateToCehck = getCurrentDate();
        let settedNow = false;
        for(let i = 0; i < ombr.dates.length; i++){
            if(ombr.dates[i][0] == dateToCehck[0] && ombr.dates[i][1] == dateToCehck[1] && ombr.dates[i][2] == dateToCehck[2]){                
                $(ombr.elem).addClass("desabled");
                ombr.enabled = 0;
                settedNow = true;
            }else if(!ombr.enabled && !settedNow){   
                $(ombr.elem).removeClass("desabled");
                ombr.enabled = 1;
            }
        }
    }
}

function addDate(ombr, date){
    ombr.dates.push(date);
    ombr.enabled = 0;
    $(ombr.elem).addClass("desabled");
}

function initOmbrellone(bookedDates, img, id) {

    if(ombrelloni.length <= 200){
        let dateString;
        let objDate = [];
        if(bookedDates.length > 0){
            for(let i = 0; i < bookedDates.length; i++){
                dateString = bookedDates[i].split('-');
                objDate[i] = [parseInt(dateString[2]), parseInt(dateString[1]), parseInt(dateString[0])]; 
            } 
            
        }
        const obj = {
            id,
            elem: img,
            dates: objDate,
            enabled: 1,
        };
        ombrelloni.push(obj);
    }
    if(ombrelloni.length == 200){
        for(let i = 0; i < ombrelloni.length; i++){
            fetchDates(ombrelloni[i]);
        }
    }
}

let generateOmbrelloni = () => {
    for(let i = 1; i < 201; i++){
        const id = i;
        const ombrellone = createOmbrellone(id);
        $('#container').append(ombrellone);
        $.getJSON("../../php/booked.php", { id })
        .done((response) => {
            initOmbrellone(response, ombrellone, id);
            if(ombrelloni.length == 200){
               
            }
        })
        .fail(console.log);     
    }
}

let listDates = () => {
    console.log(ombrelloni.length);
    for(let i = 0; i < ombrelloni.length; i++){
        console.log(ombrelloni[i]);
    }
}

$(document).ready(function () {
    generateOmbrelloni();
    $('.ombrellone').on('click', (event) => {
        //console.log(ombrelloni[event.target.id-1].dates);
        if(ombrelloni[event.target.id-1].enabled){
            showResume(ombrelloni[event.target.id-1]);
        }
    });

});


/*let getDates = (id) => {
    fetch(`../../php/booked.php?id=${id}`)
    .then(
    response  => {
        console.log(response.json);
    },
    rejection => {
        console.log("error");
        console.error(rejection.message);
    });
}

let ombrellone = (id) =>{
    this.id = id;
    this.elem =  document.createElement('img');
    $(this.elem).attr("src", "assets/img/Vector.svg");
    $(this.elem).attr("class", "ombrellone");
    return  {
                "id"   : this.id,
                "elem" : this.elem,
                "dates": [],
            }
}*/

