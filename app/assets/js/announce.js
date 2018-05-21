
$(document).ready(function func() {
    
    //AJAX BABEH
    $('#annpost').on('click', function () {
        var username = $('#username').val(),
            ann = $('#ann').val(),
            user_img = $('#user_img').val(),
            name_emp = $('#name_emp').val()
          
           

        if (ann == "" ) {
            // alert('all fields are required!');
            swal({
                title: "",
                text:"All fields are required",
                type: "warning",
              });
            // window.alert("Please enter your name.");
           
            // ann.focus();
     
        } else {
            $.ajax({
                type: 'POST',
                url: 'announcement.php',
                data: {
                    name_emp: name_emp,
                    username: username,
                    ann: ann,
                    user_img: user_img
                

                },
                success: function (data) {
                    $('#retrieve').html(data);
                    document.getElementById('ann').value = '';

                    swal({
                        title: "",
                        text: "Announcement successfully posted!",
                        type: "success",
                      });
                }
            });
        }
    });

    
});