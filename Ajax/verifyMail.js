$(document).ready(function(){
    $('#subscribe').click(function(event){
        event.preventDefault();
        $.ajax(
            {
                type: "POST",
                url: './controller/subscribe.php',
                data: $('#subForm').serialize(),
                success:function(response){
                    if(response == 1){
                        window.location.assign("./accueil");
                    }
                    else{
                        alert("Mail déjà existant ! Veuillez réessayer avec un mail valide.");
                    }
                }
            }
        )
    })
})