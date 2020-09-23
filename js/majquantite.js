$("button[class^=moins").click(function()
    {        
        var index = $(this).val();    
        $.ajax(
            {
                url : 'js/moinsquantite.php',
                method : 'GET',
                data :{index_idP : index},
                success : (data)=>
                    {
                        console.log(data);                        
                    }
            });
    });
// $('button:regex(id, moins[0-9]+').click(function()
//     {
//         console.log('test');
//     });