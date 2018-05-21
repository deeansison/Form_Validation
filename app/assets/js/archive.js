$(document).ready(function(){







    $("#button_req").click(function (e) { 
        e.preventDefault();
        $('.ann_cont').addClass('hide');
        $('.emp_cont').addClass('hide');
        $('.req_cont').removeClass('hide');

    });
    


    $("#button_ann").click(function (e) { 
        e.preventDefault();
        $('.ann_cont').removeClass('hide');
        $('.emp_cont').addClass('hide');
        $('.req_cont').addClass('hide');

    });


    $("#button_emp").click(function (e) { 
      e.preventDefault();
      $('.ann_cont').addClass('hide');
      $('.emp_cont').removeClass('hide');
      $('.req_cont').addClass('hide');

  });

    // function RequestArchiveSearch() {
    //     var input, filter, table, tr, td, i;
    //     input = document.getElementById("search-request");
    //     filter = input.value.toUpperCase();
    //     table = document.getElementById("table-one");
    //     tr = table.getElementsByTagName("tr");
    //     for (i = 0; i < tr.length; i++) {
    //       td = tr[i].getElementsByTagName("td")[0];
    //       if (td) {
    //         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
    //           tr[i].style.display = "";
    //         } else {
    //           tr[i].style.display = "none";
    //         }
    //       }       
    //     }
    //   }








      

      // $('#filter-rejected').click(function(){

      //   var search_rejected = $("#search_rejected").val();
     
        
    
      //   if(search_rejected != ''){
        
      //       $.ajax({
        
      //           url:"kainis.php",
      //           method: "POST",
      //           data: {search_rejected:search_rejected},
      //           success:function(data){
      //               $("#table").html(data);
      //           }
      //       });
      //   }
        
      //   else{
      //       alert("Please fill out the fields ggggggggggggg");
      //   }
        
      //   });
  

});






  // function req_filter_dropdown() {
  //       var input, filter, table, tr, td, i;
  //       input = document.getElementById("req_filter_dropdown");
  //       filter = input.value.toUpperCase();
  //       table = document.getElementById("table");
  //       tr = table.getElementsByTagName("tr");
  //       for (i = 0; i < tr.length; i++) {
  //         td = tr[i].getElementsByTagName("td")[3];
  //         if (td) {
  //           if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
  //             tr[i].style.display = "";
  //           } else {
  //             tr[i].style.display = "none";
  //           }
  //         }       
  //       }
  //     }




  
  // $('#filter').click(function(){

  //   var search = $("#search").val();
 
    

  //   if( search != '' ){
    
  //       $.ajax({
    
  //           url:"kainis.php",
  //           method: "POST",
  //           data: {search:search},
  //           success:function(data){
  //               $("#table").html(data);
  //           }
  //       });
  //   }
    
  //   else{
  //       alert("Please fill out the fields");
  //   }
    
  //   });


   


    

  // function req_filter_dropdown() {
  //   var input, filter, table, tr, td, i;
  //   input = document.getElementById("req_filter_dropdown");
  //   filter = input.value.toUpperCase();
  //   table = document.getElementById("table");
  //   tr = table.getElementsByTagName("tr");
  //   for (i = 0; i < tr.length; i++) {
  //     td = tr[i].getElementsByTagName("td")[3];
  //     if (td) {
  //       if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
  //         tr[i].style.display = "";
  //       } else {
  //         tr[i].style.display = "none";
  //       }
  //     }       
  //   }
  // }


  //     function AnnouncementSearch() {
  //       var input, filter, table, tr, td, i;
  //       input = document.getElementById("search-announcement");
  //       filter = input.value.toUpperCase();
  //       table = document.getElementById("table");
  //       tr = table.getElementsByTagName("tr");
  //       for (i = 0; i < tr.length; i++) {
  //         td = tr[i].getElementsByTagName("td")[0];
  //         if (td) {
  //           if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
  //             tr[i].style.display = "";
  //           } else {
  //             tr[i].style.display = "none";
  //           }
  //         }       
  //       }
  //     }





   
  $('#filter').click(function(){

    var search_rejected = $("#search").val();
 
    

    if( search_rejected != '' ){
    
        $.ajax({
    
            url:"form_request.php",
            method: "POST",
            data: {search_rejected:search_rejected},
            success:function(data){
                $("#table").html(data);
            }
        });
    }
    
    else{
        alert("Please fill out the fields");
    }
    
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



function AnnouncementSearch() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("search-announcement");
  filter = input.value.toUpperCase();
  table = document.getElementById("table_emp");
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

function empSearch() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("search-emp");
  filter = input.value.toUpperCase();
  table = document.getElementById("table_emp");
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