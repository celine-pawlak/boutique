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
                        $('#quantite_p').html(data);
                        console.log(data);
                    }
            });
    });
                                            
    <td><button class="moins" type="button" value="<?=$i?>-<?=$_SESSION['panier']['id_produit'][$i]?>">Moins</button></td>                 
                                            
                                            
                                            
                                            
                                            
