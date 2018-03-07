
function startTime() {

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yy = today.getFullYear();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    //Add a zero in front of numbers<10
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + " : " + min + " : " + sec;
    document.getElementById("date").innerHTML = dd + " / " + mm + " / " + yy;
    document.querySelector('#time_in').value = hr + " : " + min + " : " + sec;
    document.querySelector('#time_out').value = hr + " : " + min + " : " + sec;
    document.querySelector('#date_in').value = dd + " / " + mm + " / " + yy;
    document.querySelector('#date_out').value = dd + " / " + mm + " / " + yy;
    var time = setTimeout(function () { startTime() }, 500);

}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}