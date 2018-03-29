


$("#ok").click(function (e) { 
    e.preventDefault();
    $('.cpass').removeClass('hide');
    $('#ok').addClass('hide');
});

$(".close").click(function (e) { 
    e.preventDefault();
    $('.cpass').addClass('hide');
    $('#ok').removeClass('hide');


    //FOR USERNAME
    document.getElementById("uname_but").style.backgroundColor = "white";
    $('.content-uname').addClass('hide');

    document.getElementById('un').value="";
    document.getElementById('password-uname').value="";

    document.getElementById('password-uname').disabled=true;
    document.getElementById('spcfc-icon-username').style.color='#1e1e1e1f';
    document.getElementById('msg-cont-text-username').style.color='#1e1e1e1f';

    //FOR PASSWORD
    document.getElementById("pass_but").style.backgroundColor = "white";
    $('.content-password').addClass('hide');

    document.getElementById('rpassword').value="";
    document.getElementById('password-pass').value="";

    document.getElementById('password-pass').disabled=true;
    document.getElementById('spcfc-icon-password').style.color='#1e1e1e1f';
    document.getElementById('msg-cont-text-password').style.color='#1e1e1e1f';

     //FOR ACCESS
    document.getElementById("access_but").style.backgroundColor = "white";
    $('.content-access').addClass('hide');
 
    document.getElementById("admin").checked = false;
    document.getElementById("employee").checked = false;


     document.getElementById('password-access').value="";
 
     document.getElementById('password-access').disabled=true;
     document.getElementById('spcfc-icon-access').style.color='#1e1e1e1f';
     document.getElementById('msg-cont-text-access').style.color='#1e1e1e1f';


});


//FOR USERNAME
    $("#uname_but").click(function (e) { 
        e.preventDefault();
        
        $('.content-uname').removeClass('hide');
        $('.content-password').addClass('hide');
        $('.content-access').addClass('hide');

        document.getElementById("uname_but").style.backgroundColor = "#1e1e1e1f";
        document.getElementById("pass_but").style.backgroundColor = "white";
        document.getElementById("access_but").style.backgroundColor = "white";

        //UNDO CHANGES FOR PASSWORD
        document.getElementById('rpassword').value="";
        document.getElementById('password-pass').value="";
        document.getElementById('password-pass').disabled=true;
        document.getElementById('spcfc-icon-password').style.color='#1e1e1e1f';
        document.getElementById('msg-cont-text-password').style.color='#1e1e1e1f';

        //UNDO CHANGES FOR ACCESS
        document.getElementById("admin").checked = false;
        document.getElementById("employee").checked = false;
        document.getElementById('password-access').value="";
        document.getElementById('password-access').disabled=true;
        document.getElementById('spcfc-icon-access').style.color='#1e1e1e1f';
        document.getElementById('msg-cont-text-access').style.color='#1e1e1e1f';

    });

//FOR PASSWORD
    $("#pass_but").click(function (e) { 
        e.preventDefault();

        $('.content-uname').addClass('hide');
        $('.content-password').removeClass('hide');
        $('.content-access').addClass('hide');
        
        document.getElementById("uname_but").style.backgroundColor = "white";
        document.getElementById("pass_but").style.backgroundColor = "#1e1e1e1f";
        document.getElementById("access_but").style.backgroundColor = "white";

        //UNDO CHANGES FOR USERNAME
        document.getElementById('un').value="";
        document.getElementById('password-uname').value="";
        document.getElementById('password-uname').disabled=true;
        document.getElementById('spcfc-icon-username').style.color='#1e1e1e1f';
        document.getElementById('msg-cont-text-username').style.color='#1e1e1e1f';

        //UNDO CHANGES FOR ACCESS
        document.getElementById("admin").checked = false;
        document.getElementById("employee").checked = false;
        document.getElementById('password-access').value="";
        document.getElementById('password-access').disabled=true;
        document.getElementById('spcfc-icon-access').style.color='#1e1e1e1f';
        document.getElementById('msg-cont-text-access').style.color='#1e1e1e1f';

        //UNDO CHANGES FOR PASSWORD
        document.getElementById('rpassword').value="";
        document.getElementById('password-pass').value="";
        document.getElementById('password-pass').disabled=true;
        document.getElementById('spcfc-icon-password').style.color='#1e1e1e1f';
        document.getElementById('msg-cont-text-password').style.color='#1e1e1e1f';
    
    });


//FOR ACCESS
$("#access_but").click(function (e) { 
    e.preventDefault();

    $('.content-uname').addClass('hide');
    $('.content-password').addClass('hide');
    $('.content-access').removeClass('hide');
    
    document.getElementById("uname_but").style.backgroundColor = "white";
    document.getElementById("pass_but").style.backgroundColor = "white";
    document.getElementById("access_but").style.backgroundColor = "#1e1e1e1f";

    document.getElementById('password-access').disabled=true;
    document.getElementById('password-access').value="";
    document.getElementById('spcfc-icon-access').style.color='#1e1e1e1f';
    document.getElementById('msg-cont-text-access').style.color='#1e1e1e1f';

    //UNDO CHANGES FOR USERNAME
    document.getElementById('un').value="";
    document.getElementById('password-uname').value="";
    document.getElementById('password-uname').disabled=true;
    document.getElementById('spcfc-icon-username').style.color='#1e1e1e1f';
    document.getElementById('msg-cont-text-username').style.color='#1e1e1e1f';


    
   
});


$(document).ready(function(){
  
    document.getElementById('password-uname').disabled=true;
    document.getElementById('password-pass').disabled=true;
    document.getElementById('password-access').disabled=true;

    //FOR USERNAME TYPE
    $('#un').on('keyup', function (){
        if($(this).val().length !=0){
           
            document.getElementById('password-uname').disabled=false;
            document.getElementById('spcfc-icon-username').style.color='black';
            document.getElementById('msg-cont-text-username').style.color='red';
        
      
    }
        else
        {
            document.getElementById('password-uname').disabled=true;
            document.getElementById('password-uname').value="";
            document.getElementById('spcfc-icon-username').style.color='#1e1e1e1f';
            document.getElementById('msg-cont-text-username').style.color='#1e1e1e1f';

           
        }
    })


    //FOR PASSWORD TYPE
    $('#rpassword').on('keyup', function (){
        if($(this).val().length !=0){
           
            document.getElementById('password-pass').disabled=false;
            document.getElementById('spcfc-icon-password').style.color='black';
            document.getElementById('msg-cont-text-password').style.color='red';
        
      
    }
        else
        {
            document.getElementById('password-pass').disabled=true;
            document.getElementById('password-pass').value="";
            document.getElementById('spcfc-icon-password').style.color='#1e1e1e1f';
            document.getElementById('msg-cont-text-password').style.color='#1e1e1e1f';

           
        }
    })


     //FOR ACCESS RB
     $('#rpassword').on('keyup', function (){
        if($(this).val().length !=0){
           
            document.getElementById('password-pass').disabled=false;
            document.getElementById('spcfc-icon-password').style.color='black';
            document.getElementById('msg-cont-text-password').style.color='red';
        
      
    }
        else
        {
            document.getElementById('password-pass').disabled=true;
            document.getElementById('password-pass').value="";
            document.getElementById('spcfc-icon-password').style.color='#1e1e1e1f';
            document.getElementById('msg-cont-text-password').style.color='#1e1e1e1f';

           
        }
    })

    $('#admin').change(function() {
    if ($(this).val() == 'Admin') {
        document.getElementById('password-access').disabled=false;
        document.getElementById('spcfc-icon-access').style.color='black';
        document.getElementById('msg-cont-text-access').style.color='red';
    }
    else {
        document.getElementById('password-access').disabled=true;
        document.getElementById('password-access').value="";
        document.getElementById('spcfc-icon-access').style.color='#1e1e1e1f';
        document.getElementById('msg-cont-text-access').style.color='#1e1e1e1f';
    }
});

$('#employee').change(function() {
    if ($(this).val() == 'Employee') {
        document.getElementById('password-access').disabled=false;
        document.getElementById('spcfc-icon-access').style.color='black';
        document.getElementById('msg-cont-text-access').style.color='red';
    }
    else {
       
        document.getElementById('password-access').disabled=true;
        document.getElementById('password-access').value="";
        document.getElementById('spcfc-icon-access').style.color='#1e1e1e1f';
        document.getElementById('msg-cont-text-access').style.color='#1e1e1e1f';
    }
});


});
