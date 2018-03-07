


$("#ok").click(function (e) { 
    e.preventDefault();
    $('.cpass').removeClass('hide');
    $('#ok').addClass('hide');
});

$(".close").click(function (e) { 
    e.preventDefault();
    $('.cpass').addClass('hide');
    $('#ok').removeClass('hide');
    document.getElementById('un').value = '';
    document.getElementById('rpassword').value = '';
    document.getElementById('password').value = '';
});

