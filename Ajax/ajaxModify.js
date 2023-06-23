$(document).ready(function(){
    $('#send').click(function(event){
        event.preventDefault();
        $.ajax(
            {
                type: "POST",
                url: './controller/modification.php',
                data: $('#modification_form').serialize(),
                success:function(response){
                    if(response == 1){
                        window.location.assign("./compte");
                    }
                    else{
                        alert("Error !");
                    }
                }
            }
        )
    })
})