$(document).ready(function () {
    $(".dropdown-trigger").dropdown({ hover: false, constrainWidth: false });
    $('.sidenav').sidenav();
    $('select').formSelect({constrainWidth: false });  
    
    $.ajax(
        {
            url : 'js/json.php',
            method : 'GET',
            dataType : 'json',
            success : (data)=>
                {             //console.log(data);
                    let taille = data.length                
                    for(var i = 0; i<taille ; i++)
                        {
                            console.log(data[i]['nom']);
                        }
                }
        }
    );
    // $('input.autocomplete').autocomplete( function(){
    //     $.ajax(
    //         {
    //             url : 'js/json.php',
    //             method : 'post',
    //             success : (data)=>
    //                 {
    //                     console.log(data);
    //                     for(var i = 0; length(data); i++)
    //                         {
    //                             console.log(data.i);
    //                         }
    //                 }
    //         }
    //     );
    //   });
});

