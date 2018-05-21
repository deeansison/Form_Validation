function AnnouncementSearch() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("search-announcement");
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



  $('#filter').click(function(){
    var search = $("#search").val();
    
    if( search != '' ){
      
      $.ajax({
        url:"form_request.php",
        method: "POST",
        data: {search:search},
        success:function(data){
        $("#table").html(data);
        }
      });
    }
 
    else{}
    
  });


  function req_filter_dropdown() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("req_filter_dropdown");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }

  

  
