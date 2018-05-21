$(document).ready(function(){
    $.datepicker.setDefaults({
        dateFormat:'yy-mm-dd',
        minDate: 0,

        
    });
    
    $(function(){
    
        $("#date_OT").datepicker({dateFormat:'yy-mm-dd',minDate: 0 ,maxDate: 1});
        $("#start_date").datepicker();
        $("#end_date").datepicker();
        $("#date_in_inout").datepicker();
        $("#date_out_inout").datepicker();
        $("#date_out_inout_in").datepicker();
        $("#date_wfh").datepicker();
   
    });

    document.getElementById("ot_button").style.backgroundColor = "#D9231E";
    document.getElementById("ot_button").style.color = "#ffff";
    document.getElementById("onleave_button").style.backgroundColor = "white";
    document.getElementById("onleave_button").style.color = "#1e1e1e";
    document.getElementById("wfh_button").style.backgroundColor = "white";
    document.getElementById("wfh_button").style.color = "#1e1e1e";

    $(".close").click(function (e) { 
        e.preventDefault();
        
        document.getElementById('email').value="";
        document.getElementById('subject').value="REQUEST FOR OVERTIME";
        document.getElementById('date_OT').value="";
        document.getElementById('message').value="";

        document.getElementById('email_leave').value="";
        document.getElementById('subject_leave').value="REQUEST FOR LEAVE";
        document.getElementById('start_date').value="";
        document.getElementById('end_date').value="";
        document.getElementById('message_leave').value="";

        document.getElementById('email_wfh').value="";
        document.getElementById('date_wfh').value="";
        document.getElementById('subject_wfh').value="WORK FROM HOME REQUEST";
        document.getElementById('timein_wfh').value="";
        document.getElementById('timeout_wfh').value="";
        document.getElementById('message_wfh').value="";

        $('.ot_form').removeClass('hide');
        $('.onleave_form').addClass('hide');
        $('.wfh_form').addClass('hide');

        document.getElementById("ot_button").style.backgroundColor = "#D9231E";
        document.getElementById("ot_button").style.color = "#ffff";
        document.getElementById("onleave_button").style.backgroundColor = "white";
        document.getElementById("onleave_button").style.color = "#1e1e1e";
        document.getElementById("wfh_button").style.backgroundColor = "white";
        document.getElementById("wfh_button").style.color = "#1e1e1e";
    
    
    });
    
    // OT FORM
    document.querySelector("#ot_button").addEventListener("click", function () {
        $('.ot_form').removeClass('hide');
        $('.onleave_form').addClass('hide');
        $('.wfh_form').addClass('hide');

        document.getElementById('email_leave').value="";
        document.getElementById('subject_leave').value="REQUEST FOR LEAVE";
        document.getElementById('start_date').value="";
        document.getElementById('end_date').value="";
        document.getElementById('message_leave').value="";

        document.getElementById('email_wfh').value="";
        document.getElementById('date_wfh').value="";
        document.getElementById('subject_wfh').value="WORK FROM HOME REQUEST";
        document.getElementById('timein_wfh').value="";
        document.getElementById('timeout_wfh').value="";
        document.getElementById('message_wfh').value="";
    
        document.getElementById("ot_button").style.backgroundColor = "#D9231E";
        document.getElementById("ot_button").style.color = "#ffff";
        document.getElementById("onleave_button").style.backgroundColor = "white";
        document.getElementById("onleave_button").style.color = "#1e1e1e";
        document.getElementById("wfh_button").style.backgroundColor = "white";
        document.getElementById("wfh_button").style.color = "#1e1e1e";

    });

    // ONLEAVE FORM
    document.querySelector("#onleave_button").addEventListener("click", function () {
        $('.ot_form').addClass('hide');
        $('.onleave_form').removeClass('hide');
        $('.wfh_form').addClass('hide')

        document.getElementById('email').value="";
        document.getElementById('subject').value="REQUEST FOR OVERTIME";
        document.getElementById('date_OT').value="";
        document.getElementById('message').value="";

        document.getElementById('email_wfh').value="";
        document.getElementById('date_wfh').value="";
        document.getElementById('subject_wfh').value="WORK FROM HOME REQUEST";
        document.getElementById('timein_wfh').value="";
        document.getElementById('timeout_wfh').value="";
        document.getElementById('message_wfh').value="";

        document.getElementById("onleave_button").style.backgroundColor = "#D9231E";
        document.getElementById("onleave_button").style.color = "#ffff";
        document.getElementById("ot_button").style.backgroundColor = "white";
        document.getElementById("ot_button").style.color = "#1e1e1e";
        document.getElementById("wfh_button").style.backgroundColor = "white";
        document.getElementById("wfh_button").style.color = "#1e1e1e";

    });


    // WFH FORM
    document.querySelector("#wfh_button").addEventListener("click", function () {
        $('.ot_form').addClass('hide');
        $('.onleave_form').addClass('hide');
        $('.wfh_form').removeClass('hide')

        document.getElementById('email').value="";
        document.getElementById('subject').value="REQUEST FOR OVERTIME";
        document.getElementById('date_OT').value="";
        document.getElementById('message').value="";

        document.getElementById('email_leave').value="";
        document.getElementById('subject_leave').value="REQUEST FOR LEAVE";
        document.getElementById('start_date').value="";
        document.getElementById('end_date').value="";
        document.getElementById('message_leave').value="";

        document.getElementById("wfh_button").style.backgroundColor = "#D9231E";
        document.getElementById("wfh_button").style.color = "#ffff";
        document.getElementById("ot_button").style.backgroundColor = "white";
        document.getElementById("ot_button").style.color = "#1e1e1e";
        document.getElementById("onleave_button").style.backgroundColor = "white";
        document.getElementById("onleave_button").style.color = "#1e1e1e";

    });



    });





    
  