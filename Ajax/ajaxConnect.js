$(document).ready(function(){
    $('#connect').click(function(event){
        event.preventDefault();
        $.ajax(
            {
                type: "POST",
                url: './controller/connect.php',
                data: $('#connectForm').serialize(),
                success:function(response){
                    if(response == 1){
                        window.location.assign("./accueil");
                    }
                    else{
                        alert("Error !");
                    }
                }
            }
        )
    })
})