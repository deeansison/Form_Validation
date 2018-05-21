


$(document).ready(function(){



    document.getElementById('password-pass').disabled=true;
    document.getElementById('password-pass').value="";
    document.getElementById('spcfc-icon-password').style.color='#1e1e1e1f';
    document.getElementById('msg-cont-text-password').style.color='#1e1e1e1f';
    document.getElementById('update-password').disabled=true;



    //FOR PASSWORD TYPE
    $('#rpassword').on('keyup', function (){
        if($(this).val().length !=0){
           
            document.getElementById('password-pass').disabled=false;
            document.getElementById('spcfc-icon-password').style.color='black';
            document.getElementById('msg-cont-text-password').style.color='red';
            document.getElementById('update-password').disabled=false;
        
      
    }
        else
        {
            document.getElementById('password-pass').disabled=true;
            document.getElementById('password-pass').value="";
            document.getElementById('spcfc-icon-password').style.color='#1e1e1e1f';
            document.getElementById('msg-cont-text-password').style.color='#1e1e1e1f';

           
        }
    })





});

