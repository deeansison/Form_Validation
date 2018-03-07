$(document).ready(function() {

    $('#su').on('click', function(){
        $('.employee-modal').addClass('hide');
        $('.sign-up-modal').removeClass('hide');
    });

    //AJAX BABEH
    $('#signUpBtn').on('click', function(){
        var firstName = $('#fn').val(),
            middleName = $('#mn').val(),
            lastName = $('#ln').val(),
            emailAdd = $('#ea').val(),
            contNum = $('#cn').val(),
            userName = $('#uname').val(),
            password = $('#rpassword').val();

            if(firstName == "" || middleName == "" || lastName == "" || 
            emailAdd =="" || contNum == "" || userName == "" || password == ""){
                alert('all fields are required!');
            }else{
                $.ajax({
                    type: 'POST',
                    url: 'php/insert.php',
                    data: {
                        fn: firstName,
                        mn: middleName,
                        ln: lastName,
                        ea: emailAdd,
                        cn: contNum,
                        un: userName,
                        pw: password
                    },
                    success: function(data) {
                        $('#retrieve').html(data);
                    } 
                });
            }

    });

});

// NATIVE JAVASCRIPT 

// document.querySelector("#su").addEventListener("click", function(){
//     document.querySelector(".login-in-modal").classList.add('hide');
//     document.querySelector(".sign-up-modal").classList.remove('hide');
// });

document.querySelector("#li").addEventListener("click", function(){
    document.querySelector(".employee-modal").classList.remove('hide');
    document.querySelector(".sign-up-modal").classList.add('hide');
});

document.querySelector("#cpassword").addEventListener("keypress", function(){
    var rp = document.querySelector("#rpassword").value;
    var cp = document.querySelector("#cpassword").value;
});





