

$(document).ready(function(){


    $('#download').attr('disabled', true); 


    $('#date_in1' && '#date_out1').blur(function()
    {
        if($(this).val().length !=1){
            $('#download').attr('disabled', false); 
            $('#export').attr('disabled', true); 
          
        }


        else{
           

            $('#download').attr('disabled', true); 
            $('#export').attr('disabled', false); 
        }
    });

    


           
   



//FOR DATE
$.datepicker.setDefaults({
    dateFormat:'yy-mm-dd',
    maxDate: 0
});

$(function(){

$("#date_in").datepicker();
$("#date_out").datepicker();

$("#date_in1").datepicker();
$("#date_out1").datepicker();

});

$('#filter').click(function(){

var date_in = $("#date_in").val();
var date_out = $("#date_out").val();

if( date_in != '' && date_out != ''){

    $.ajax({

        url:"filtering.php",
        method: "POST",
        data: {date_in:date_in , date_out:date_out},
        success:function(data){
            $("#table").html(data);
        }
    });
}

else{
    alert("Please fill out the fields");
}

});


$('#filter1').click(function(){

    var date_in1 = $("#date_in1").val();
    var date_out1 = $("#date_out1").val();
    var myInput = $("#myInput").val();
    

    if( date_in1 != '' && date_out1 != ''){
    
        $.ajax({
    
            url:"filtering.php",
            method: "POST",
            data: {date_in1:date_in1 , date_out1:date_out1, myInput:myInput},
            success:function(data){
                $("#table").html(data);
            }
        });
    }
    
    else{
        alert("Please fill out the fields");
    }
    
    });



    // $('#download').click(function(){

    //     var date_in1 = $("#date_in1").val();
    //     var date_out1 = $("#date_out1").val();
    //     var myInput = $("#myInput").val();
        
    
    //     if( date_in1 != '' && date_out1 != ''){
        
    //         $.ajax({
        
    //             url:"export.php",
    //             method: "POST",
    //             data: {date_in1:date_in1 , date_out1:date_out1, myInput:myInput},
    //             success:function(data){
    //                 $("#table").html(data);
    //             }
    //         });
    //     }
        
    //     else{
    //         alert("Please fill out the fields");
    //     }
        
    //     });






});



function myFunction() {
    var input, filter, table, tr, td, i, nameep;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }


