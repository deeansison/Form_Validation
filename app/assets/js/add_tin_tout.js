$(document).ready(function func() {

status = $('#status_onwork').val()

if (status == "Out") {
    $('.out').removeClass('hide');
    $('.in').addClass('hide');
}

if (status == "On Work") {
    $('.in').removeClass('hide');
    $('.out').addClass('hide');
}

    
    //AJAX BABEH
    $('#add_inout').on('click', function () {
        var username_inout = $('#username_inout').val(),
            date_in_inout = $('#date_in_inout').val(),
            date_out_inout = $('#date_out_inout').val(),
            time_in_inout = $('#time_in_inout').val(),
            time_out_inout = $('#time_out_inout').val(),
            email_inout = $('#email_inout').val(),
            message_inout = $('#message_inout').val(),
            name_inout = $('#name_inout').val()

        if (date_in_inout == "" ||  time_in_inout=="" ||  time_out_inout=="" ||  date_out_inout=="") {
            swal({
                title: "",
                text:"PLEASE FILL UP THE REQUIRED FIELDS",
                type: "warning",
              });

        } 
      
        
            else {
            $.ajax({
                type: 'POST',
                url: 'add_in_out.php',
                data: {
                    username_inout:username_inout,
                    date_in_inout:date_in_inout,
                    date_out_inout:date_out_inout,
                    time_in_inout:time_in_inout,
                    time_out_inout:time_out_inout,
                    email_inout:email_inout,
                    message_inout:message_inout,
                    name_inout:name_inout
                

                },
                success: function (data) {
                    $('#retrieve').html(data);
                    document.getElementById('date_in_inout').value = '';
                    document.getElementById('time_in_inout').value = '';
                    document.getElementById('time_out_inout').value = '';
                    document.getElementById('date_out_inout').value = '';
                    document.getElementById('email_inout').value = '';
                    document.getElementById('message_inout').value = '';

                    swal({
                        title: "",
                        text: "Succesfully Added",
                        type: "success",
                      });
                }
            });
        }
    });

    
});


