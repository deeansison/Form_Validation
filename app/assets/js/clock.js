
function startTime() {
 
    
    var today = new Date();
    var dd = today.getDate();
    var ddot = today.getDate()+1;
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
    if(ddot<10)  {
        ddot='0'+ddot 
    } 
    
    if(mm<10)  { 
        mm='0'+mm 
    }

    
    document.getElementById("clock").innerHTML = hr + " : " + min + " : " + sec;
    document.getElementById("date").innerHTML = mm + " / " + dd + " / " + yy;
    document.querySelector('#time_in').value = hr+":"+min+":"+sec;
    document.querySelector('#time_out').value = hr+":"+min+":"+sec;
    document.querySelector('#date_in').value = yy+"-"+ mm+"-"+dd;
    document.querySelector('#date_out').value = yy+"-"+mm+"-"+dd;

    document.querySelector('#datenow_OT').value = yy+"-"+mm+"-"+dd;
    // document.querySelector('#date_OT').value = yy+"-"+ mm+"-"+ddot;

    var time = setTimeout(function () { startTime() }, 1000);
}





  
  
