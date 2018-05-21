$(document).ready(function func() {

        $('#add_inout_in').on('click', function () {
            var username_inout_in = $('#username_inout_in').val(),
            date_in_inout_in = $('#date_in_inout_in').val(),
            date_out_inout_in = $('#date_out_inout_in').val(),
            time_in_inout_in = $('#time_in_inout_in').val(),
            time_out_inout_in = $('#time_out_inout_in').val(),
            email_inout_in = $('#email_inout_in').val(),
            message_inout_in = $('#message_inout_in').val(),
            name_inout_in = $('#name_inout_in').val()
              
               
    
            if (date_in_inout_in == "" ||  time_in_inout_in=="" ||  time_out_inout_in=="" ||  date_out_inout_in=="" ) {
                swal({
                    title: "",
                    text:"PLEASE FILL UP THE REQUIRED FIELDS",
                    type: "warning",
                  });
    
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'add_in_out_in.php',
                    data: {
                        username_inout_in:username_inout_in,
                        date_in_inout_in: date_in_inout_in,
                        date_out_inout_in:date_out_inout_in,
                        time_in_inout_in: time_in_inout_in,
                        time_out_inout_in: time_out_inout_in,
                        email_inout_in:email_inout_in,
                        message_inout_in:message_inout_in,
                        name_inout_in:name_inout_in
                    
    
                    },
                    success: function (data) {
                        $('#retrieve').html(data);
                        document.getElementById('date_in_inout_in').value = '';
                        document.getElementById('time_in_inout_in').value = '';
                        document.getElementById('time_out_inout_in').value = '';
                        document.getElementById('date_out_inout_in').value = '';
                        document.getElementById('email_inout_in').value = '';
                        document.getElementById('message_inout_in').value = '';
                       
                      
                        swal({
                            title: "Email Sent",
                            text: "We hope you enjoyed your work at Kestrel",
                            type: 'success',
                            showConfirmButton:false,
                            closeOnClickOutside: false,
                            }, function(){
                                window.location.reload();
                              });
                              setTimeout(function() {
                                window.location.reload();
                            }, 3000);
                    }
                });
            }
        });
    
        
    });
    
    
    