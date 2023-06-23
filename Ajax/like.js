function add_like(cuiit_id, user_id){
    $.ajax(
        {
            type: "POST",
            url: './controller/like_controller.php',
            data: {cuiit_id: cuiit_id, user_id: user_id},
            success:function(){
                alert("Liké");
            }
        }
    )
}