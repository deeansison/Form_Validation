
$(document).ready(function () {
    //AJAX BABEH
    $('#annpost').on('click', function () {
        var username = $('#username').val(),
            ann = $('#ann').val(),
            user_img = $('#user_img').val()
           

        if (ann == "" ) {
            alert('all fields are required!');
        } else {
            $.ajax({
                type: 'POST',
                url: 'announcement.php',
                data: {
                    username: username,
                    ann: ann,
                    user_img: user_img

                },
                success: function (data) {
                    $('#retrieve').html(data);
                    document.getElementById('ann').value = '';
                }
            });
        }
    });
});