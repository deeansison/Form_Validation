stat = $('#statusform').val()

if (stat == "Out") {
    document.getElementById('button_out').disabled = true;
    document.getElementById('button_in').disabled = false;
    document.getElementById('statusdummy').value = 'Out';
    document.getElementById('statusdummy2').value = 'Out';
}

if (stat == "On Work") {
    document.getElementById('button_out').disabled = false;
    document.getElementById('button_in').disabled = true;
    document.getElementById('statusdummy').value = 'On Work';
    document.getElementById('statusdummy2').value = 'On Work';
}

$(document).ready(function () {
    //AJAX BABEH
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
                    document.getElementById('button_out').disabled = false;
                    document.getElementById('button_in').disabled = true;
                    document.getElementById('statusdummy').value = 'On Work'; 
                    document.getElementById('statusdummy2').value = 'On Work'; 
                }
            });
        }
    });

    $('#button_out').on('click', function () {
        var 
        time_out = $('#time_out').val(),
        date_out = $('#date_out').val(),
        username = $('#username').val()
        

        if (date_out == "" ) {
            alert('all fields are required!');
        } else {
            $.ajax({
                type: 'POST',
                url: 'out.php',
                data: {
                    time_out: time_out,
                    date_out: date_out,
                    username: username
                },
                success: function (data) {
                    $('#retrieve').html(data);
                    document.getElementById('button_out').disabled = true;
                    document.getElementById('button_in').disabled = false;
                    document.getElementById('statusdummy').value = 'Out';
                    document.getElementById('statusdummy2').value = 'Out';
                }
            });
        }
    });

});