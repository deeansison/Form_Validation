//FILTER FOR USER PROFILE
$(document).ready(function(){
    $.datepicker.setDefaults({
        dateFormat:'yy-mm-dd',
        maxDate: 0
    
    });
    $(function(){
    
    
    $("#date_in").datepicker();
    $("#date_out").datepicker();
    
    });
    
    $('#filter').click(function(){
    
    var date_in = $("#date_in").val();
    var date_out = $("#date_out").val();
    var username_emp = $("#username_emp").val();
    
    if( date_in != '' && date_out != ''){
    
        $.ajax({
    
            url:"Pfilter-profile.php",
            method: "POST",
            data: {date_in:date_in , date_out:date_out, username_emp:username_emp},
            success:function(data){
                $("#profile-user-dti").html(data);
            }
        });
    }
    
    else{
       
    }
    
    });
    
    
});
    