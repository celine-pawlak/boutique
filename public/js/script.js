$(document).ready(function () {
    $(".dropdown-trigger").dropdown({hover: false, constrainWidth: false});
    $('.sidenav').sidenav();
    $('select').formSelect({constrainWidth: false});

    $.ajax(
        {
            url: 'js/json.php',
            method: 'post',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                var products = response;
                var dataProducts = {};
                for (var i = 0; i < products.length; i++) {
                    dataProducts[products[i].nom] = '../app/src/images/'+products[i].image_path;
                }
                console.log(dataProducts);
                $('.autocomplete').autocomplete({
                    data: dataProducts,
                    limit: 5,
                });
            }
        }
    )


});

