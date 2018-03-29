

$(document).ready(function(){
$.datepicker.setDefaults({
    dateFormat:'d-m-yy'
});
$(function(){


$("#date_in").datepicker();
$("#date_out").datepicker();

});

$('#filter').click(function(){

var date_in = $("#date_in").val();
var date_out = $("#date_out").val();

if( date_in != '' && date_out != ''){

    $.ajax({

        url:"export.php",
        method: "POST",
        data: {date_in:date_in , date_out:date_out},
        success:function(data){
            $("#myTable").html(data);
        }
    });
}

else{
    alert("pleasensjjodm");
}

});









});



function myFunction() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
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



