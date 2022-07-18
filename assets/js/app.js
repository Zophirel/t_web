let refreshOmbrellone = (date) => {
    console.log(ombrelloni);
    for(let i = 0; i < ombrelloni.length; i++){  
        fetchDates(ombrelloni[i]);
    }
}

let dateCell = (day) =>{
    let dayElem = document.createElement('div');
    dayElem.append(document.createElement('p').innerText = day);
    
    $(dayElem).on('click' , () => {
        updateDay(day);
        $("#calendarCard").animate({
            opacity: '0',
        })
        setTimeout(() => {
            $("#calendarCard").css("display", "none");
        }, 400);
        isActive = false;
        refreshOmbrellone();
    });

    return {
        "day"  : day,
        "elem" : dayElem
    }
}

let isActive = false;
$('#calendarCtn').on('click', () => {
    if (!isActive) {
        $("#calendarCard").css("display", "grid");
        $("#calendarCard").animate({ 
            opacity: '1'
        });
        isActive = true;
    }
});

$("#calendarCard").on('mouseleave', () => {
    if (isActive) {
        $("#calendarCard").animate({
            opacity: '0',
        });
        setTimeout(() => {
            $("#calendarCard").css("display", "none");
        }, 400);
        isActive = false;
    }
});

let days = new Array();

for (let i = 1; i < 31; i++) {
    let day = dateCell(i);
    days.push(day);
    $('.calendarDays').append(day.elem);
}

let calendar_date_txt = document.createElement('p');
$(calendar_date_txt).attr("id", "calendarDate");
let calendar_date = new Date();

let currDay = calendar_date.getDate();
let currMonth = calendar_date.getUTCMonth() + 1;
let currYear = calendar_date.getFullYear();
calendar_date_txt.innerText = `${currDay} / ${currMonth} / ${currYear}`;
$("#calendarCtn").append(calendar_date_txt);

let months = ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'];
let monthText = months[--currMonth];
let calendarMonth = currMonth;

let monthLabel = document.createElement('p');
$(monthLabel).attr('id', 'calendarMonthName');
monthLabel.innerText = monthText;
$(monthLabel).insertAfter($("#backArrow"));

let updateCalendarDate = (day, month, year) => {
    currDay = day;
    
    if(month !== undefined){
        currMonth = month;
    }
    if(year !== undefined){
        currYear = year;
    }

    calendar_date_txt.innerText = `${day} / ${month} / ${year}`;
}

let updateDay = (day) => {
    let dateString = calendar_date_txt.innerText.split(' / ');
    dateString[0] = currDay = day;
    calendar_date_txt.innerText = `${dateString[0]} / ${dateString[1]} / ${dateString[2]}`;
}

let updateMonth = (month) => {
    let dateString = calendar_date_txt.innerText.split(' / ');
    dateString[1] = currMonth = month;
    calendar_date_txt.innerText = `${dateString[0]} / ${dateString[1]} / ${dateString[2]}`;
        
}

let updateYear = (year) => {
    let dateString = calendar_date_txt.innerText.split(' / ');
    dateString[2] = currYear = year;
    calendar_date_txt.innerText = `${dateString[0]} / ${dateString[1]} / ${dateString[2]}`;
}

let getCurrentDate = () => {
    let dateString = calendar_date_txt.innerText.split(' / ');
    return [parseInt(dateString[0]), parseInt(dateString[1]), parseInt(dateString[2])];
}


$("#backArrow").on('click', () => {
    if (calendarMonth > 5) {
        monthText = months[--calendarMonth];
        monthLabel.innerText = monthText;
        updateMonth(calendarMonth+1);
        
    }
    if(calendarMonth == 5){
        if($(".calendarDays")[0].children.length == 31){
            $('.calendarDays').children().last().remove();
            days.slice(0, -1);
        }
    }
});

$("#nextArrow").on('click', () => {
    if (calendarMonth < 7) {
        monthText = months[++calendarMonth];           
        monthLabel.innerText = monthText;
        updateMonth(calendarMonth+1);

        let lastDay = dateCell(31);
        days.push(lastDay);
        if($(".calendarDays")[0].children.length == 30){
            if(calendarMonth > 5){                        
                $('.calendarDays').append(lastDay.elem);
            }
        }
    }
});
