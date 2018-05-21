stat = $('#statusform').val()

if (stat == "Out") {
    document.getElementById('button_out').style.display="none";
    document.getElementById('button_in').style.display="block";
    document.getElementById('statusdummy').value = 'Out';
    document.getElementById('statusdummy2').value = 'Out';
}

if (stat == "On Work") {
    document.getElementById('button_out').style.display="block";
    document.getElementById('button_in').style.display="none";
    document.getElementById('statusdummy').value = 'On Work';
    document.getElementById('statusdummy2').value = 'On Work';
}


$(document).ready(function () {
    //AJAX BABEH

    // TIME-IN
    $('#button_in').on('click', function () {
        var 
        time_in = $('#time_in').val(),
        date_in = $('#date_in').val(),
        time_out = $('#time_out').val(),
        date_out = $('#date_out').val(),
        username = $('#username').val(),
        statusform = $('#statusform').val()
           
        if (date_out == "" ) {
            alert('all fields are required!');
        } else {
            $.ajax({

                type: 'POST',
                url: 'time_in_out.php',
                data: {
                    time_in: time_in,
                    date_in: date_in,
                    time_out: time_out,
                    date_out: date_out,
                    username: username,
                    statusform: statusform
                },
                success: function (data) {
                    $('#retrieve').html(data);
                    document.getElementById('button_out').style.display="block";
                    document.getElementById('button_in').style.display="none";
                    document.getElementById('statusdummy').value = 'On Work'; 
                    document.getElementById('statusdummy2').value = 'On Work'; 
                    window.location.href = 'user.php';
                }
            });
        }
    });
    // END/TIME-IN

    // TIME-OUT
    $('#button_out').on('click', function () {
        var 
        time_out = $('#time_out').val(),
        date_out = $('#date_out').val(),
        username = $('#username').val(),
        tin = $('#tin').val(),
        din = $('#din').val(),
        ot_req=$('#ot_req').val()

        if (date_out == "" ) {
            alert('all fields are required!');
        } else {

            if(ot_req='PENDING'){
                if(time_out  > strtotime('0:01:00')){
                    $.ajax({
                        type: 'POST',
                        url: 'out.php',
                        data: {
                            time_out: '18:00:00',
                            date_out: date_out,
                            username: username,
                            tin: tin,
                            din: din
                        },
                        success: function (data) {
                            $('#retrieve').html(data);
                            document.getElementById('button_out').style.display="none";
                            document.getElementById('button_in').style.display="block";
                            document.getElementById('statusdummy').value = 'Out';
                            document.getElementById('statusdummy2').value = 'Out';
                            window.location.href = 'user.php';
                        }
                    });
                }

                else{
                    $.ajax({
                        type: 'POST',
                        url: 'out.php',
                        data: {
                            time_out: time_out,
                            date_out: date_out,
                            username: username,
                            tin: tin,
                            din: din
                        },
                        success: function (data) {
                            $('#retrieve').html(data);
                            document.getElementById('button_out').style.display="none";
                            document.getElementById('button_in').style.display="block";
                            document.getElementById('statusdummy').value = 'Out';
                            document.getElementById('statusdummy2').value = 'Out';
                            window.location.href = 'user.php';
                        }
                    });
                }
                
            }

            
        }
    });
    //END/ TIME-OUT

});




