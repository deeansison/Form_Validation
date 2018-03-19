
var $cell = $('.card');

//open and close card when clicked on card
$cell.find('.js-expander').click(function () {

    var $thisCell = $(this).closest('.card');

    if ($thisCell.hasClass('is-collapsed')) {
        $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed').addClass('is-inactive');
        $thisCell.removeClass('is-collapsed').addClass('is-expanded');

        if ($cell.not($thisCell).hasClass('is-inactive')) {
            //do nothing
        } else {
            $cell.not($thisCell).addClass('is-inactive');
        }

    } else {
        $thisCell.removeClass('is-expanded').addClass('is-collapsed');
        $cell.not($thisCell).removeClass('is-inactive');
    }
});

//close card when click on cross
$cell.find('.js-collapser').click(function () {

    var $thisCell = $(this).closest('.card');

    $thisCell.removeClass('is-expanded').addClass('is-collapsed');
    $cell.not($thisCell).removeClass('is-inactive');

});
function openNav() {
    document.getElementById("mySidenav").style.width = "315px";
    document.getElementById("overlay").style.display = "block";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("overlay").style.display = "none";
}






// function w3_open() {
//     document.getElementById("mySidebar").style.display = "block";
//     document.getElementById("myOverlay").style.display = "block";
//   }
  
//   function w3_close() {
//     document.getElementById("mySidebar").style.display = "none";
//     document.getElementById("myOverlay").style.display = "none";
//   }





document.querySelector("#sup").addEventListener("click", function () {
    document.querySelector(".main-row").classList.remove('hide');
    document.querySelector(".sign-up-modal").classList.add('hide');
});


$("#sup").click(function (e) { 
    e.preventDefault();
    $('.main-row').addClass('hide');
    $('.sign-up-modal').removeClass('hide');
});


$("#log-in").click(function (e) {
    e.preventDefault();
    $('.main-row').addClass('hide');
    $('.employee-modal').removeClass('hide');
});





