

function openNav() {
    document.getElementById("mySidenav").style.width = "315px";
    document.getElementById("overlay").style.display = "block";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("overlay").style.display = "none";
}

$(function() {
    $('#uname').on('keypress', function(e) {
        if (e.which == 32)
            return false;
    });
    $('#uname').on("input", function () {
        $(this).val($(this).val().replace(/ /g, ""));
    });
});


document.querySelector("#new-emp").addEventListener("click", function () {
    document.querySelector(".main-row").classList.remove('hide');
    document.querySelector(".sign-up-modal").classList.add('hide');
});


$("#new-emp").click(function (e) { 
    e.preventDefault();
    $('.main-row').addClass('hide');
    $('.sign-up-modal').removeClass('hide');
    $('.icon-bar-admin').addClass('hide');
    $('.search').addClass('hide');
    $('.icon-bar-admin-add').removeClass('hide');
});


$("#log-in").click(function (e) {
    e.preventDefault();
    $('.main-row').addClass('hide');
    $('.employee-modal').removeClass('hide');
    $('.search').removeClass('hide');
});



$(document).ready(function(){
    //$('#signUpBtn').css('background',"yellow");
    $('#signUpBtn').css('visibility', "hidden");
    $('#signUpBtnDum').attr('disabled', true); 
    $('#signUpBtnDum').css('visibility', "visible"); 
    

    $('#correctpass').html('');
   
    



    $('#rpassword, #cpassword').on('keyup', function (){
        if($(this).val().length !=0){
            // $('#rpassword, #cpassword').on('keyup', function () {
                if ($('#rpassword').val() == $('#cpassword').val()) {
                    // $('#signUpBtn').attr('disabled',false);
                    $('#correctpass').html('Password Match').css('color', 'green');
                    $('#signUpBtn').css('visibility', "visible");
                    $('#signUpBtnDum').attr('disabled', true); 
                    $('#signUpBtnDum').css('visibility', "hidden"); 
                } 
                else {
                    $('#signUpBtn').css('visibility', "hidden");
                    $('#signUpBtnDum').css('visibility', "visible"); 
                    $('#signUpBtnDum').attr('disabled', true); 

                $('#correctpass').html('Password Not Match').css('color', 'red');
            //   });
        }
    }
        else
        {
            $('#signUpBtn').css('visibility', "hidden");
            $('#signUpBtnDum').attr('disabled', true); 
            $('#signUpBtnDum').css('visibility', "visible"); 
                 
           $('#correctpass').html('');
        }
    })



});

