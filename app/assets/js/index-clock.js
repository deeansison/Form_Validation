
// FOR SIDE NAVIGATION
function openNav() {
    document.getElementById("mySidenav").style.width = "315px";
    document.getElementById("overlay").style.display = "block";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("overlay").style.display = "none";
}
// END/FOR SIDE NAVIGATION


// FOR CLOCK
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
    document.getElementById("date").innerHTML = mm + " / " + dd + " / " + yy;
    var time = setTimeout(function () { startTime() }, 1000);
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
// END/FOR CLOCK




  
  
