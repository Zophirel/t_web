let Calendario = () => { 
    let today = new Date;
    let dates = [];

    
    let dataCell = (day) => {
        let dayElem = document.createElement('div');
        dayElem.append(document.createElement('p').innerText = day);
        dates.push(
            {
                "day" : day,
                "elem" : dayElem 
            }
        )
        return dates[dates.length-1];
    }

    let initCalendar = (parentElem) => {
        let monthDays = new Date(today.getFullYear(), today.getMonth()+1, 0).getDate();
        for(let i = 1; i <= monthDays; i++){
            parentElem.append(dataCell(i).elem);
        }
    }

    let editDate = (day, month, year) => {
        let currDate = new Date;
        currDate.setDate(day);
        currDate.setMonth(month-1);
        currDate.setFullYear(year)
    }

    return {
        "init" : initCalendar,
        "dataCell" : dataCell,
        "editDate" : editDate
    };
}