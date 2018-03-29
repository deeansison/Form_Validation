
var $cell = $('.card');

//open and close card when clicked on card
$cell.find('.js-expander').click(function () {

    var $thisCell = $(this).closest('.card');

    if ($thisCell.hasClass('is-collapsed')) {
        $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed').addClass('is-inactive');
        $thisCell.removeClass('is-collapsed').addClass('is-expanded');

        if ($cell.not($thisCell).hasClass('is-inactive')) {
            //do nothing
        } else {
            $cell.not($thisCell).addClass('is-inactive');
        }

    } else {
        $thisCell.removeClass('is-expanded').addClass('is-collapsed');
        $cell.not($thisCell).removeClass('is-inactive');
    }
});

//close card when click on cross
$cell.find('.js-collapser').click(function () {

    var $thisCell = $(this).closest('.card');

    $thisCell.removeClass('is-expanded').addClass('is-collapsed');
    $cell.not($thisCell).removeClass('is-inactive');

});
function openNav() {
    document.getElementById("mySidenav").style.width = "315px";
    document.getElementById("overlay").style.display = "block";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("overlay").style.display = "none";
}






// function w3_open() {
//     document.getElementById("mySidebar").style.display = "block";
//     document.getElementById("myOverlay").style.display = "block";
//   }
  
//   function w3_close() {
//     document.getElementById("mySidebar").style.display = "none";
//     document.getElementById("myOverlay").style.display = "none";
//   }





document.querySelector("#new-emp").addEventListener("click", function () {
    document.querySelector(".main-row").classList.remove('hide');
    document.querySelector(".sign-up-modal").classList.add('hide');
});


$("#new-emp").click(function (e) { 
    e.preventDefault();
    $('.main-row').addClass('hide');
    $('.sign-up-modal').removeClass('hide');
});


$("#log-in").click(function (e) {
    e.preventDefault();
    $('.main-row').addClass('hide');
    $('.employee-modal').removeClass('hide');
});



// $(document).ready(function(){
//     $('#signUpBtn').attr('disabled',true);
//     $('#cpassword').keyup(function(){
//         if($(this).val().length !=0){
          
//             var check = function() {
//                 if (document.getElementById('rpassword').value ==
//           document.getElementById('cpassword').value) {

//             $('#signUpBtn').attr('disabled',false);

//           }

//           else{
//             $('#signUpBtn').attr('disabled',true);

//           }

//             }

            
//         }
          
//         else{
//             $('#signUpBtn').attr('disabled',true);
//         }
           
//     })

// });

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
                } else {
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



    // document.getElementById('signUpBtn').disabled = true;



    // var check = function() {
    //     if (document.getElementById('rpassword').value ==
    //       document.getElementById('cpassword').value) {
    //         document.getElementById('signUpBtn').disabled = false;
    //     } else {
    //         document.getElementById('signUpBtn').disabled = true;
    //     }
    //   }
    



