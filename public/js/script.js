$(document).ready(function () {
    $(".dropdown-trigger").dropdown({hover: false, constrainWidth: false});
    $('.sidenav').sidenav();
    $('select').formSelect({constrainWidth: false});

    $.ajax(
        {
            url: 'js/json.php',
            method: 'post',
            dataType: 'json',
            success: function( response ){
                var dimensions = response;
                var dataDim = {};
                for (var i = 0; i < dimensions.length; i++) {
                    dataDim += dimensions[i].nom; //countryArray[i].flag or null
                }
                console.log(dataDim);

                $('.autocomplete').autocomplete({
                    data: dataDim,
                    minLength: 2,
                });
            }
        }
    )


});

