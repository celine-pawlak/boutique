$(document).ready(function () {
    $(".dropdown-trigger").dropdown({ hover: false, constrainWidth: false });
    $('.sidenav').sidenav();
    $('select').formSelect({constrainWidth: false });
    
    $('input.autocomplete').autocomplete( function(){
        $.ajax(
            {
                url : 'json.php',
                method : 'post',
                success : (data)=>
                    {
                        console.log(data);
                    }
            }
        );
      });
});

