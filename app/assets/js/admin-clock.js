
function startTime() {

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yy = today.getFullYear();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    //Add a zero in front of numbers<10
    if(hr<10)  {
        hr='0'+hr 
    } 
    
    if(min<10)  { 
        min='0'+min 
    }

    if(sec<10) { 
        sec='0'+sec 
    } 
    if(dd<10)  {
        dd='0'+dd 
    } 
    
    if(mm<10)  { 
        mm='0'+mm 
    }


    document.getElementById("clock").innerHTML = hr + " : " + min + " : " + sec;
    document.getElementById("date").innerHTML = mm + " / " + dd + " / " + yy;


    var time = setTimeout(function () { startTime() }, 1000);

}






  
  
