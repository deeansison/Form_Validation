
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
    document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}


document.querySelector("#sup").addEventListener("click", function () {
    document.querySelector(".employee-modal").classList.remove('hide');
    document.querySelector(".sign-up-modal").classList.add('hide');
});


$("#sup").click(function (e) { 
    e.preventDefault();
    $('.employee-modal').addClass('hide');
    $('.sign-up-modal').removeClass('hide');
});


$("#log-in").click(function (e) {
    e.preventDefault();
    $('.sign-up-modal').addClass('hide');
    $('.employee-modal').removeClass('hide');
});





